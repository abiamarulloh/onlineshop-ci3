<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
		$this->load->model('Brand_model');
	}

	public function index()
	{
			// Social Media
		// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();

		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		// Social Media
		$data['social_media'] = $this->db->get("social_media")->result();

		
		//konfigurasi pagination
		$config['base_url'] =  site_url('brand');
		$config['total_rows'] = $this->db->count_all('brand'); //total row
		$config['per_page'] = 6;  //show record per halaman
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
		if( $this->input->get('keyword')) {
			$keyword = $this->input->get('keyword');
			$this->db->like('name', $keyword);
			$data['list_brand'] = $this->db->get('brand')->result();
		}
		

		$data['pagination'] = $this->pagination->create_links();

		$data['title'] = "Brands";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/brand/index', $data);
		$this->load->view('templates/user/footer', $data);
	}


	// Brand Preview
	public function brand_preview($id)
	{
		// Social Media
		$data['social_media'] = $this->db->get("social_media")->result();

		// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();

		// ID Brand
		$data['brand_id'] = $this->db->get_where('brand', ['id' => $id])->row();
		
		//konfigurasi pagination
		$config['base_url'] =  site_url('brand_preview/'. $id);
		$config['total_rows'] = $this->db->count_all('product'); //total row
		$config['per_page'] = 40;  //show record per halaman
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
		$data['page'] = $this->uri->segment(3);


		$data['pagination'] = $this->pagination->create_links();

		$data['list_product_by_brand'] = $this->Brand_model->get_product_by_brand( $id, $config["per_page"], $data['page']);


		// Kalo udh ditampilin semua data nya, baru bisa di buat searching
		if( $this->input->get('keyword')) {
			$keyword = $this->input->get('keyword');
			$this->db->like('name', $keyword);
			$this->db->select('product.image as product_image, product.name as product_name, product.id as product_id, product.price as price');
			$data['list_product_by_brand'] = $this->db->get_where('product', ['brand_id' => $id])->result();
		}


		$data['title'] = "List Product berdasarkan brands";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/brand/brand_preview', $data);
		$this->load->view('templates/user/footer', $data);
	}


}
