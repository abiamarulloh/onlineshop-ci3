<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$data['title'] = "Home";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();


		// Blog
		$data['list_blog_category'] = $this->db->get("blog_category")->result();
		$data['list_blog'] = $this->db->get("blog")->result();
		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/home/index', $data);
		$this->load->view('templates/user/footer', $data);
	}




}
