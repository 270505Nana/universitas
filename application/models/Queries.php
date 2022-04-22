<?php
class Queries extends CI_Model{

    public function getRolesnana(){
        // + nama ku
        $roles_nana = $this->db->get('tbl_roles');
        // nama table yang digunakan
        if($roles_nana->num_rows() > 0 ){
            return $roles_nana->result();
        }
    }

    public function registerAdmin($data_nana){

        return $this->db->insert('tbl_users ',$data_nana);
    }

    public function chkAdminExist(){
        $chkAdmin_nana = $this->db->where(['role_id' => '1'])
                        ->get('tbl_users');
        if($chkAdmin_nana->num_rows() > 0){
            return $chkAdmin_nana->num_rows();
        }

        // Dibaca : 
        // Kalau di db ada yang role_idnya 1
    }

    public function adminExist($email, $password){
        $chkAdmin_nana = $this->db->where(['email'=>$email, 'password' => $password])
                                  ->get('tbl_users');
        if($chkAdmin_nana->num_rows() > 0 ){
            return $chkAdmin_nana->row();
        }
    }

    public function makeCollege($data){

        return $this->db->insert('tbl_fakultas', $data);

    }
}
?>