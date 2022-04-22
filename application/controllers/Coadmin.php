<?php

class COadmin extends CI_Controller{
    // Controller khusus untuk co admin ketika ingin memanggik file dan model yang dibutuhkan

    public function dashboard(){
        if( !$this->session->userdata("user_id") )
        return redirect("welcome/logincoadmin");
        // Ketika belum login ada orang yang ingin mengakses dashboard, akan otomatis diarahkan ke login dulu
        $this->load->view('dashboardcoadmin');
    }

    public function logout(){
		$this->session->unset_userdata("user_id");	
		return redirect("welcome/logincoadmin");
	}
}
?>