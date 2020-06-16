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
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
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
	public function update_invoice_status($id)
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		is_logged_in_admin();
		is_logged_in();
		$this->Invoice_model->update_invoice($id);
		redirect('invoice_admin');
	}

	// Detail Invoice
	public function detail_invoice($id)
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
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

		// Tampilkan orders
		$data['orders_by_invoice'] = $this->Invoice_model->orders_by_invoice($id);


		// Tampilkan Invoice Untuk dicek RajaOngkir
		$invoice = $this->db->get_where("invoice", ['id' => $id])->row();

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.rajaongkir.com/basic/cost",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "origin=". $invoice->city_sender ."&destination=" . $invoice->city_receiver . "&weight=". $invoice->weight ."&courier=" . $invoice->ekspedisi,
		CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded",
			"key: 0575c15d25c683c7b81b8133971a25a8"
		),
		));
	
		$response = curl_exec($curl);
		$err = curl_error($curl);
	
		curl_close($curl);
	
		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$data['invoice_rajaongkir'] =  json_decode($response);
		}

		// Data Invoice Cek Sub EKspedisi
		$data['invoice_sub_ekspedisi'] = $this->db->get_where('invoice', ['id' => $id])->row();
	

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/invoice/detail_invoice', $data);
		$this->load->view('templates/admin/footer', $data);
	}



	// Download PDF
	public function invoice_download_pdf($id)
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		is_logged_in();
		$data['title'] = "Invoice Download";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		
		// ID Invoice
		$data['id_invoice'] = $id;
		
		// Tampilkan Data Invoice berdasarkan ID invoice
		$data['list_invoice_by_id'] = $this->Invoice_model->get_invoice_by_id($id);
		
		// Tampilkan Data admin 
		$data['admin'] = $this->db->get("about")->row();


		// Tampilkan Data Bank Payment
		$data['bank_payment'] = $this->db->get("bank_payment")->result();

		// Tampilkan orders
		$data['orders_by_invoice'] = $this->Invoice_model->orders_by_invoice($id);


		// Tampilkan Invoice Untuk dicek RajaOngkir
		$invoice = $this->db->get_where("invoice", ['id' => $id])->row();

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.rajaongkir.com/basic/cost",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "origin=". $invoice->city_sender ."&destination=" . $invoice->city_receiver . "&weight=". $invoice->weight ."&courier=" . $invoice->ekspedisi,
		CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded",
			"key: 0575c15d25c683c7b81b8133971a25a8"
		),
		));
	
		$response = curl_exec($curl);
		$err = curl_error($curl);
	
		curl_close($curl);
	
		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$data['invoice_rajaongkir'] =  json_decode($response);
		}

		// Data Invoice Cek Sub EKspedisi
		$data['invoice_sub_ekspedisi'] = $this->db->get_where('invoice', ['id' => $id])->row();
	

		$data['title'] = "Download Invoice -" . $id;
		$this->load->library('Pdf');
		$this->pdf->setPaper('A4', 'portrait');
		$this->pdf->filename = "Invoice-". $id ;
		$this->pdf->load_view('admin/invoice/invoice_download_pdf', $data);
	}



	// Invoice Bank Payment
	public function bank_payment()
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		is_logged_in_admin();
		is_logged_in();
		$data['title'] = "Bank Payment";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		// Tampilkan Data Bank Payment
		$data['bank_payment'] = $this->db->get("bank_payment")->result();

		$this->form_validation->set_rules("bank_name", " ", "required", [
			"required" => "Nama Bank tidak boleh kosong"
		]);
		$this->form_validation->set_rules("on_behalf_of_the", " ", "required", [
			"required" => "Nama Pemilik Bank tidak boleh kosong"
		]);
		$this->form_validation->set_rules("account_number", " ", "required", [
			"required" => "Nomor rekening tidak boleh kosong"
		]);
		if($this->form_validation->run() == false) {
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);
			$this->load->view('admin/invoice/bank_payment', $data);
			$this->load->view('templates/admin/footer', $data);
		}else{
			$data = [
				"bank_name" => htmlspecialchars($this->input->post("bank_name")),
				"on_behalf_of_the" => htmlspecialchars($this->input->post("on_behalf_of_the")),
				"account_number" => htmlspecialchars($this->input->post("account_number"))
			];

			$this->db->insert("bank_payment", $data);
			alert("bank_payment", "Selamat tambah data bank payment berhasil");
			redirect("invoice_bank_payment");
			
		}
	}


	public function bank_payment_delete($id)
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		$this->db->delete("bank_payment", ['id' => $id]);
		alert("bank_payment", "Selamat Hapus data bank payment berhasil");
		redirect("invoice_bank_payment");
	}


	public function invoice_give_resi()
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		is_logged_in_admin();
		is_logged_in();

		if($this->input->is_ajax_request() == true ) {
			$resi = $this->input->post("name_resi");
			$id = $this->input->post("id");
			$this->db->set('resi', $resi);
			$this->db->where('id', $id);
			$this->db->update('invoice');
		}
	}


	public function invoice_status_down($id)
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		is_logged_in_admin();
		is_logged_in();
		$this->Invoice_model->update_invoice_down($id);
		redirect('invoice_admin');
	}



}
