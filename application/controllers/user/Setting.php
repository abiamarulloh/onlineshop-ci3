<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function privacy_police()
	{
		
		// Social Media
		$data['social_media'] = $this->db->get("social_media")->result();

		// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		
		// Query Privacy Police 
		$data['privacy'] = $this->db->get("privacy_police")->result();

		$data['title'] = "Privacy Police";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('admin/privacy_police/index', $data);
		$this->load->view('templates/user/footer', $data);
	}





}