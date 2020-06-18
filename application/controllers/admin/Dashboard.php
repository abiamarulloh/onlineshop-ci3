<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
		is_logged_in_admin();
		is_logged_in();
	}

	public function index()
	{
		// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		$data['blog'] = $this->Dashboard_model->get_blog();
		$data['invoice'] = $this->Dashboard_model->get_invoice();
		$data['product'] = $this->Dashboard_model->get_product();
		$data['brands'] = $this->db->get("brand")->num_rows();
		
        // Query Hanya Member 
        $this->db->where_not_in("role_id", 1);
		$data['member'] = $this->db->get("auth")->num_rows();
		
		// Data invoice

		$data['invoice_belum_terkonfirmasi'] = $this->db->get_where("invoice", ['status' => 0, 'image_payment' => "No-Image-Available.png"])->num_rows();

		$this->db->where('status' , 0);
		$this->db->where_not_in('image_payment', "No-Image-Available.png");
		$data['invoice_sudah_terkonfirmasi'] = $this->db->get_where("invoice")->num_rows();

		$data['invoice_sedang_dikemas'] = $this->db->get_where("invoice", ['status' => 1])->num_rows();
		$data['invoice_sedang_dikirim'] = $this->db->get_where("invoice", ['status' => 2])->num_rows();
		$data['invoice_selesai_sampai'] = $this->db->get_where("invoice", ['status' => 3])->num_rows();



		
		
		$data['restorasi'] = $this->db->get("restorasi")->num_rows();
		$data['title'] = "Dashboard";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/dashboard/index', $data);
		$this->load->view('templates/admin/footer', $data);
	}
}
