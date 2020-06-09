<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Auth_model');
	}


	public function index()
	{
		if($this->session->has_userdata('email') == true){
			if($this->session->userdata('role_id') == 1 ){
				redirect('dashboard');
			}else{
				redirect('member');
			}
		}
		
		$data['title'] = "Online Shop";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		
		$data['title'] = "Login - Wagiman Supply";
		
		$this->form_validation->set_rules('email', '', 'required|valid_email', [
			'required' => "Email harus dilengkapi!" ,
			'valid_email' => "Email yang anda masukkan tidak valid!"
		]);
		$this->form_validation->set_rules('password', '', 'required', [
			'required' => "Password  harus dilengkapi !",
		]);

		if($this->form_validation->run() == false){
			$this->load->view('templates/user/header', $data);
			$this->load->view('templates/user/navbar', $data);
			$this->load->view('auth/login', $data);
			$this->load->view('templates/user/footer', $data);
		}else{
			$this->_login();
		}
	}

	private function _login(){
		// input user
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// user tabel
		$user = $this->db->get_where('auth', ['email' => $email])->row_array();
		
		if($user) {
			if(password_verify($password, $user['password'])) {
				
				$data = [
					'email' => $user['email'],
					'role_id' => $user['role_id'],
				];

				$this->session->set_userdata($data);
		
				// Update Last Login
				$this->db->set(['last_login' => time()]);
				$this->db->where('email', $user['email']);
				$this->db->update("auth");
		
				if($data['role_id'] == 1) {
					redirect("dashboard");
				}else{
					redirect("member");
				}
			}else{
				$this->session->set_flashdata("auth", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Password Salah</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
			redirect('login');
			}

		}else {
			$this->session->set_flashdata("auth", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Email Tidak Terdaftar</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
			redirect('login');
		}

	}
  
	public function register()
	{
		if($this->session->has_userdata('email') == true){
			if($this->session->userdata('role_id') == 1 ){
				redirect('dashboard');
			}else{
				redirect('member');
			}
		}

		$data['title'] = "Register";
		$data['user'] = $this->db->get_where('auth', ['email' => $this->session->userdata('email') ] )->row();
		
		$this->form_validation->set_rules('fullname', '', 'required', [
			'required' => "Nama Lengkap harus diisi !"
		]);
		$this->form_validation->set_rules('email', '', 'required|valid_email', [
			'required' => "Email harus dilengkapi !",
			"valid_email" => "Email yang anda masukkan tidak valid !"
		]);
		$this->form_validation->set_rules('password1', '', 'required|min_length[6]', [
			'required' => "Password harus dilengkapi !",
			'min_length' => "Password tidak boleh kurang dari 6 karakter"
		]);
		$this->form_validation->set_rules('password2', '', 'required|matches[password1]', [
			'required' => "Konfirmasi Password harus dilengkapi !",
			'matches' => "Password Tidak Sama !"
		]);
		if($this->form_validation->run() == false){
			$this->load->view('templates/user/header', $data);
			$this->load->view('templates/user/navbar', $data);
			$this->load->view('auth/register', $data);
			$this->load->view('templates/user/footer', $data);  
		}else{
			$data = [
				'role_id' 		=> 2,
				'image' 		=> 'default.png',
				'fullname' 		=> htmlspecialchars($this->input->post('fullname',true)),
				'email' 		=> htmlspecialchars($this->input->post('email',true)),
				'password' 		=> password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
				'is_actived'	=> 0,
				'created_date'	=> time()
			];


			// Siapkan Token Aktivasi
			$token = base64_encode(random_bytes(32));

			$auth_token = [
				'email' 		=> $this->input->post('email',true),
				'token' 		=> $token,
				'created_date' 	=> time()
			];


			
			$this->db->insert('auth',$data);
			$this->db->insert('auth_token',$auth_token);

			$this->_sendMail($token, 'verify');


			$this->session->set_flashdata("auth", '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Pendaftaran akun berhasil, Check emailmu untuk melakukan aktivasi akun!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
			redirect('register');
		}
	}


	private function _sendMail($token, $type)
	{
		// Konfigurasi email
		$config = [
			'protocol'  	=> 'smtp',
			'smtp_host' 	=> 'ssl://mail.abiamarulloh.my.id',
			'smtp_user' 	=> 'honhon@abiamarulloh.my.id',  // Email gmail
			'smtp_pass'   	=> 'QwePoiMz12345@',  // Password gmail
			'smtp_port'   	=> 465,
			'mailtype'  	=> 'html',
			'charset'   	=> 'utf-8',
			'newline' 		=> "\r\n"
		];

		// Load library email dan konfigurasinya
		$this->email->initialize($config);

		// Email dan nama pengirim
		$this->email->from('honhon@abiamarulloh.my.id', 'abi.com');

		// Email penerima
		$this->email->to($this->input->post('email', true)); // Ganti dengan email tujuan

		if($type == 'verify') 
		{

			// Subject email
			$this->email->subject('Token Aktivasi Akun Wagiman Supply');
	
			// Isi email
	
			$message = "
			<html>
			<head>
				<title>Send Email</title>
			</head>
			<body>
				<h1>Hai, " . $this->input->post('fullname')  .  "</h1>
				<p>Silahkan Klik untuk mengaktivasi akun Wagiman Supply mu. 
				</p>	
				
				<a href='" . base_url() . 'auth/verify?email=' . $this->input->post('email',true) . '&token=' . urlencode($token) . "'>Aktivasi Akun</a> 
	
			</body>
			</html>
			";
			$this->email->message($message);
		}



		// Tampilkan pesan sukses atau error
		if ($this->email->send()) {
			return true;
		}else{
			echo $this->email->print_debugger();
		}
		
	}


	public function verify(){
		// ambil data dari url
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$auth = $this->db->get_where('auth', ['email' => $email])->row();

		if($auth){

			$auth_token = $this->db->get_where('auth_token', ['token' => $token])->row();
			if($auth_token) {

				if(time() - $auth_token->created_date < (60*60*24) ){

					$this->db->set('is_actived', 1);
					$this->db->where(['email' => $email]);
					$this->db->update('auth');

					$this->db->delete('auth_token', ['email' => $email]);

					$this->session->set_flashdata("auth", '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong><small>Email '. $email .' berhasil melakukan aktivasi akun Wagiman Supply, Silahkan Masuk !</small></strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>');
					redirect('auth');

				}else{

					$this->db->delete('auth', ['email' => $email]);
					$this->db->delete('auth_token', ['email' => $email]);

					$this->session->set_flashdata("auth", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Token Aktivasi Kadaluarsa setelah 1 * 24 Jam, Silahkan daftar kembali !</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>');
					redirect('login');
				}

			}else {
				$this->session->set_flashdata("auth", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Token Aktivasi salah, Silahkan daftar terlebih dulu !</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('login');
			}


		}else{
			$this->session->set_flashdata("auth", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Email salah, Silahkan daftar terlebih dulu !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			redirect('login');
		}


	}



	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata("auth", '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Anda Berhasil Logout</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>');
		redirect('login');
	}
}
