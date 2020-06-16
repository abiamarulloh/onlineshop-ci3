<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
	public  function __construct()
	{
		parent::__construct();
		is_logged_in_admin();
		is_logged_in();
	}

public function index()
{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();

		$data['about'] = $this->db->get("about")->row();
		
		$data['provinsi'] = $this->db->get("province")->result();
		$data['city'] = $this->db->get("city")->result();


		$data['title'] = "About";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/about/index', $data);
		$this->load->view('templates/admin/footer', $data);
		
	}


	// Edit About Wagiman Supply admin
	public  function about_post_admin($id)
	{
		$data['provinsi'] = $this->db->get("province")->result();
		// $data['city'] = $this->db->get("city")->result();


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

		$this->form_validation->set_rules("phone", "", "required|integer",[
			"required" => "No Phone harus dilengkapi !",
			"integer" => "No Phone harus berupa angka saja"
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
			$this->load->view('admin/about/about_post', $data);
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
					$Query_foto_lama = $this->db->get_where("about", ['id' => $id])->row_array();
					$foto_lama = $Query_foto_lama['image'];

					if($foto_lama != "No-Image-Available.png") {
						unlink(FCPATH . "./assets/admin/img/about/" . $foto_lama);
					}

					$image_new = $this->upload->data("file_name");
					$this->db->set("image", $image_new );
				}else {
					alert("about", "Upload gambar harus berekstensi, .jpg , .png , .jpeg", 'error');
					redirect('about_post_admin/' . $id);
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
			
			$this->db->update('about', ['id' => $id ]);
			alert("about", "Selamat About Berhasil diupdate");
			redirect('about_admin');

		}
	}


	// Menu Setting
public function menu_setting()
{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		$data['menu'] = $this->db->get("menu_member")->result();
		$data['title'] = "Menu Setting";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/menu_setting/index', $data);
		$this->load->view('templates/admin/footer', $data);
	}

	public function menu_setting_add()
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		$data['title'] = "Tambah Menu";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		$data = [
			"title" => $this->input->post('title'),
			"url" => $this->input->post('url'),
			"icon" => $this->input->post('icon')
		];

		$this->db->insert("menu_member", $data);
		alert("menu", "Menu baru berhasil ditambahkan");
		redirect("menu_setting");
	
	}


	public function menu_setting_edit($id)
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		$this->form_validation->set_rules("title", "", "required", [
			"required" => "Nama Menu tidak boleh kosong !"
		]);
		$this->form_validation->set_rules("url", "", "required", [
			"required" => "URL tidak boleh kosong !"
		]);
		$this->form_validation->set_rules("icon", "", "required", [
			"required" => "Icon tidak boleh kosong !"
		]);

		if($this->form_validation->run() == FALSE) {
			$data['menu_by_id'] = $this->db->get_where("menu_member", ['id' => $id])->row();
			$data['title'] = "Menu Setting";
			$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);
			$this->load->view('admin/menu_setting/menu_setting_edit', $data);
			$this->load->view('templates/admin/footer', $data);
		}else{
			$data = [
				'title' => htmlspecialchars($this->input->post("title")),
				'url' => htmlspecialchars($this->input->post("url")),
				'icon' => htmlspecialchars($this->input->post("icon"))
			];

			$this->db->where("id", $id);
			$this->db->update("menu_member", $data);
			alert("menu", "Menu berhasil diperbarui");
			redirect("menu_setting");
		}
	}

	

	//Carausel Setting
	public function carausel_setting()
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		// Menampilkan Carausel di menu
		$this->db->select("*, menu_member.title as menu_name");
		$this->db->from('carausel');
		$this->db->join("menu_member", "carausel.menu_id = menu_member.id");
		$data['carausel'] = $this->db->get()->result(); 


		$data['menu'] = $this->db->get("menu_member")->result();
		$data['title'] = "Carausel Setting";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/carausel_setting/index', $data);
		$this->load->view('templates/admin/footer', $data);
	}

	public function carausel_setting_add()
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		$data['title'] = "Tambah Carausel";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		$menu = htmlspecialchars($this->input->post('menu_id'));

		// Cek Jika ada gambar yang di upload
		$upload_image = $_FILES['image']['name'];

		if($upload_image){
			$config['upload_path'] = "./assets/user/images/carausel/";
			$config['allowed_types'] = "jpg|jpeg|png";
			$config['max_size'] = "2048" ;
			$this->load->library('upload', $config);
			
			if($this->upload->do_upload("image")){
				$image = $this->upload->data("file_name");
				$this->db->set("image", $image );
			}

		}
	
		$this->db->set("menu_id", $menu);
		$this->db->insert("carausel");
		alert("carausel", "Carausel baru berhasil ditambahkan");
		redirect("carausel_setting");
	
	}


	public function carausel_setting_delete($id)
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		$Query_delete_foto = $this->db->get_where("carausel", ['id' => $id])->row_array();
		$delete_foto = $Query_delete_foto['image'];
		unlink(FCPATH . "./assets/user/images/carausel/" . $delete_foto);

		$query = $this->db->get_where('carausel', ['id' => $id])->row();
		$this->db->delete("carausel", ['id' => $id]);
		alert("carausel", "Carausel berhasil dihapus", "error");
		redirect("carausel_setting");
	}


	public function on_change_active()
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		// Menampilkan Carausel di menu
		$this->db->select("*, menu_member.title as menu_name, carausel.id as carausel_id");
		$this->db->from('carausel');
		$this->db->join("menu_member", "carausel.menu_id = menu_member.id");
		$data['carausel'] = $this->db->get()->result(); 

		$data['title'] = "Aktif Carausel";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/carausel_setting/on_change_active', $data);
		$this->load->view('templates/admin/footer', $data);

		
	}

	public function change_active()
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();

		$status = htmlspecialchars($this->input->post('status'));
		$carausel_id = htmlspecialchars($this->input->post('carausel_id'));
		$carausel = $this->db->get_where("carausel", ['id' => $carausel_id])->row(); 
		if( $carausel->status == 0){
			$this->db->set("status",  $carausel->status + 1);
		}elseif($carausel->status == 1){
			$this->db->set("status",  $carausel->status - 1);
		}

		$this->db->where("id" , $carausel->id);
		$this->db->update("carausel");
	}



	// Social Media
	public function sosmed_setting()
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		// Menampilkan Carausel di menu
		$data['sosmed'] = $this->db->get("social_media")->result();
		$data['title'] = "Sosmed Setting";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/sosmed_setting/index', $data);
		$this->load->view('templates/admin/footer', $data);
	}

	public function sosmed_setting_add()
	{
				// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		$data['title'] = "Tambah Sosmed";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();

		$data = [
			"title" => $this->input->post('title'),
			"url" => $this->input->post('url'),
			"icon" => $this->input->post('icon')
		];

		$this->db->insert("social_media", $data);
		alert("sosmed", "Sosmed baru berhasil ditambahkan");
		redirect("sosmed_setting");
	}

	public function sosmed_setting_delete($id){
		// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		$Query_delete_foto = $this->db->get_where("social_media", ['id' => $id])->row_array();

		$query = $this->db->get_where('social_media', ['id' => $id])->row();
		$this->db->delete("social_media",['id' => $id]);
		$this->session->set_flashdata('sosmed', '<div class="alert alert-danger" role="alert">  </div>');
		alert("sosmed", "Sosmed " . $query->title . " berhasil dihapus !", 'error');
		redirect('sosmed_setting');
	}


}