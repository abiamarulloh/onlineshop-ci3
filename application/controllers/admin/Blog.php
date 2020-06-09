<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
		$this->load->model('Blog_model');
		is_logged_in_admin();
		is_logged_in();
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		// View Category
		$data['list_category'] = $this->Blog_model->get_category();
		
		//konfigurasi pagination
		$config['base_url'] =  site_url('blog_admin');
		$config['total_rows'] = $this->db->count_all('blog'); //total row
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
		$data['list_blog'] = $this->Blog_model->get_blog_admin($config["per_page"], $data['page']);           

		// Kalo udh ditampilin semua data nya, baru bisa di buat searching
		if( $this->input->post('keyword')) {
			$keyword = $this->input->post('keyword');
			$this->db->like('title', $keyword);
			$this->db->or_like('name', $keyword);
			$this->db->select('*, blog.id as id');
			$this->db->from('blog');
			$this->db->join('blog_category', 'blog_category.id = blog.category_id');
			$data['list_blog'] = $this->db->get()->result();
		}
		

		$data['pagination'] = $this->pagination->create_links();
		
		$data['title'] = "Blog";
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/blog/index', $data);
		$this->load->view('templates/admin/footer', $data);
	}


	// Add Blog
	public function add()
	{
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		
		$this->form_validation->set_rules('title', '', 'required',[
			"required" => 'Judul harus dilengkapi !'
		]);

		$this->form_validation->set_rules('body', '', 'required',[
			"required" => 'Isi harus dilengkapi !'
		]);

		$this->form_validation->set_rules('category_id', '', 'is_natural_no_zero',[
			"is_natural_no_zero" => 'Kategori harus dipilih !'
		]);


		if ($this->form_validation->run() == FALSE)
		{
			// View Category
			$data['list_category'] = $this->Blog_model->get_category();

			$data['title'] = "Publish Blog";
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);
			$this->load->view('admin/blog/add_blog', $data);
			$this->load->view('templates/admin/footer', $data);
		}else{
			$title 				= htmlspecialchars($this->input->post('title', true) );
			$body 				= $this->input->post('body');
			$user_id	 		= $data['user']->id;
			$category_id	 	= htmlspecialchars($this->input->post('category_id', true) );
			$created_date 		= time();

			// Cek Jika ada gambar yang di upload
			$upload_image = $_FILES['image']['name'];

			if($upload_image){
				$config['upload_path'] = "./assets/admin/img/blog";
				$config['allowed_types'] = "jpg|jpeg|png";
				$config['max_size'] = "2048" ;
				$this->load->library('upload', $config);
				
				if($this->upload->do_upload("image")){
					$image_new = $this->upload->data("file_name");
					$this->db->set("image", $image_new );
				}else {
					echo $this->upload->display_errors();
				}

			}
			
			$this->db->set("title", $title );
			$this->db->set("body", $body );
			$this->db->set("user_id", $user_id );
			$this->db->set("category_id", $category_id );
			$this->db->set("created_date", $created_date );
		
			$this->db->insert('blog');
			$this->session->set_flashdata('blog', '<div class="alert alert-success" role="alert"> Yey, Blog baru dengan judul ' .  $title . ' Berhasil ditambahkan. </div>');
			redirect('blog_admin');
		}	

	
	}



	// Add Blog
	public function blog_edit($id)
	{

		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		
		$this->form_validation->set_rules('title', '', 'required',[
			"required" => 'Judul harus dilengkapi !'
		]);

		$this->form_validation->set_rules('body', '', 'required',[
			"required" => 'Isi harus dilengkapi !'
		]);


		if ($this->form_validation->run() == FALSE)
		{
			// View Category
			$data['list_category'] = $this->Blog_model->get_category();
			$data['list_blog_by_id'] = $this->Blog_model->get_blog_by_id($id);       
			$data['title'] = "Publish Blog";
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);
			$this->load->view('admin/blog/blog_edit', $data);
			$this->load->view('templates/admin/footer', $data);
		}else{
			$id_blog 			= htmlspecialchars($this->input->post('id', true) );
			$title 				= htmlspecialchars($this->input->post('title', true) );
			$body 				= $this->input->post('body');
			$category_id	 	= htmlspecialchars($this->input->post('category_id', true) );
			$updated_date 		= time();

			// Cek Jika ada gambar yang di upload
			$upload_image = $_FILES['image']['name'];

			if($upload_image){
				$config['upload_path'] = "./assets/admin/img/blog";
				$config['allowed_types'] = "jpg|jpeg|png";
				$config['max_size'] = "2048" ;
				$this->load->library('upload', $config);
				
				if($this->upload->do_upload("image")){
					$Query_foto_lama = $this->db->get_where("blog", ['id' => $id])->row_array();
					$foto_lama = $Query_foto_lama['image'];

					unlink(FCPATH . "./assets/admin/img/blog/" . $foto_lama);

					$image_new = $this->upload->data("file_name");
					$this->db->set("image", $image_new );
				}else {
					echo $this->upload->display_errors();
				}

			}
			
			$this->db->set("title", $title );
			$this->db->set("body", $body );
			$this->db->set("category_id", $category_id );
			$this->db->set("updated_date", $updated_date );
		
			$this->db->where('id', $id_blog);
			$this->db->update('blog');
			$this->session->set_flashdata('blog', '<div class="alert alert-success" role="alert"> Yey, Blog   ' . $title . ' Berhasil diUpdate. </div>');
			redirect('blog_admin');
		}	

	
	}



	// Add category
	public function category()
	{
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		$this->form_validation->set_rules('category', '', 'required',[
			"required" => 'Category harus dilengkapi !'
		]);

		if ($this->form_validation->run() == FALSE)
		{
			// View Category
			$data['list_category'] = $this->Blog_model->get_category();

			$data['title'] = "Category";
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);
			$this->load->view('admin/blog/category', $data);
			$this->load->view('templates/admin/footer', $data);
		}else{
			$data = [
				'name' => htmlspecialchars($this->input->post('category', true)),
				'created_date' => time()
			];

			$this->Blog_model->insert_category($data);
			$this->session->set_flashdata('blog', '<div class="alert alert-success" role="alert"> Yey, Category baru Berhasil ditambahkan. </div>');
			redirect('blog_category');
		
		}
	}


	// Delete Category
	public function delete_category($id)
	{	
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		
		$query = $this->db->get_where('blog_category', ['id' => $id])->row();
		$this->Blog_model->delete_category($id);
		$this->session->set_flashdata('blog', '<div class="alert alert-danger" role="alert"> Category ' . $query->name . ' berhasil dihapus ! </div>');
		redirect('blog_category');
	}


	public function blog_delete($id){
		$Query_delete_foto = $this->db->get_where("blog", ['id' => $id])->row_array();
		$delete_foto = $Query_delete_foto['image'];
		unlink(FCPATH . "./assets/admin/img/blog/" . $delete_foto);

		$query = $this->db->get_where('blog', ['id' => $id])->row();
		$this->Blog_model->delete_blog($id);
		$this->session->set_flashdata('blog', '<div class="alert alert-danger" role="alert"> Blog ' . $query->title . ' berhasil dihapus ! </div>');
		redirect('blog_admin');
	}

}
