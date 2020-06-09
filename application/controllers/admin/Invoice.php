<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
		$this->load->model('Invoice_model');

	}
	
	// List Product
	public function index()
	{
		is_logged_in_admin();
		is_logged_in();
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
		is_logged_in_admin();
		is_logged_in();
		$this->Invoice_model->update_invoice($id);
		redirect('invoice_admin');
	}

	// Detail Invoice
	public function detail_invoice($id){
		is_logged_in_admin();
		is_logged_in();
		$data['title'] = "Invoice Detail";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		
		// ID Invoice
		$data['id_invoice'] = $id;
		
		// Tampilkan Data Invoice berdasarkan ID invoice
		$data['list_invoice_by_id'] = $this->Invoice_model->get_invoice_by_id($id);
		
		// Tampilkan Data admin 
		$data['admin'] = $this->db->get("about")->row();


		// Tampilkan Data Bank Payment
		$data['bank_payment'] = $this->db->get("bank_payment")->result();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/invoice/detail_invoice', $data);
		$this->load->view('templates/admin/footer', $data);
	}

	// public function invoice_download_pdf($id){

	// 	$data['id_invoice'] = $id;

	// 	$data['title'] = "Download Invoice";
	// 	$this->load->library('Pdf');
	// 	$this->pdf->setPaper('A4', 'potrait');
	// 	$this->pdf->filename = "Invoice-". $id ;
	// 	$this->pdf->load_view('admin/invoice/invoice_download_pdf', $data);
	// }


}
