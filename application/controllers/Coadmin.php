<?php

class COadmin extends CI_Controller{
    // Controller khusus untuk co admin ketika ingin memanggik file dan model yang dibutuhkan

    public function dashboard(){
        $this->load->view('dashboardcoadmin');
    }
}
?>