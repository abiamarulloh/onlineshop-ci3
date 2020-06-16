<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Auth_model');
	}


	public function index()
	{
		// Social Media
		$data['social_media'] = $this->db->get("social_media")->result();
		// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();
		
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

		// Social Media
		$data['social_media'] = $this->db->get("social_media")->result();

		// query data wagiman di footer
		$data['about'] = $this->db->get("about")->row();

		

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
			'smtp_host' 	=> 'ssl://mail.wagimansupply.com',
			'smtp_user' 	=> 'hello@wagimansupply.com',  // Email gmail
			'smtp_pass'   	=> 'n5W32JYkTBSm4MM',  // Password gmail
			'smtp_port'   	=> 465,
			'mailtype'  	=> 'html',
			'charset'   	=> 'utf-8',
			'newline' 		=> "\r\n"
		];

		// Load library email dan konfigurasinya
		$this->email->initialize($config);

		// Email dan nama pengirim
		$this->email->from('hello@wagimansupply.com', 'wagimansupply.com');

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
				<title>Token Aktivasi Akun Wagiman Supply</title>
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
		}elseif($type = "forgot"){
			// Subject email
			$this->email->subject('Token verifikasi lupa password Akun Wagiman Supply');
		
			// Isi email

			$message = "
			<html>
			<head>
				<title>Token verifikasi lupa password Akun Wagiman Supply</title>
			</head>
			<body>
				<h1>Hai, " . $this->input->post('email')  .  "</h1>
				<p>Silahkan Klik untuk melakukan verifikasi akun Wagiman Supply mu. 
				</p>	
				
				<a href='" . base_url() . 'auth/resetpassword?email=' . $this->input->post('email',true) . '&token=' . urlencode($token) . "'>Reset Password</a> 

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

	// Forgot Password
	public function forgotpassword(){
		
		// Social Media
		$data['social_media'] = $this->db->get("social_media")->result();
		$this->form_validation->set_rules('email', '', 'required|valid_email', [
			'required' => "Email harus dilengkapi!" ,
			'valid_email' => "Email yang anda masukkan tidak valid!"
		]);
		if($this->form_validation->run() == FALSE) {
			// query data wagiman di footer
			$data['about'] = $this->db->get("about")->row();
			$data['title'] = "Lupa Password";
			$this->load->view('templates/user/header', $data);
			$this->load->view('templates/user/navbar', $data);
			$this->load->view('auth/forgotpassword', $data);
			$this->load->view('templates/user/footer', $data);
		}else{

			$email = $this->input->post('email');
			$user = $this->db->get_where('auth', ['email' => $email, 'is_actived' => 1])->row_array();

			if($user){
				// Siapkan Token Aktivasi
				$token = base64_encode(random_bytes(32));

				$auth_token = [
					'email' 		=> $this->input->post('email',true),
					'token' 		=> $token,
					'created_date' 	=> time()
				];

				$this->db->insert('auth_token',$auth_token);

				$this->_sendMail($token , 'forgot');


				$this->session->set_flashdata("auth", '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Tolong, Check email mu untuk mereset password</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
				redirect('forgotpassword');
			}else{
				$this->session->set_flashdata("auth", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Email Belum terdaftar atau belum teraktifasi</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('forgotpassword');
			}


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


	public function resetpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$auth = $this->db->get_where('auth', ['email'=> $email])->row_array();
		if($auth){
			// Token
			$auth_token = $this->db->get_where('auth_token', ['token' => $token])->row_array();
			if($auth_token){
				$this->session->set_userdata("reset_email", $email );
				$this->changePassword();
			}else{
				$this->session->set_flashdata("auth", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Gagal !, Token salah.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('forgotpassword');
			}

		}else{
			$this->session->set_flashdata("auth", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Gagal !, email salah.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			redirect('forgotpassword');
		}

	}


	public function changePassword(){
		if(!$this->session->userdata("reset_email")) {
			redirect('auth');
		}

	
		// Social Media
		$data['social_media'] = $this->db->get("social_media")->result();

		$this->form_validation->set_rules('password1', '', 'required|min_length[6]', [
			'required' => "Password harus dilengkapi !",
			'min_length' => "Password tidak boleh kurang dari 6 karakter"
		]);
		$this->form_validation->set_rules('password2', '', 'required|matches[password1]', [
			'required' => "Konfirmasi Password harus dilengkapi !",
			'matches' => "Password Tidak Sama !"
		]);
		if($this->form_validation->run() == false){
			// query data wagiman di footer
			$data['about'] = $this->db->get("about")->row();
			$data['title'] = "Ganti Password";
			$this->load->view('templates/user/header', $data);
			$this->load->view('templates/user/navbar', $data);
			$this->load->view('auth/changePassword', $data);
			$this->load->view('templates/user/footer', $data);
		}else{
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set("password", $password);
			$this->db->where("email" , $email);
			$this->db->update("auth");

			$this->db->delete("auth_token", ['email' => $email]);
			$this->session->unset_userdata("reset_email");
			$this->session->set_flashdata("auth", '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Password berhasil diupdate, silahkan login !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			redirect('auth');
		}
	}



	
}