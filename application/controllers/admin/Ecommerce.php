<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommerce extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
		$this->load->model('Ecommerce_model');
		is_logged_in_admin();
		is_logged_in();
	}
	
	// List Product
	public function index()
	{
		// View Category
		$data['list_category'] = $this->Ecommerce_model->get_category();
		$data['list_brand'] = $this->Ecommerce_model->get_brand();
		
		//konfigurasi pagination
		$config['base_url'] =  site_url('ecommerce_admin');
		$config['total_rows'] = $this->db->count_all('product'); //total row
		$config['per_page'] = 50;  //show record per halaman
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
	
		$this->pagination->initialize($config);
		$data['page'] = $this->uri->segment(2);
		$data['list_product'] = $this->Ecommerce_model->get_product_admin($config["per_page"], $data['page']);           

		// Kalo udh ditampilin semua data nya, baru bisa di buat searching
		if( $this->input->post('keyword')) {
			$keyword = $this->input->post('keyword');
			$this->db->like('product.name', $keyword);
			$this->db->or_like('product_category.name', $keyword);
			$this->db->or_like('brand.name', $keyword);
			$this->db->select('*, product.image as product_image ,product.name as product_name, product.id as product_id, product_category.name as category_name, brand.name as brand_name, brand.id as brand_id');
			$this->db->from('product');
			$this->db->join('product_category', 'product_category.id = product.category_id');
			$this->db->join('brand', 'brand.id = product.brand_id');
			$data['list_product'] = $this->db->get()->result();
		}
		

		$data['pagination'] = $this->pagination->create_links();
		
		$data['title'] = "Ecommerce";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/ecommerce/index', $data);
		$this->load->view('templates/admin/footer', $data);
	}


	// Add Product
	public function product_add()
	{

		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();


		$this->form_validation->set_rules('name', '', 'required',[
			"required" => 'Nama Product harus dilengkapi !'
		]);

		$this->form_validation->set_rules('description', '', 'required',[
			"required" => 'Deskripsi Product harus dilengkapi !'
		]);

		$this->form_validation->set_rules('price', '', 'required|integer',[
			"required" => 'Harga Product harus dilengkapi !',
			"integer" => "Harga harus berupa angka, example : 100000"
		]);

		$this->form_validation->set_rules('qty', '', 'required|integer',[
			"required" => 'Jumlah Product harus dilengkapi !',
			"integer" => "Jumlah Product harus bernilai angka !"
		]);

		$this->form_validation->set_rules('weight', '', 'required|integer',[
			"required" => 'Berat Product harus dilengkapi !',
			"integer" => "Berat Product harus bernilai angka !",
		]);

		$this->form_validation->set_rules('category_id','','is_natural_no_zero', [
			"is_natural_no_zero" => "Category Harus dipilih"
		]);

		$this->form_validation->set_rules('brand_id','','is_natural_no_zero', [
			"is_natural_no_zero" => "Brand Harus dipilih"
		]);
			

		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = "Add product Ecommerce";
			// View Category
			$data['list_category'] = $this->Ecommerce_model->get_category();
			$data['list_brand'] = $this->Ecommerce_model->get_brand();
			
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);
			$this->load->view('admin/ecommerce/add', $data);
			$this->load->view('templates/admin/footer', $data);
		}else{
			$name 				= htmlspecialchars($this->input->post('name', true) );
			$description 		= $this->input->post('description', true) ;
			$price 				= htmlspecialchars($this->input->post('price', true) );
			$qty 				= htmlspecialchars($this->input->post('qty', true) );
			$weight 			= htmlspecialchars($this->input->post('weight', true) );
			$user_id	 		= $data['user']->id;
			$category_id	 	= htmlspecialchars($this->input->post('category_id', true) );
			$brand_id	 		= htmlspecialchars($this->input->post('brand_id', true) );
			$created_date 		= time();

			// Cek Jika ada gambar yang di upload
			$upload_image = $_FILES['image']['name'];

			if(isset($upload_image)){
				$config['upload_path'] = "./assets/admin/img/ecommerce";
				$config['allowed_types'] = "jpg|jpeg|png";
				$config['max_size'] = "2048" ;
				$this->load->library('upload', $config);
				
				if($this->upload->do_upload("image")){
					$image_new = $this->upload->data("file_name");
					$this->db->set("image", $image_new );
				}else {
					echo $this->upload->display_errors();
				}

			}else{
				$image_no_available = "No-Image-Available.png";
				$this->db->set("image", $image_no_available );
			}
			
			$this->db->set("name", $name );
			$this->db->set("description", $description );
			$this->db->set("price", $price );
			$this->db->set("qty", $qty );
			$this->db->set("weight", $weight );
			$this->db->set("user_id", $user_id );
			$this->db->set("category_id", $category_id );
			$this->db->set("brand_id", $brand_id );
			$this->db->set("created_date", $created_date );
		
			$this->db->insert('product');
			$this->session->set_flashdata('product', '<div class="alert alert-success" role="alert"> Yey, Product baru dengan Nama ' .  $name . ' Berhasil ditambahkan. </div>');
			redirect('ecommerce_admin');
		}	
	}


	// Add Product
	public function product_edit($id)
	{

		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		$data['list_product_by_id'] = $this->Ecommerce_model->get_product_by_id($id)->row();
		
		$this->form_validation->set_rules('name', '', 'required',[
			"required" => 'Nama Product harus dilengkapi !'
		]);

		$this->form_validation->set_rules('description', '', 'required',[
			"required" => 'Deskripsi Product harus dilengkapi !'
		]);

		$this->form_validation->set_rules('price', '', 'required|integer',[
			"required" => 'Harga Product harus dilengkapi !',
			"integer" => "Harga harus berupa angka, example : 100000"
		]);

		$this->form_validation->set_rules('qty', '', 'required',[
			"required" => 'Jumlah Product harus dilengkapi !'
		]);

		$this->form_validation->set_rules('category_id','','is_natural_no_zero', [
			"is_natural_no_zero" => "Category Harus dipilih"
		]);

		$this->form_validation->set_rules('brand_id','','is_natural_no_zero', [
			"is_natural_no_zero" => "Brand Harus dipilih"
		]);
			


		if ($this->form_validation->run() == FALSE)
		{
			
			$data['list_category'] = $this->Ecommerce_model->get_category();
			$data['list_brand'] = $this->Ecommerce_model->get_brand();
			$data['title'] = "Edit product Ecommerce";
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);
			$this->load->view('admin/ecommerce/edit', $data);
			$this->load->view('templates/admin/footer', $data);
		}else{
			$id 				= htmlspecialchars($this->input->post('id'));
			$name 				= htmlspecialchars($this->input->post('name', true) );
			$description 		= $this->input->post('description', true) ;
			$price 				= htmlspecialchars($this->input->post('price', true) );
			$qty 				= htmlspecialchars($this->input->post('qty', true) );
			$user_id	 		= $data['user']->id;
			$category_id	 	= htmlspecialchars($this->input->post('category_id', true) );
			$brand_id	 		= htmlspecialchars($this->input->post('brand_id', true) );

			$updated_date 		= time();

			// Cek Jika ada gambar yang di upload
			$upload_image = $_FILES['image']['name'];

			if(isset($upload_image)){
				$config['upload_path'] = "./assets/admin/img/ecommerce";
				$config['allowed_types'] = "jpg|jpeg|png";
				$config['max_size'] = "2048" ;
				$this->load->library('upload', $config);
				
				if($this->upload->do_upload("image")){
					$Query_foto_lama = $this->db->get_where("product", ['product.id' => $id ])->row_array();
					$foto_lama = $Query_foto_lama['image'];

					if($foto_lama != "default.png"){
						unlink(FCPATH . "assets/admin/img/ecommerce/" . $foto_lama);
					}
					
					$image_new = $this->upload->data("file_name");
					$this->db->set("image", $image_new );

				}else {
					echo $this->upload->display_errors();
				}

			}else{
				$image_no_available = "No-Image-Available.png";
				$this->db->set("image", $image_no_available );
			}
			
			$this->db->set("name", $name );
			$this->db->set("description", $description );
			$this->db->set("price", $price );
			$this->db->set("qty", $qty );
			$this->db->set("user_id", $user_id );

			if($category_id != 0) {
				$this->db->set("category_id", $category_id );

				if($brand_id != 0) {
					$this->db->set("brand_id", $brand_id );
				}else{
					$this->session->set_flashdata('product', '<div class="alert alert-success" role="alert"> Pilih Brand </div>');
					redirect('ecommerce_admin');
				}

			}else{
				$this->session->set_flashdata('product', '<div class="alert alert-success" role="alert"> Pilih Kategori </div>');
				redirect('ecommerce_admin');
			}

			$this->db->set("updated_date", $updated_date );
			$this->db->where("product.id", $id);
			$this->db->update('product');
			$this->session->set_flashdata('product', '<div class="alert alert-success" role="alert"> Yey, Product dengan Nama ' .  $name . ' Berhasil diedit. </div>');
			redirect('ecommerce_admin');
		}	
	}



	//  category Product
	public function category()
	{

		$this->form_validation->set_rules('category', '', 'required',[
			"required" => 'Category harus dilengkapi !'
		]);

		if ($this->form_validation->run() == FALSE)
		{	
			$data['title'] = "Add Category Ecommerce";
			$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
			$data['list_category'] = $this->Ecommerce_model->get_category();
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);
			$this->load->view('admin/ecommerce/category', $data);
			$this->load->view('templates/admin/footer', $data);
		}else{
			$data = [
				'name' => htmlspecialchars($this->input->post('category', true)),
				'created_date' => time()
			];

			$this->Ecommerce_model->insert_category($data);
			$this->session->set_flashdata('product_category', '<div class="alert alert-success" role="alert"> Yey, Category baru Berhasil ditambahkan. </div>');
			redirect('ecommerce_category');
		
		}
	}


	//  Orders
	public function orders()
	{
		$data['title'] = "Orders List Ecommerce";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/ecommerce/orders', $data);
		$this->load->view('templates/admin/footer', $data);
	}


	// Add Discount Codes
	public function discount_codes()
	{
		$data['title'] = "Discount Ecommerce";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/ecommerce/discount_codes', $data);
		$this->load->view('templates/admin/footer', $data);
	}


	// Delete Category
	public function delete_category($id)
	{	
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		
		$query = $this->db->get_where('product_category', ['id' => $id])->row();
		$this->Ecommerce_model->delete_category($id);
		$this->session->set_flashdata('category', '<div class="alert alert-danger" role="alert"> Category ' . $query->name . ' berhasil dihapus ! </div>');
		redirect('ecommerce_category');
	}



	
	// Delete Category
	public function product_delete($id)
	{	
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		
		$query = $this->db->get_where('product', ['id' => $id])->row();
		$this->Ecommerce_model->delete_product($id);
		$this->session->set_flashdata('product', '<div class="alert alert-danger" role="alert"> Product ' . $query->name . ' berhasil dihapus ! </div>');
		redirect('ecommerce_admin');
	}


	// Upload Image Thumbnails
	public function ecommerce_product_image_multiple($id){
		$data['id'] = $id;

		$data['image_thumbnails'] = $this->db->get_where("image_product", ["product_id" => $id])->result();

		$this->form_validation->set_rules('id', "", "required",[
			"required" => "Id tidak boleh kosong"
		]);

		if($this->form_validation->run() == FALSE) {
			$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
			$data['title'] = "Tambah Gambar Thumbnails product Ecommerce";
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);
			$this->load->view('admin/ecommerce/ecommerce_product_image_multiple', $data);
			$this->load->view('templates/admin/footer', $data);

		}else{
			
			// Hitung Jumlah File/Gambar yang dipilih
			$jumlahData = count($_FILES['gambar']['name']);

			// Lakukan Perulangan dengan maksimal ulang Jumlah File yang dipilih
			$uploadData = [];
			for ($i=0; $i < $jumlahData ; $i++):

				// Inisialisasi Nama,Tipe,Dll.
				$_FILES['file']['name']     = $_FILES['gambar']['name'][$i];
				$_FILES['file']['type']     = $_FILES['gambar']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
				$_FILES['file']['size']     = $_FILES['gambar']['size'][$i];

				// Konfigurasi Upload
				$config['upload_path']          = './assets/admin/img/ecommerce/ecommerce_thumbnails';
				$config['allowed_types']        = 'jpg|png|jpeg';
				$config['max_size'] = "2048" ;

				// Memanggil Library Upload dan Setting Konfigurasi
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('file')){ // Jika Berhasil Upload

					$fileData = $this->upload->data(); // Lakukan Upload Data

					// Membuat Variable untuk dimasukkan ke Database
					$uploadData[$i]['image_name'] = $fileData['file_name']; 
					$uploadData[$i]['product_id'] = $id;
				}

			endfor; // Penutup For

			if($uploadData !== null){ // Jika Berhasil Upload

				// Insert ke Database 

				$insert = $this->Ecommerce_model->upload($uploadData);
				

				if($insert){ // Jika Berhasil Insert
					alert("product_image_thumnails", "Upload thumbnail berhasil");
					redirect("ecommerce_product_image_multiple/" . $id);	
				}else{ // Jika Tidak Berhasil Insert
					alert("product_image_thumnails", "Upload thumbnail gagal, masukkan file berekstensi, .jpg ,.png ,.jpeg", 'error');
					redirect("ecommerce_product_image_multiple/" . $id);
				}

			}
	

		

		 }
	}


	public function ecommerce_product_image_multiple_delete($id){
		$Query_delete_foto = $this->db->get_where("image_product", ['id' => $id])->row_array();
		$delete_foto = $Query_delete_foto['image_name'];
		unlink(FCPATH . "./assets/admin/img/ecommerce/ecommerce_thumbnails" . $delete_foto);

		$query = $this->db->get_where('image_product', ['id' => $id])->row();
		$this->db->delete("image_product", ['id' => $id]);
		alert("product_image_thumnails", "Gambar berhasil dihapus");
		redirect('ecommerce_product_image_multiple/' . $query->product_id);
	}



}