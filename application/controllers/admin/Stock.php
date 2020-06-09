<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
		is_logged_in_admin();
		is_logged_in();
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/sidebar');
		$this->load->view('templates/admin/topbar');
		$this->load->view('admin/stock/index');
		$this->load->view('templates/admin/footer');
	}


	// Add stock
	public function add()
	{
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/sidebar');
		$this->load->view('templates/admin/topbar');
		$this->load->view('admin/stock/add');
		$this->load->view('templates/admin/footer');
	}


	// Add category
	public function category()
	{
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/sidebar');
		$this->load->view('templates/admin/topbar');
		$this->load->view('admin/stock/category');
		$this->load->view('templates/admin/footer');
	}

	
}
