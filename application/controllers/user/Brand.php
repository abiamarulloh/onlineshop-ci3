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
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		
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
		if( $this->input->post('keyword')) {
			$keyword = $this->input->post('keyword');
			$this->db->like('name', $keyword);
			$data['list_brand'] = $this->db->get('brand')->result();
			$this->session->set_flashdata('search-brand', '<div class="alert alert-success" role="alert">Hasil dari pencarian : ' .  $keyword . ' </div>');
		}
		

		$data['pagination'] = $this->pagination->create_links();

		$data['title'] = "Brand";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/brand/index', $data);
		$this->load->view('templates/user/footer', $data);
	}
}
