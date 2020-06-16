<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restorasi_vespa extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
		$this->load->model('Restorasi_model');
		is_logged_in_admin();
		is_logged_in();
	}

	public function index()
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		// Query  tabel Restorasi
		$data['restorasi_vespa'] = $this->db->get("restorasi")->result();
		$data['title'] = "Restorasi";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/restorasi_vespa/index', $data);
		$this->load->view('templates/admin/footer', $data);
	}

	public function publish_restorasi()
	{	
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		$this->form_validation->set_rules('name_restorasi', '', 'required',[
			"required" => 'Nama Restorasi harus dilengkapi !'
		]);

		$this->form_validation->set_rules('description', '', 'required',[
			"required" => 'Deskripsi Restorasi harus dilengkapi !'
		]);
	

		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = "Publish Restorasi";
			$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);
			$this->load->view('admin/restorasi_vespa/publish_restorasi', $data);
			$this->load->view('templates/admin/footer', $data);
		}else{
			$name_restorasi 	= htmlspecialchars($this->input->post('name_restorasi', true) );
			$description 		= $this->input->post('description');
			$created_date 		= time();

					// Cek Jika ada gambar yang di upload
					$upload_image = $_FILES['image']['name'];

					if($upload_image){
						$config['upload_path'] = "./assets/admin/img/restorasi";
						$config['allowed_types'] = "jpg|jpeg|png";
						$config['max_size'] = "2048" ;
						$this->load->library('upload', $config);
						
						if($this->upload->do_upload("image")){
							$image_new = $this->upload->data("file_name");
							$this->db->set("image", $image_new );
						}else {
							echo $this->upload->display_errors();
						}
		
					}

			$this->db->set("name_restorasi", $name_restorasi );
			$this->db->set("description", $description );
			$this->db->set("created_date", $created_date );

			$this->db->insert('restorasi');
			alert("restorasi", "Selamat Data Restorasi Berhasil ditambahkan");
			redirect('restorasi_admin');
		}	
		
	}




	public function edit_restorasi($id)
	{	
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();

		// Query  tabel Restorasi berdasarkan ID
		$data['restorasi_vespa'] = $this->db->get_where("restorasi", ['id' => $id])->row();

		$this->form_validation->set_rules('name_restorasi', '', 'required',[
			"required" => 'Nama Restorasi harus dilengkapi !'
		]);

		$this->form_validation->set_rules('description', '', 'required',[
			"required" => 'Deskripsi Restorasi harus dilengkapi !'
		]);
	

		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = "Publish Restorasi";
			$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);
			$this->load->view('admin/restorasi_vespa/edit_restorasi', $data);
			$this->load->view('templates/admin/footer', $data);
		}else{
			$id = htmlspecialchars($this->input->post('id'));
			$name_restorasi 	= htmlspecialchars($this->input->post('name_restorasi', true) );
			$description 		= $this->input->post('description');
			$created_date 		= time();

			// Cek Jika ada gambar yang di upload
			$upload_image = $_FILES['image']['name'];

			if($upload_image){
				$config['upload_path'] = "./assets/admin/img/restorasi";
				$config['allowed_types'] = "jpg|jpeg|png";
				$config['max_size'] = "2048" ;
				$this->load->library('upload', $config);
				
				if($this->upload->do_upload("image")){
					$Query_foto_lama = $this->db->get_where("restorasi", ['id' => $id])->row_array();
					$foto_lama = $Query_foto_lama['image'];

					unlink(FCPATH . "./assets/admin/img/restorasi/" . $foto_lama);

					$image_new = $this->upload->data("file_name");
					$this->db->set("image", $image_new );
				}else {
					echo $this->upload->display_errors();
				}

			}


			$this->db->set("name_restorasi", $name_restorasi );
			$this->db->set("description", $description );
			$this->db->set("created_date", $created_date );

			$this->db->where('id', $id);
			$this->db->update('restorasi');
			alert("restorasi", "Selamat Data Restorasi Berhasil diPerbarui");
			redirect('restorasi_admin');
		}	
		
	}


	

	public function delete_restorasi($id)
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		$Query_delete_foto = $this->db->get_where("restorasi", ['id' => $id])->row_array();
		$delete_foto = $Query_delete_foto['image'];
		unlink(FCPATH . "./assets/admin/img/restorasi/" . $delete_foto);

		$query = $this->db->get_where('restorasi', ['id' => $id])->row();
		$this->db->delete("restorasi", ['id' => $id]);
		alert("restorasi", "Selamat Data Restorasi Berhasil dihapus");
		redirect('restorasi_admin');
	}



		// Upload Image Thumbnails
		public function restorasi_image_multiple($id)
		{
					// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
			$data['id'] = $id;
	
			$data['image_thumbnails'] = $this->db->get_where("image_restorasi", ["restorasi_id" => $id])->result();
	
			$this->form_validation->set_rules('id', "", "required",[
				"required" => "Id tidak boleh kosong"
			]);
	
			if($this->form_validation->run() == FALSE) {
				$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
				$data['title'] = "Tambah Gambar Thumbnails product Ecommerce";
				$this->load->view('templates/admin/header', $data);
				$this->load->view('templates/admin/sidebar', $data);
				$this->load->view('templates/admin/topbar', $data);
				$this->load->view('admin/restorasi_vespa/restorasi_image_multiple', $data);
				$this->load->view('templates/admin/footer', $data);
	
			}else{
				
				// Hitung Jumlah File/Gambar yang dipilih
				$jumlahData = count($_FILES['gambar']['name']);
	
				// Lakukan Perulangan dengan maksimal ulang Jumlah File yang dipilih
				$uploadData = [];
				for ($i=0; $i < $jumlahData ; $i++):
	
					// Inisialisasi Nama,Tipe,Dll.
					$_FILES['file']['name']     = $_FILES['gambar']['name'][$i];
					$_FILES['file']['type']     = $_FILES['gambar']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
					$_FILES['file']['size']     = $_FILES['gambar']['size'][$i];
	
					// Konfigurasi Upload
					$config['upload_path']          = './assets/admin/img/restorasi/restorasi_thumbnails';
					$config['allowed_types']        = 'jpg|png|jpeg';
					$config['max_size'] = "2048" ;
	
					// Memanggil Library Upload dan Setting Konfigurasi
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
	
					if($this->upload->do_upload('file')){ // Jika Berhasil Upload
	
						$fileData = $this->upload->data(); // Lakukan Upload Data
	
						// Membuat Variable untuk dimasukkan ke Database
						$uploadData[$i]['image_name'] = $fileData['file_name']; 
						$uploadData[$i]['restorasi_id'] = $id;
					}
	
				endfor; // Penutup For
	
				if($uploadData !== null){ // Jika Berhasil Upload
	
					// Insert ke Database 
	
					$insert = $this->Restorasi_model->upload($uploadData);
					
	
					if($insert){ // Jika Berhasil Insert
						alert("restorasi_image_thumnails", "Upload thumbnail berhasil");
						redirect("restorasi_image_multiple/" . $id);	
					}else{ // Jika Tidak Berhasil Insert
						alert("restorasi_image_thumnails", "Upload thumbnail gagal, masukkan file berekstensi, .jpg ,.png ,.jpeg", 'error');
						redirect("restorasi_image_multiple/" . $id);
					}
	
				}
		
	
			
	
			 }
		}
	
	
		public function restorasi_image_multiple_delete($id)
		{
					// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
			$Query_delete_foto = $this->db->get_where("image_restorasi", ['id' => $id])->row_array();
			$delete_foto = $Query_delete_foto['image_name'];
			unlink(FCPATH . "./assets/admin/img/restorasi/restorasi_thumbnails" . $delete_foto);
	
			$query = $this->db->get_where('image_restorasi', ['id' => $id])->row();
			$this->db->delete("image_restorasi", ['id' => $id]);
			alert("restorasi_image_thumnails", "Gambar berhasil dihapus");
			redirect('restorasi_image_multiple/' . $query->restorasi_id);
		}


}