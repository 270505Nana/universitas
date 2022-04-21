<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->model('queries');
		$chkAdminExist = $this->queries->chkAdminExist();
		// queries   : model  
		// chkAdminExist : function 
		$this->load->view('home', ['chkAdminExist' => $chkAdminExist]);

	}

	public function coadmin()
	{
		$this->load->view('homecoadmin');
	}

	public function adminRegister(){
		$this->load->model('queries');
		$roles_nana = $this->queries->getRolesnana();
		// roles_nana   : model  Queries
		// getRolesnana : function 
		$this->load->view('register', ['roles_nana' => $roles_nana]);
	}

	public function adminSignup(){
		$this->form_validation->set_rules('username','Username','required',['required' => 'Username Admin Wajib diisi !']);
		// ['required' => 'Nama Wajib diisi !'] : digunakan untuk mengganti pesan yang muncul kalau form username ini kosong, kita bisa edit sesuai yang kita mau
        // reqiuired : rules form nama harus diisi gaboleh kosong

		$this->form_validation->set_rules('email'   ,'Email'   ,'required',['required' => 'Email Admiin Wajib diisi !']);
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
		$this->load->view('admin/login');
	}

}

