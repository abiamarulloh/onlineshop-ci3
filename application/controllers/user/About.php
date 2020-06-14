<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {


	public function index()
	{
		// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		
		$data['provinsi'] = $this->db->get("province")->result();
		$data['city'] = $this->db->get("city")->result();
		$data['about'] = $this->db->get("about")->row();
		$data['title'] = "About";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/about/index', $data);
		$this->load->view('templates/user/footer', $data);
	}


	// public function checkout_ecommerce_city($provinsi_id){

	// 	$curl = curl_init();

	// 	curl_setopt_array($curl, array(
	// 		CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$provinsi_id,
	// 		CURLOPT_RETURNTRANSFER => true,
	// 		CURLOPT_ENCODING => "",
	// 		CURLOPT_MAXREDIRS => 10,
	// 		CURLOPT_TIMEOUT => 30,
	// 		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	// 		CURLOPT_CUSTOMREQUEST => "GET",
	// 		CURLOPT_HTTPHEADER => array(
	// 		"key: 0575c15d25c683c7b81b8133971a25a8"
	// 		),
	// 	));

	// 	$response = curl_exec($curl);
	// 	$err = curl_error($curl);

	// 	curl_close($curl);

	// 	if ($err) {
	// 		echo "cURL Error #:" . $err;
	// 	} else {
	// 		$city = json_decode($response, true);
			

	// 		if($city['rajaongkir']['status']['code'] == "200") {

	// 			foreach($city['rajaongkir']['results'] as $city) {
	// 				echo "<option value='". $city['city_id'] ."' >" . $city['city_name'] . "</option>";
	// 			}

	// 		}

	// 	}

	// }




}
