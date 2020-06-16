<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$data['title'] = "Home";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		// Social Media
		$data['social_media'] = $this->db->get("social_media")->result();


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


		// Menampilkan Carausel di menu
		$this->db->select("*");
		$this->db->from('carausel');
		$this->db->join("menu_member", "carausel.menu_id = menu_member.id");
		$data['carausel'] = $this->db->get()->result();

		
	
	


		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/home/index', $data);
		$this->load->view('templates/user/footer', $data);
	}




}