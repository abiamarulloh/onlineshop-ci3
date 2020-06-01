<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
		is_logged_in_admin();
		is_logged_in();
	}

	public function index()
	{
		$data['blog'] = $this->db->get("blog")->num_rows();
		$data['product'] = $this->db->get("product")->num_rows();
		$data['invoice'] = $this->db->get("invoice")->num_rows();
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
