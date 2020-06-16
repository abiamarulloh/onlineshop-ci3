<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
		$this->load->model('Blog_model');
	}

	public function index()
	{	
		// Social Media
		$data['social_media'] = $this->db->get("social_media")->result();

		// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();

		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		// View Category
		$data['list_category'] = $this->Blog_model->get_category();
		
		//konfigurasi pagination
		$config['base_url'] =  site_url('blog');
		$config['total_rows'] = $this->db->count_all('blog'); //total row
		$config['per_page'] = 12;  //show record per halaman
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
		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/blog/index', $data);
		$this->load->view('templates/user/footer', $data);
	}


	// Preview Blog
	public function blog_preview($id)
	{	
		// Social Media
		$data['social_media'] = $this->db->get("social_media")->result();

		// Query data product
		$this->db->limit(10);
		$data['list_blog'] = $this->db->get("blog")->result();

		// View Category
		$data['list_category'] = $this->Blog_model->get_category();

		// query data wagiman di Footer
		$data['about'] = $this->db->get("about")->row();

		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		if(empty($this->Blog_model->blog_detail($id))){
			$data['title'] = "Not Found";
			$this->load->view('errors/notfound', $data);
		}else {
			$data['title'] = "Blog";
			$data['blog_detail'] = $this->Blog_model->blog_detail($id);
			$this->load->view('templates/user/header', $data);
			$this->load->view('templates/user/navbar', $data);
			$this->load->view('user/blog/blog_preview', $data);
			$this->load->view('templates/user/footer', $data);
		}

	}
	





}
