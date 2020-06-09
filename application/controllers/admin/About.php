<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
		is_logged_in_admin();
		is_logged_in();
	}

	public function index()
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"key: 0575c15d25c683c7b81b8133971a25a8"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$data['provinsi'] = json_decode($response);
		}

		// Set Rules Form
		$this->form_validation->set_rules("web_name", "", "required",[
			"required" => "Nama Website harus dilengkapi !"
		]);

		$this->form_validation->set_rules("ceo", "", "required",[
			"required" => "CEO harus dilengkapi !"
		]);

		$this->form_validation->set_rules("description", "", "required",[
			"required" => "Deskripsi harus dilengkapi !"
		]);

		$this->form_validation->set_rules("address", "", "required",[
			"required" => "Alamat Lengkap harus dilengkapi !"
		]);

		$this->form_validation->set_rules("phone", "", "required",[
			"required" => "No Phone harus dilengkapi !"
		]);

		$this->form_validation->set_rules("email", "", "required",[
			"required" => "Email harus dilengkapi !"
		]);


		if($this->form_validation->run() == FALSE) {
			$data['title'] = "About";
			$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
			$data['about'] = $this->db->get("about")->row();
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);
			$this->load->view('admin/about/index', $data);
			$this->load->view('templates/admin/footer', $data);
		}else{
			$web_name 		= htmlspecialchars($this->input->post('web_name', true) );
			$ceo 			= htmlspecialchars($this->input->post('ceo', true) );
			$description 	= $this->input->post('description', true);
			$address 		= htmlspecialchars($this->input->post('address', true) );
			$phone 			= htmlspecialchars($this->input->post('phone', true) );
			$email 			= htmlspecialchars($this->input->post('email', true) );
			$province 		= htmlspecialchars($this->input->post('province', true) );
			$city 			= htmlspecialchars($this->input->post('city', true) );

			$created_date 	= time();

			// Cek Jika ada gambar yang di upload
			$upload_image = $_FILES['image']['name'];

			if($upload_image){
				$config['upload_path'] = "./assets/admin/img/about/";
				$config['allowed_types'] = "jpg|jpeg|png";
				$config['max_size'] = "2048" ;
				$this->load->library('upload', $config);
				
				if($this->upload->do_upload("image")){
					$Query_foto_lama = $this->db->get("about")->row_array();
					$foto_lama = $Query_foto_lama['image'];

					if($foto_lama != "No-Image-Available.png") {
						unlink(FCPATH . "./assets/admin/img/about/" . $foto_lama);
					}

					$image_new = $this->upload->data("file_name");
					$this->db->set("image", $image_new );
				}else {
					echo $this->upload->display_errors();
				}

			}
			
			$this->db->set("web_name", $web_name );
			$this->db->set("ceo", $ceo );
			$this->db->set("description", $description );
			$this->db->set("address", $address );
			$this->db->set("phone", $phone );
			$this->db->set("email", $email );
			if($province != 0) {
				$this->db->set("province", $province );
			}
			
			if($city != 0) {
				$this->db->set("city", $city );
			}
			$this->db->set("created_date", $created_date );
			
			$this->db->update('about', ['id' => 1]);
			$this->session->set_flashdata('about', '<div class="alert alert-success" role="alert"> Yey, About berhasil di update</div>');
			redirect('about_admin');

		}


		
	}



	public function checkout_ecommerce_city($provinsi_id){


		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$provinsi_id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
			"key: 0575c15d25c683c7b81b8133971a25a8"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$city = json_decode($response, true);
			

			if($city['rajaongkir']['status']['code'] == "200") {

				foreach($city['rajaongkir']['results'] as $city) {
					echo "<option value='". $city['city_id'] ."' >" .  $city['type'] . " "  . $city['city_name'] . "</option>";
				}

			}


		}


	}


}