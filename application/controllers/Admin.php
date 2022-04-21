<?php

class Admin extends CI_Controller{
    // Controller khusus admin ketika ingin memamnggil file view yang dibutuhkan

    public function dashboard(){
        $this->load->view('dashboard');
    }
}
?>