<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$data['title'] = "Home";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		

		// Online Shop
		$this->db->limit(4); 
		$this->db->order_by('id', 'DESC');
		$data['list_ecomerce'] = $this->db->get("product")->result();
		$data['list_ecomerce_category'] = $this->db->get("product_category")->result();

		// Blog
		$this->db->limit(4); 
		$this->db->order_by('id', 'DESC');
		$data['list_blog'] = $this->db->get("blog")->result();
		$data['list_blog_category'] = $this->db->get("blog_category")->result();

		// Brand 
		$this->db->limit(8); 
		$this->db->order_by('id', 'DESC');
		$data['list_brand'] = $this->db->get("brand")->result();
		
		// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();

		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/home/index', $data);
		$this->load->view('templates/user/footer', $data);
	}




}
