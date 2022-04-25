<?php

class Admin extends CI_Controller{
    // Controller khusus admin ketika ingin memamnggil file view yang dibutuhkan

    
    
    public function dashboard()
    {
        $this->load->model('queries');
        $allfakultas = $this->queries->AllFakultas();
        $this->load->view('dashboard',['allfakultas' => $allfakultas]);
    }
    

    public function logout()
	{
        // untuk logout, mengakhiri session dan redirect 
        // Redirect ke econtroller welcome function loginadmin
		$this->session->unset_userdata("user_id");
		return redirect("Welcome/loginadmin");
	}

    public function addFakultas(){// addCollege
        
        // Untuk menambahkan fakultas baru, berfungsi menampilkan form tambah fakultas
        // Tidak mengelola data !
       $this->load->view('addFakultas');
    }

    public function addMahasiswa(){ // addStudent
       
        $this->load->model('queries');
        $fakultas = $this->queries->getFakultasnana();
        // getColleges
        // Untuk menampilkan viiew form menambahkan mahasiswa
        // Tidak mengelola data!
        // memanggil var fakultas untuk menampilkan di fakultas(menampilkan pilihan fakultas sesuai dengan yang di database)

        $this->load->view('addMahasiswa', ['fakultas' => $fakultas]);
        

    }

    public function tambahfakultas(){//createCollege

        // Ketika button login di klik akan mengarahkan kesini
		$this->form_validation->set_rules('namafakultas' ,'Nama Fakultas'   ,'required',['required' => 'Fakultas Wajib diisi !']);
		// $this->form_validation->set_rules('password','Password','required',['required' => 'Password Wajib diisi !']);
		
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		// Untuk mengvalidasi value yang dimasukkan
		// text-danger warna text peringatan berwarna merah
		if($this->form_validation->run()){
           $data = $this->input->post();
          // var data mengirim data menggunakan method post 

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
            return redirect("admin/addMahasiswa");

        }
        else{

            $this->addMahasiswa();

        }
    }

    public function viewMahasiswa(){//viewCollege
        // $college_id : menggunakan parameter id college
    $this->load->model('queries');
        //  $this->queries->allmahasiswa($college_id);
    
        // Harus memanggil var mahasiswanya biar terhubung

        //  1. Tambahkan di controller
        // 2. Tambahkan di view
        // 3 Dicocokkan dengan yang di model

    $isi['mahasiswa']     = $this->queries->allmahasiswa();        
    $this->load->view('viewMahasiswa',$isi);
    }

    public function __construct(){
        // Mengunci semua function yang ada, agar ketika belum login tidak bisa mengakses dashboard dll lewat search bar

        parent::__construct();
        if( !$this->session->userdata("user_id") )
        return redirect("welcome/loginadmin");
    }


   
}
?>