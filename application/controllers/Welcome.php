<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		// Tampilan utama admin
		$this->load->model('queries');
		$chkAdminExist = $this->queries->chkAdminExist();
		// queries   : model  
		// chkAdminExist : function 
		$this->load->view('home', ['chkAdminExist' => $chkAdminExist]);

	}

	public function coadmin()
	{
		// Tampilan utama co admin
		$this->load->view('homecoadmin');
	}

	public function adminRegister(){
		// Untuk menampilkan register
		$this->load->model('queries');
		$roles_nana = $this->queries->getRolesnana();
		// roles_nana   : model  Queries
		// getRolesnana : function 
		$this->load->view('register', ['roles_nana' => $roles_nana]);
	}

	public function adminSignup(){
		// Untuk mengelola register
		$this->form_validation->set_rules('username','Username','required',['required' => 'Username Admin Wajib diisi !']);
		// ['required' => 'Nama Wajib diisi !'] : digunakan untuk mengganti pesan yang muncul kalau form username ini kosong, kita bisa edit sesuai yang kita mau
        // reqiuired : rules form nama harus diisi gaboleh kosong

		$this->form_validation->set_rules('email'   ,'Email'   ,'required',['required' => 'Email Admin Wajib diisi !']);
		$this->form_validation->set_rules('gender'  ,'Gender'  ,'required',['required' => 'Jenis Kelamin Wajib diisi !']);
		$this->form_validation->set_rules('role_id' ,'Role'    ,'required',['required' => 'Posisi Wajib diisi !']);
		$this->form_validation->set_rules('password','Password','required',['required' => 'Password Wajib diisi !']);
		$this->form_validation->set_rules('confpass','Konfirmasi Password','required',['required' => 'Password Wajib diisi !']);
		// diisi dengan parameter
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
	
		if ($this->form_validation->run()){
			$data_nana = $this->input->post();
			$data_nana['password'] = sha1($this->input->post('password'));
			$data_nana['confpass'] = sha1($this->input->post('confpass'));
			$this->load->model('queries');
			if($this->queries->registerAdmin($data_nana)){
			//registerAdmin : function di model queries

			$this->session->set_flashdata('message','Berhasil Mendaftarkan Admin');
			return redirect("welcome/adminRegister");

			}else{

			$this->session->set_flashdata('message','Gagal Mendaftarkan Admin');
			// message : nama flash_datanya
			return redirect("welcome/adminRegister");

			}

		}else{
			$this->adminRegister();
		}
	}

	public function loginadmin(){
		// Untuk menampilkan halama login
		if($this->session->userdata("user_id") )
		return redirect("admin/dashboard");
		// Ketika sudah login, maka untuk kembali ke halaman login hanya bisa menggunakan logout
		// Gbisa lewat searchbar
		$this->load->view('login');
	}

	public function logincoadmin(){
		// Untuk menampilkan halama login
		// if($this->session->userdata("user_id") )
		// return redirect("Coadmin/dashboard");
		// Ketika sudah login, maka untuk kembali ke halaman login hanya bisa menggunakan logout
		// Gbisa lewat searchbar
		$this->load->view('logincoadmin');
	}

	public function adminsignin(){
		// Ketika button login di klik akan mengarahkan kesini
		$this->form_validation->set_rules('email'   ,'Email'   ,'required',['required' => 'Email Wajib diisi !']);
		$this->form_validation->set_rules('password','Password','required',['required' => 'Password Wajib diisi !']);
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		// Untuk mengvalidasi value yang dimasukkan
		// text-danger
		if($this->form_validation->run()){
			$email = $this->input->post('email');
			$password = sha1($this->input->post('password'));
			$this->load->model('queries');
			$userExist = $this->queries->adminExist($email, $password);
			if($userExist){
				$sessionData = [
					'user_id'  => $userExist -> user_id,
					'username' => $userExist -> username,
					'email'    => $userExist -> email,
					'role_id'  => $userExist -> role_id
				];
				$this->session->set_userdata($sessionData);
				return redirect("admin/dashboard");
				// Kalau benar password dan email akna diarahkan ke controller admin method dashboard
				// admin     : nama controller untuk admin
				// dashboard : nama methodnya, nanti akan memanggil file view dashboard
			}
			else{
				$this->session->set_flashdata('message','Periksa Email dan Password Anda');
				return redirect ("welcome/loginadmin");
			}
		}
		else{
			$this->loginadmin();
		}	
	}

	public function coadminsignin(){
		// Ketika button login di klik akan mengarahkan kesini
		$this->form_validation->set_rules('email'   ,'Email'   ,'required',['required' => 'Email Wajib diisi !']);
		$this->form_validation->set_rules('password','Password','required',['required' => 'Password Wajib diisi !']);
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		// Untuk mengvalidasi value yang dimasukkan
		// text-danger
		if($this->form_validation->run()){
			$email = $this->input->post('email');
			$password = sha1($this->input->post('password'));
			$this->load->model('queries');
			$userExist = $this->queries->adminExist($email, $password);
			if($userExist){
				$sessionData = [
					'user_id'  => $userExist -> user_id,
					'username' => $userExist -> username,
					'email'    => $userExist -> email,
					'role_id'  => $userExist -> role_id
				];
				$this->session->set_userdata($sessionData);
				return redirect("coadmin/dashboard");
				// Kalau benar password dan email akna diarahkan ke controller coadmin method dashboard
				// COadmin   : nama controller untuk co admin
				// dashboard : nama methodnya, didalam method akan memanggil file views dashboardcoadmin  untuk ditampilkan
			}
			else{
				$this->session->set_flashdata('message','Periksa Email dan Password Anda');
				return redirect ("welcome/logincoadmin");
				// Kalau salah tetap dihalaman login dan muncul flash data
			}
		}
		else{
			$this->login();
		}	
		

	}

	// public function logout(){
	// 	$this->session->unset_userdata("user_id");
	// 	return redirect("welcome/login");
	// }

	

	
}

