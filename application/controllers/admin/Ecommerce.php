<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommerce extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
		is_logged_in_admin();
		is_logged_in();
	}
	
	// List Product
	public function index()
	{
		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/sidebar');
		$this->load->view('templates/admin/topbar');
		$this->load->view('admin/ecommerce/index');
		$this->load->view('templates/admin/footer');
	}


	// Add Product
	public function add()
	{
		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/sidebar');
		$this->load->view('templates/admin/topbar');
		$this->load->view('admin/ecommerce/add');
		$this->load->view('templates/admin/footer');
	}


	//  category Product
	public function category()
	{
		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/sidebar');
		$this->load->view('templates/admin/topbar');
		$this->load->view('admin/ecommerce/category');
		$this->load->view('templates/admin/footer');
	}


	//  Orders
	public function orders()
	{
		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/sidebar');
		$this->load->view('templates/admin/topbar');
		$this->load->view('admin/ecommerce/orders');
		$this->load->view('templates/admin/footer');
	}


	// Add Discount Codes
	public function discount_codes()
	{
		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/sidebar');
		$this->load->view('templates/admin/topbar');
		$this->load->view('admin/ecommerce/discount_codes');
		$this->load->view('templates/admin/footer');
	}

}
