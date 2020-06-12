<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restorasi_vespa extends CI_Controller {


	public function index()
	{
		// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();

		#query data restorasi
		$data['restorasi_vespa'] = $this->db->get("restorasi")->result();

		$data['title'] = "Restorasi";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/restorasi_vespa/index', $data);
		$this->load->view('templates/user/footer', $data);
	}

	public function detail_restorasi($id)
	{

		// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		
		// Query  tabel Restorasi berdasarkan ID
		$data['restorasi_vespa'] = $this->db->get_where("restorasi", ['id' => $id])->row();
	
		$data['title'] = "Detail Restorasi";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/restorasi_vespa/detail_restorasi', $data);
		$this->load->view('templates/user/footer', $data);
	}
}
