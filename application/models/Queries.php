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

    public function viewAllFakultas(){
        $this->db->select(['tbl_users.user_id',
                           'tbl_users.email', 
                           'tbl_fakultas.jurusan_id', 
                           'tbl_users.username',
                           'tbl_users.gender', 
                           'tbl_fakultas.namafakultas',
                           'tbl_roles.rolename'
                        ]);
        //untuk join multiple table, dengan cara nama table.column yang ingin kita panggil

        $this->db->from('tbl_fakultas');
        $this->db->join('tbl_users','tbl_users.jurusan_id = tbl_fakultas.jurusan_id');
        $this->db->join('tbl_roles','tbl_roles.role_id    = tbl_users.role_id');
        $users_nana = $this->db->get();
        return $users_nana->result();
        
    }
}
?>