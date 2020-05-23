<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Online_shop extends CI_Controller {


	public function index()
	{
		$data['title'] = "Online Shop";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/online_shop/index', $data);
		$this->load->view('templates/user/footer', $data);
	}
}
