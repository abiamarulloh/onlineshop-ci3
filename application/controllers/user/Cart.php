<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
		// $this->load->model('Blog_model');
		is_logged_in_member();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = "Cart";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/cart/index', $data);
		$this->load->view('templates/user/footer', $data);
	}
}
