<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
		$this->load->model('Invoice_model');
		is_logged_in_member();
		is_logged_in();
	}

	public function index()
	{	

		// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();


		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		$id_auth = $data['user']->id;
		$data['list_invoice_by_auth'] = $this->Invoice_model->get_invoice_by_auth($id_auth);

		$this->form_validation->set_rules('fullname', '', 'required',[
			"required" => 'Nama Lengkap harus dilengkapi !'
		]);

		$this->form_validation->set_rules('phone', '', 'integer|min_length[10]',[
			"integer" => 'No Hp harus berupa angka !',
			"min_length" => "Mohon Masukkan Nomor yang benar"
		]);

		$this->form_validation->set_rules('password', '', 'min_length[6]',[
			"required" => 'Password harus dilengkapi !',
			"min_length" => 'Password minimal 6 karakter !'
		]);

		$this->form_validation->set_rules('address', '', 'min_length[10]',[
			"min_length" => 'Alamat Terlalu singkat !'
		]);

		if ($this->form_validation->run() == FALSE)
		{
		
			$data['title'] = "Member";
			$this->load->view('templates/user/header', $data);
			$this->load->view('templates/user/navbar', $data);
			$this->load->view('user/member/index', $data);
			$this->load->view('templates/user/footer', $data);
		}else{
			$id	 				= htmlspecialchars($this->input->post('id', true) );
			$fullname 			= htmlspecialchars($this->input->post('fullname', true) );
			$phone 				= htmlspecialchars($this->input->post('phone', true) );
			$address 				= htmlspecialchars($this->input->post('address', true) );
			
			$updated_date 		= time();


			// Cek Jika ada gambar yang di upload
			$upload_image = $_FILES['image']['name'];

			if($upload_image){
				$config['upload_path'] = "assets/user/images/profile";
				$config['allowed_types'] = "jpg|jpeg|png";
				$config['max_size'] = "2048" ;
				$this->load->library('upload', $config);
				
				if($this->upload->do_upload("image")){
					$Query_foto_lama = $this->db->get_where("auth", ['id' => $id])->row_array();
					$foto_lama = $Query_foto_lama['image'];

					if($foto_lama != "default.png"){
						unlink(FCPATH . "assets/user/images/profile/" . $foto_lama);
					}

					$image_new = $this->upload->data("file_name");
					$this->db->set("image", $image_new );
				}else {
					echo $this->upload->display_errors();
				}

			}
			
			$this->db->set("fullname", $fullname );
			$this->db->set("phone", $phone );
			$this->db->set("address", $address );

			// Jika inputan tidak kosong maka isi password 
			if($this->input->post("password") != null) {
				$password 			= password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
				$this->db->set("password", $password );
			}
			
			$this->db->set("updated_date", $updated_date );
		
			$this->db->where('id', $id);
			$this->db->update('auth');
			alert("member", "Yey, Profile " . $fullname . " telah berhasil diupdate.");
			redirect('member');
		}	
	}


	public  function update_image_payment($invoice_id){
			$invoice_id	 		= $this->input->post('invoice_id', true);

			// Cek Jika ada gambar yang di upload
			$upload_image = $_FILES['image']['name'];

			if($upload_image){
				$config['upload_path'] = "./assets/user/images/payment/";
				$config['allowed_types'] = "jpg|jpeg|png";
				$config['max_size'] = "2048" ;
				$this->load->library('upload', $config);

				if($this->upload->do_upload("image")){
					$Query_foto_lama = $this->db->get_where("invoice", ['id' => $invoice_id])->row_array();
					$foto_lama = $Query_foto_lama['image_payment'];

					if($foto_lama != "No-Image-Available.png") {
						unlink(FCPATH . "./assets/user/images/payment/" . $foto_lama);
					}

					$image_new = $this->upload->data("file_name");
					$this->db->set("image_payment", $image_new );
				}else {
					alert("reject_image_payment", "Upload gambar berekstensi : .jpg , .png atau .jpeg, ", 'error');
					redirect("member");
				}

			}else {
				alert("reject_image_payment", "Pilih gambar terlebih dulu", 'error');
				redirect("member");
			}
			
			$this->db->where('id' , $invoice_id);
			$this->db->update("invoice");
			alert("invoice", "Yey, Gambar Bukti Pembayaran pada invoice ". $invoice_id ." Berhasil ditambahkan.");
			redirect('member');
	
	}


	// Menampilkan Gambar di modal
	public function update_image_payment_id(){
		if($this->input->is_ajax_request()){
			$id = $this->input->post('id');
			$invoice = $this->db->get_where("invoice", ['id' => $id])->row();
			echo json_encode($invoice);
		}	
	}



	// Detail Invoice
	public function detail_invoice_member($id){

		// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
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
	

		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/member/detail_invoice', $data);
		$this->load->view('templates/user/footer', $data);
	}

	

}
