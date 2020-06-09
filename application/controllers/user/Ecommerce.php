<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommerce extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Ecommerce_model');
	}

	public function index()
	{
		$data['title'] = "Online Shop";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		$data['list_category'] = $this->Ecommerce_model->get_category();
		$data['list_brand'] = $this->Ecommerce_model->get_brand();

		//konfigurasi pagination
		$config['base_url'] =  site_url('ecommerce');
		$config['total_rows'] = $this->db->count_all('product'); //total row
		$config['per_page'] = 50;  //show record per halaman
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
	
		$this->pagination->initialize($config);
		$data['page'] = $this->uri->segment(2);
		$data['list_product'] = $this->Ecommerce_model->get_product_admin($config["per_page"], $data['page']);           

		// Kalo udh ditampilin semua data nya, baru bisa di buat searching
		if( $this->input->get('keyword')) {
			$keyword = $this->input->get('keyword');
			$this->db->like('product.name', $keyword);
			$this->db->or_like('product_category.name', $keyword);
			$this->db->or_like('brand.name', $keyword);
			$this->db->select('*, product.image as product_image ,product.name as product_name, product.id as product_id, product_category.name as category_name, brand.name as brand_name, brand.id as brand_id');
			$this->db->from('product');
			$this->db->join('product_category', 'product_category.id = product.category_id');
			$this->db->join('brand', 'brand.id = product.brand_id');
			$data['list_product'] = $this->db->get()->result();
		}

		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/ecommerce/index', $data);
		$this->load->view('templates/user/footer', $data);
	}

	public function add_to_cart($id){
		is_logged_in();


		$product = $this->Ecommerce_model->find($id);

		$data = array(
				'id'      => $product->id ,
				'qty'     => 1,
				'image'   => $product->image,
				'weight'  => $product->weight,
				'price'   => $product->price,
				'name'    => $product->name
		);
		
		$this->cart->insert($data);
		redirect('ecommerce');
	}


	public function cart(){
		is_logged_in();

		
		$data['title'] = "Cart ";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/ecommerce/cart', $data);
		$this->load->view('templates/user/footer', $data);
	}

	public function delete_cart(){
		is_logged_in();
		$this->cart->destroy();
		redirect("ecommerce");
	}


	public function checkout_ecommerce(){
		is_logged_in();



		// Data Provinsi 
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.rajaongkir.com/basic/province",
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

		$province = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$data['provinsi'] = json_decode($province);
		}


		// Data City 
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.rajaongkir.com/basic/city",
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

		$city = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$data['city'] = json_decode($city);
		}



		// Query About Sender 
		$data['sender'] = $this->db->get('about')->row();


		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();


		$this->form_validation->set_rules('fullname', '', 'required',[
			"required" => 'Nama lengkap harus dilengkapi !'
		]);

		$this->form_validation->set_rules('address', '', 'required',[
			"required" => 'Alamat Tujuan harus dilengkapi !'
		]);

		$this->form_validation->set_rules('phone', '', 'required',[
			"required" => 'No Telepon harus dilengkapi !'
		]);

		$this->form_validation->set_rules('province_receiver', '', 'is_natural_no_zero',[
			"is_natural_no_zero" => 'Provinsi tujuan harus dilengkapi !'
		]);

		$this->form_validation->set_rules('city_receiver', '', 'is_natural_no_zero',[
			"is_natural_no_zero" => 'Kota tujuan harus dilengkapi !'
		]);

		$this->form_validation->set_rules('ekspedisi', '', 'alpha',[
			"alpha" => 'Jenis Pengiriman  harus dilengkapi !'
		]);

		$this->form_validation->set_rules('sub_ekspedisi', '', 'alpha',[
			"alpha" => 'Jenis Service Pengiriman  harus dilengkapi !'
		]);




		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = "Checkout ";
			$this->load->view('user/ecommerce/checkout', $data);
		}else{
			$user = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

			date_default_timezone_get("Asia/Jakarta");
			$invoice = [
				'auth_id' 			=> htmlspecialchars($this->input->post('auth_id', true)),
				
				// Sender
				'province_sender' 	=> htmlspecialchars($this->input->post('province_sender', true)),
				'city_sender' 	=> htmlspecialchars($this->input->post('city_sender', true)),

				// Receiver
				'province_receiver' 	=> htmlspecialchars($this->input->post('province_receiver', true)),
				'city_receiver' 	=> htmlspecialchars($this->input->post('city_receiver', true)),

				'weight' 	=> htmlspecialchars($this->input->post('weight', true)),

				'ekspedisi' 	=> htmlspecialchars($this->input->post('ekspedisi', true)),

				'sub_ekspedisi' 	=> htmlspecialchars($this->input->post('sub_ekspedisi', true)),
				
				'image_payment'		=> "No-Image-Available.png",
				'date_buyying' 		=> time(),
				'dateline_buyying' 	=> time()+60*60*24*2
			];

			$this->db->insert('invoice', $invoice);
			$id_invoice = $this->db->insert_id();

			foreach ($this->cart->contents() as $item) {
				$data = array(
					'invoice_id' 	=> $id_invoice,
					'product_id' 	=> $item['id'],
					'auth_id' 		=> $user->id,
					'name'  		=> $item['name'],
					'grand_qty' 	=> $item['qty'],
					'grand_price' 	=> $item['price'],
					'created_date'	=> time()
				);

				$this->db->insert('order', $data);
				
			}
			redirect('ecommerce_success_buyying');
		}

	}




	public function checkout_form_finnaly_ekspedisi() {
		
		if($this->input->is_ajax_request()) {
			$city_sender = $this->input->post("city_sender");
			$city_receiver = $this->input->post("city_receiver");
			$weight = $this->input->post("weight");
			$ekspedisi = $this->input->post("ekspedisi");
			
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/basic/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=". $city_sender ."&destination=". $city_receiver ."&weight=". $weight ."&courier=". $ekspedisi,
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: 0575c15d25c683c7b81b8133971a25a8"
			),
			));
	
			$response_ekspedisi = curl_exec($curl);
			$err = curl_error($curl);
	
			curl_close($curl);
	
			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				echo "<option value='0'>Pilih Jenis Service Pengiriman</option>";
				 $response_ekspedisi = json_decode($response_ekspedisi);
				 foreach($response_ekspedisi->rajaongkir->results as $rajaongkir){
					 foreach ($rajaongkir->costs as $sub_ekspedisi ) {
						 echo "<option value='". $sub_ekspedisi->service ."''". set_select('sub_ekspedisi', $sub_ekspedisi->service) ."' >" . $sub_ekspedisi->description . "</option>";
						
					 }
				 }
			}
		}
	}


	public function checkout_form_finnaly_sub_ekspedisi() {
	
		if($this->input->is_ajax_request()) {
			$city_sender = $this->input->post("city_sender");
			$city_receiver = $this->input->post("city_receiver");
			$weight = $this->input->post("weight");
			$ekspedisi = $this->input->post("ekspedisi");
			$sub_ekspedisi = $this->input->post("sub_ekspedisi");
			
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/basic/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=". $city_sender ."&destination=". $city_receiver ."&weight=". $weight ."&courier=". $ekspedisi,
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: 0575c15d25c683c7b81b8133971a25a8"
			),
			));
	
			$response_sub_ekspedisi = curl_exec($curl);
			$err = curl_error($curl);
	
			curl_close($curl);
			
			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				$response_sub_ekspedisi = json_decode($response_sub_ekspedisi);
				foreach($response_sub_ekspedisi->rajaongkir->results as $rajaongkir){
					foreach ($rajaongkir->costs as $sub_ekspedisi_ ) {
						if($sub_ekspedisi_->service == $sub_ekspedisi){
							foreach ($sub_ekspedisi_->cost as $price){

								$grand_total = 0;
								if($cart = $this->cart->contents()) {

									// Looping
									foreach($cart as $item) {
										$grand_total += $item['subtotal'];
									}

									echo "Total belanja anda " . "Rp" . number_format($grand_total, 0, ",", "."); 
									echo " <br> ";
									echo "Ongkos Kirim " . "Rp" . number_format($price->value, 0, ",", ".") . " ( ". $price->etd  ." hari ) " ;
									echo " <br> ";
									echo "<hr class='bg-white'>";
									echo "Total Keseluruhan yang harus dibayarkan Rp" . number_format($grand_total +  $price->value, 0, " ", ".");
								}
							
							
							}
							
						}	
					}
				}
			}
		}
		
		
	
	
	}






	public function checkout_ecommerce_city($provinsi_id){

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/basic/city?&province=".$provinsi_id,
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

					echo "<option value='0'>Pilih Kota</option>";
				foreach($city['rajaongkir']['results'] as $city) {
					echo "<option value='". $city['city_id'] ."'  '". set_select('city_receiver', $city['city_id']) ."' >" . $city['type'] . " " .$city['city_name'] . "</option>";
				}

			}


		}


	}


	// Jika Kota tujuan belum di pilih maka Ekspedisi belum tampil
	public function checkout_form_finnaly_city_receiver(){
		$ekspedisi = [
			"jne" => "JNE",
			"tiki" => "TIKI",
			"pos" => "POS"
		];

		echo "<option value='0'>Pilih Jenis Pengiriman</option>";
		foreach ($ekspedisi as $key => $eks) {
			echo "<option value='". $key ."' '". set_select('ekspedisi', $key) ."'>" . $eks . "</option>";
		}

	}	





	public function checkout_success_buy(){
		is_logged_in();

		// Destroy Checkout Success
		$this->cart->destroy();

		$data['title'] = "Success ChekOut ";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/user/header', $data);
		$this->load->view('templates/user/navbar', $data);
		$this->load->view('user/ecommerce/checkout_success', $data);
		$this->load->view('templates/user/footer', $data);
	}




	// Ecommerce Preview 
	public function ecommerce_preview($id){
	
		if(empty($this->Ecommerce_model->get_product_by_id($id))){
			$data['title'] = "Not Found";
			$this->load->view('errors/notfound', $data);
		}else {
			$data['title'] = "Detail Product";
			$data['list_product_by_id'] = $this->Ecommerce_model->get_product_by_id($id)->result();
			$this->load->view('templates/user/header', $data);
			$this->load->view('templates/user/navbar', $data);
			$this->load->view('user/ecommerce/ecommerce_preview', $data);
			$this->load->view('templates/user/footer', $data);
		}
		
	}


	// Search By Category 
	public function search_by_category($id){
		$this->db->select('*, product.image as product_image ,product.name as product_name, product.id as product_id');
		$this->db->order_by('product.id', "DESC" );

		if($id == 0) {
			$product = $this->db->get('product')->result();
		}else{
			$product = $this->db->get_where('product', ['category_id' => $id])->result();
		}

		$product_json = json_encode($product);
		$product_array = json_decode($product_json);

		foreach ($product_array as $p_array) {
			echo 	'<div class="col-md-3 col-sm-12 mb-3 p-1">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white text-center">
                        <img src="' . base_url('assets/admin/img/ecommerce/') . $p_array->product_image . '" style="height:200px; width:200px;" class="card-img-top img-fluid p-2 image-zoom">
                    </div>
                    <div class="card-body">
                        <div class="card-title text-center">
                            <p class="card-text m-0">' . $p_array->product_name . '</p>
                            <small class="badge badge-pill badge-success m-0">Rp' . number_format($p_array->price) .'</small>
                        </div>
                        <div class="card-footer">
                            <a href="' .   base_url('ecommerce_add_to_cart/') . $p_array->product_id .'" class="btn btn-primary btn-block btn-sm" style="font-size:12px">Tambah ke keranjang</a> 
                            <a href="' .   base_url('ecommerce_preview/') . $p_array->product_id .'" class="btn btn-info btn-sm btn-block" style="font-size:12px">Detail</a>
                        </div>
                    </div>
                </div>
            </div>';
		}

	}



	// Search By Brand 
	public function search_by_brand($id){
		$this->db->select('*, product.image as product_image ,product.name as product_name, product.id as product_id');
		$this->db->order_by('product.id', "DESC" );

		if($id == 0) {
			$product = $this->db->get('product')->result();
		}else{
			$product = $this->db->get_where('product', ['brand_id' => $id])->result();
		}

		$product_json = json_encode($product);
		$product_array = json_decode($product_json);

		foreach ($product_array as $p_array) {
			echo 	'<div class="col-md-3 col-sm-12 mb-3 p-1">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white text-center">
                        <img src="' . base_url('assets/admin/img/ecommerce/') . $p_array->product_image . '" style="height:200px; width:200px;" class="card-img-top img-fluid p-2 image-zoom">
                    </div>
                    <div class="card-body">
                        <div class="card-title text-center">
                            <p class="card-text m-0">' . $p_array->product_name . '</p>
                            <small class="badge badge-pill badge-success m-0">Rp' . number_format($p_array->price) .'</small>
                        </div>
                        <div class="card-footer">
                            <a href="' .   base_url('ecommerce_add_to_cart/') . $p_array->product_id .'" class="btn btn-primary btn-block btn-sm" style="font-size:12px">Tambah ke keranjang</a> 
                            <a href="' .   base_url('ecommerce_preview/') . $p_array->product_id .'" class="btn btn-info btn-sm btn-block" style="font-size:12px">Detail</a>
                        </div>
                    </div>
                </div>
            </div>';
		}

	}


	
	

}