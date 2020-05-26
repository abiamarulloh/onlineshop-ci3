<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
		$this->load->model('Invoice_model');
		is_logged_in_admin();
		is_logged_in();
	}
	
	// List Product
	public function index()
	{
		$data['title'] = "Invoice";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		$data['list_invoice'] = $this->Invoice_model->get_invoice();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/invoice/index', $data);
		$this->load->view('templates/admin/footer', $data);
	}

	// Update status
	public function update_invoice_status($id) {
		$this->Invoice_model->update_invoice($id);
		redirect('invoice_admin');
	}

	// Detail Invoice
	public function detail_invoice($id){
		
		$data['title'] = "Invoice Detail";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		$data['id_invoice'] = $id;

		$data['detail_invoice_order'] = $this->Invoice_model->get_invoice_order_by_id($id);
		$data['detail_auth_order'] = $this->Invoice_model->get_auth_order_by_id($id);
		$data['detail_invoice'] = $this->Invoice_model->get_invoice_by_id($id);

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/invoice/detail_invoice', $data);
		$this->load->view('templates/admin/footer', $data);
	}


}
