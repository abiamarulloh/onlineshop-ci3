<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Brands";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/brand/index', $data);
		$this->load->view('templates/user/footer', $data);
	}
}
