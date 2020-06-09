<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {


	public function index()
	{
		$data['title'] = "Stock";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/stock/index', $data);
		$this->load->view('templates/user/footer', $data);
	}
}
