<?php

class COadmin extends CI_Controller{
    // Controller khusus untuk co admin ketika ingin memanggik file dan model yang dibutuhkan

    public function dashboard(){

        $this->load->model('queries');
        $allfakultas = $this->queries->AllFakultas();
        $this->load->view('dashboardcoadmin',['allfakultas' => $allfakultas]);
        
        if( !$this->session->userdata("user_id") )
        return redirect("welcome/logincoadmin");
        // Ketika belum login ada orang yang ingin mengakses dashboard, akan otomatis diarahkan ke login dulu
        
    }

    public function addMahasiswa(){
        // addStudent
        $this->load->model('queries');
        $fakultas = $this->queries->getFakultasnana();
        // getColleges
        // Untuk menampilkan viiew form menambahkan mahasiswa
        // Tidak mengelola data!
        // memanggil var fakultas untuk menampilkan di fakultas(menampilkan pilihan fakultas sesuai dengan yang di database)

        $this->load->view('addMahasiswaCo', ['fakultas' => $fakultas]);
        

    }

    public function createStudent(){
        // Ini itu untuk mengvalidasi formnya, menangkap datannya

        // Ketika button login di klik akan mengarahkan kesini
		$this->form_validation->set_rules('namasiswa','Nama Mahasiswa'    ,'required',['required' => 'Nama Mahasiswa Wajib diisi !']);
		$this->form_validation->set_rules('college_id','Nama Fakultas'    ,'required',['required' => 'Fakultas Wajib diisi !']);
        $this->form_validation->set_rules('email'   ,'Email'              ,'required',['required' => 'Email Wajib diisi !']);
		$this->form_validation->set_rules('gender','Gender'               ,'required',['required' => 'Jenis Kelamin Wajib diisi !']);
        $this->form_validation->set_rules('program_studi','Program Studi' ,'required',['required' => 'Program Studi Wajib diisi !']);

		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		// Untuk mengvalidasi value yang dimasukkan
		// text-danger : warna peringatan textnya 
		if($this->form_validation->run() ){

            $data = $this->input->post();
            // var data sudah memegang data yang kita tulis

            $this->load->model('queries');
            if($this->queries->insertStudent($data)){
                // Kita masukin datanya ke model queries method insertStudent, terus apanih data yang dikirim?
                // Datanya ada di dalam var data
                $this->session->set_flashdata('message', 'Data Mahasiswa Berhasil Ditambahkan');
 
            }else{
             $this->session->set_flashdata('message', 'Data Mahasiswa Gagal Ditambahkan');
            }
            return redirect("coadmin/addMahasiswa");

        }
        else{

            $this->addMahasiswa();

        }
    }

    public function logout(){
		$this->session->unset_userdata("user_id");	
		return redirect("welcome/logincoadmin");
	}

    public function __construct(){
        // Mengunci semua function yang ada, agar ketika belum login tidak bisa mengakses dashboard dll lewat search bar

        parent::__construct();
        if( !$this->session->userdata("user_id") )
        return redirect("welcome/logincoadmin");
    }
}
?>