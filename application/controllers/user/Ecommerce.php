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

		// Query Product
		// $data['list_product'] = $this->Ecommerce_model->get_product();

		//konfigurasi pagination
		$config['base_url'] =  site_url('ecommerce');
		$config['total_rows'] = $this->db->count_all('product'); //total row
		$config['per_page'] = 12;  //show record per halaman
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
		if( $this->input->post('keyword')) {
			$keyword = $this->input->post('keyword');
			$this->db->like('product.name', $keyword);
			$this->db->or_like('product_category.name', $keyword);
			$this->db->select('*, product.name as name');
			$this->db->from('product');
			$this->db->join('product_category', 'product_category.id = product.category_id');
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
			"key: f7a871e6101e1700265f71ae65328cd3"
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

		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = "Checkout ";
			$this->load->view('user/ecommerce/checkout', $data);
		}else{
			$user = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

			date_default_timezone_get("Asia/Jakarta");
			$invoice = [
				'fullname' 			=> htmlspecialchars($this->input->post('fullname', true)),
				'address' 			=> htmlspecialchars($this->input->post('address', true)),
				'phone' 			=> htmlspecialchars($this->input->post('phone', true)),
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
			"key: f7a871e6101e1700265f71ae65328cd3"
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
					echo "<option value='". $city['city_id'] ."'>" . $city['city_name'] . "</option>";
				}

			}


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
	

}
