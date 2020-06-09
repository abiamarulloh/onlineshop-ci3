<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
		is_logged_in_admin();
		is_logged_in();
	}

	public function index()
	{
		$data['blog'] = $this->Dashboard_model->get_blog();
		$data['invoice'] = $this->Dashboard_model->get_invoice();
		$data['product'] = $this->Dashboard_model->get_product();
		
		
		
		// $data['restorasi'] = $this->db->get("restorasi")->num_rows();
		$data['title'] = "Dashboard";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/dashboard/index', $data);
		$this->load->view('templates/admin/footer', $data);
	}
}
