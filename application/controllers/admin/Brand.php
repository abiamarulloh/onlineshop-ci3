<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
		$this->load->model('Brand_model');
		is_logged_in_admin();
		is_logged_in();
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		
		//konfigurasi pagination
		$config['base_url'] =  site_url('brand_admin');
		$config['total_rows'] = $this->db->count_all('brand'); //total row
		$config['per_page'] = 3;  //show record per halaman
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
		$data['list_brand'] = $this->Brand_model->get_brand_admin($config["per_page"], $data['page']);           

		// Kalo udh ditampilin semua data nya, baru bisa di buat searching
		if( $this->input->post('keyword')) {
			$keyword = $this->input->post('keyword');
			$this->db->like('name', $keyword);
			$data['list_brand'] = $this->db->get('brand')->result();
			$this->session->set_flashdata('search-brand', '<div class="alert alert-success" role="alert">Hasil dari pencarian : ' .  $keyword . ' </div>');
		}
		

		$data['pagination'] = $this->pagination->create_links();
		
		$data['title'] = "brand";
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/brand/index', $data);
		$this->load->view('templates/admin/footer', $data);
	}


	// Add brand
	public function add()
	{
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		
		$this->form_validation->set_rules('name', '', 'required',[
			"required" => 'Nama Brand harus dilengkapi !'
		]);


		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = "Publish brand";
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);
			$this->load->view('admin/brand/add_brand', $data);
			$this->load->view('templates/admin/footer', $data);
		}else{
			$name 				= htmlspecialchars($this->input->post('name', true) );
			$user_id	 		= $data['user']->id;
			$created_date 		= time();

			// Cek Jika ada gambar yang di upload
			$upload_image = $_FILES['image']['name'];

			if($upload_image){
				$config['upload_path'] = "./assets/admin/img/brand";
				$config['allowed_types'] = "jpg|jpeg|png";
				$config['max_size'] = "2048" ;
				$this->load->library('upload', $config);

				if($this->upload->do_upload("image")){
					$Query_foto_lama = $this->db->get("brand")->row_array();
					$foto_lama = $Query_foto_lama['image'];

					if($foto_lama){
						unlink(FCPATH . "assets/admin/img/brand" . $foto_lama);
					}

					$image_new = $this->upload->data("file_name");
					$this->db->set("image", $image_new );
				}else {
					echo $this->upload->display_errors();
				}

			}
			
			$this->db->set("name", $name );
			$this->db->set("user_id", $user_id );
			$this->db->set("created_date", $created_date );
			$this->db->insert('brand');
			$this->session->set_flashdata('brand', '<div class="alert alert-success" role="alert"> Yey, brand baru dengan judul ' .  $name . ' Berhasil ditambahkan. </div>');
			redirect('brand_admin');
		}	

	
	}




	// Edit brand
	public function brand_edit($id)
	{
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		
		$this->form_validation->set_rules('name', '', 'required',[
			"required" => 'Nama Brand harus dilengkapi !'
		]);


		if ($this->form_validation->run() == FALSE)
		{
			$data['list_brand_by_id'] = $this->Brand_model->get_brand_by_id($id);     
			$data['title'] = "Publish brand";
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);
			$this->load->view('admin/brand/brand_edit', $data);
			$this->load->view('templates/admin/footer', $data);
		}else{
			$id 				= htmlspecialchars($this->input->post('id', true) );
			$name 				= htmlspecialchars($this->input->post('name', true) );
			$user_id	 		= $data['user']->id;
			$updated_date 		= time();

			// Cek Jika ada gambar yang di upload
			$upload_image = $_FILES['image']['name'];

			if($upload_image){
				$config['upload_path'] = "./assets/admin/img/brand";
				$config['allowed_types'] = "jpg|jpeg|png";
				$config['max_size'] = "2048" ;
				$this->load->library('upload', $config);

				if($this->upload->do_upload("image")){
					$Query_foto_lama = $this->db->get_where("brand", ['id' => $id])->row_array();
					$foto_lama = $Query_foto_lama['image'];

					unlink(FCPATH . "./assets/admin/img/brand/" . $foto_lama);

					$image_new = $this->upload->data("file_name");
					$this->db->set("image", $image_new );
				}else {
					echo $this->upload->display_errors();
				}

			}
			
			$this->db->set("name", $name );
			$this->db->set("user_id", $user_id );
			$this->db->set("updated_date", $updated_date );
			$this->db->where("id", $id);
			$this->db->update('brand');
			$this->session->set_flashdata('brand', '<div class="alert alert-success" role="alert"> Yey, brand baru dengan judul ' .  $name . ' Berhasil diupdate. </div>');
			redirect('brand_admin');
		}	

	
	}


	public function brand_delete($id){
		$query = $this->db->get_where('brand', ['id' => $id])->row();
		$this->Brand_model->delete_brand($id);
		$this->session->set_flashdata('brand', '<div class="alert alert-danger" role="alert"> brand ' . $query->name . ' berhasil dihapus ! </div>');
		redirect('brand_admin');
	}

}
