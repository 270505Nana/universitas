<?php

class Admin extends CI_Controller{
    // Controller khusus admin ketika ingin memamnggil file view yang dibutuhkan

    public function dashboard(){

      $this->load->model('queries');
      $users_nana = $this->queries->viewAllFakultas();
     
      $this->load->view('dashboard', ['users' => $users_nana]);   
    }

    public function logout()
	{
		$this->session->unset_userdata("user_id");
		return redirect("Welcome/loginadmin");
	}

    public function addFakultas(){
        // addCollege
       $this->load->view('addFakultas');
    }

    public function addMahasiswa(){

    }

    public function tambahfakultas(){

        //createCollege

        // Ketika button login di klik akan mengarahkan kesini
		$this->form_validation->set_rules('namafakultas' ,'Nama Fakultas'   ,'required',['required' => 'Fakultas Wajib diisi !']);
		// $this->form_validation->set_rules('password','Password','required',['required' => 'Password Wajib diisi !']);
		
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		// Untuk mengvalidasi value yang dimasukkan
		// text-danger
		if($this->form_validation->run()){
           $data = $this->input->post();
           $this->load->model('queries');
           if($this->queries->makeCollege($data)){
               $this->session->set_flashdata('message', 'Fakultas Berhasil Ditambahkan');

           }else{
            $this->session->set_flashdata('message', 'Fakultas Gagal Ditambahkan');
           }
           return redirect("admin/addFakultas");

        }else{
            $this->addFakultas();
        }

        // namafakultas : sesuai dengan column yang ada di dalama database
    }

    // public function addCoadmin(){

    //     $this->load->view('register');
    // }

    public function __construct(){
        // Mengunci semua function yang ada, agar ketika belum login tidak bisa mengakses dashboard dll lewat search bar

        parent::__construct();
        if( !$this->session->userdata("user_id") )
        return redirect("welcome/loginadmin");
    }


   
}
?>