<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_payment extends CI_Controller {
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
		$this->load->view('admin/bank_payment/index');
		$this->load->view('templates/admin/footer');
	}


	
}
