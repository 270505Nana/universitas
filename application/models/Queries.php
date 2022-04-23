<?php
class Queries extends CI_Model{
    // Intinya model queries itu berfungsi untuk mengambil data, mengirim data ke database 
    // Mengambil data untuk diterima 

    public function getRolesnana(){
        // + nama ku

        // Ini itu untuk menampilkan role id sesuai dengan yang didatabase
        // Untuk menampilkan role admin atau co admin saat menambahkan admin
        // diambil dari tbl_roles
        $roles_nana = $this->db->get('tbl_roles');
        // nama table yang digunakan
        if($roles_nana->num_rows() > 0 ){
            return $roles_nana->result();
        }
    }

    public function getFakultasnana(){

        // Untuk menegambil data dari database
        // Mengambil dari tbl_fakultas

        $fakultas_nana = $this->db->get('tbl_fakultas');
        if($fakultas_nana->num_rows() > 0){
            return $fakultas_nana->result();
        }
    }

    public function registerAdmin($data_nana){

        // Untuk menambah data admin baru yang didaftarkan
        // Data dimasukkan kedalam tbl_users, parameternya var $data_nana
        // Dimana $data_nana sudah menangkap data
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
        // Ini itu untuk login, jadi mengecek apakah admin ini itu ada atau engga datanya di database
        // where 'email': nama form pas login email itu emal, jadi contoh:
        // email (di form login ) : nana@gmail.com ada gak nik di $email dimana dia menangkap data dari database kalo ga ada akan munncul flashdata_message
        // Password juga gitu dia akan menyamakan data yang ada di databse dengan yang kita masukkan di form

        $chkAdmin_nana = $this->db->where(['email'=>$email, 'password' => $password])
                                  ->get('tbl_users');
        if($chkAdmin_nana->num_rows() > 0 ){
            return $chkAdmin_nana->row();
        }
    }

    public function makeCollege($data){

        // Untuk menambahkan fakultas baru
        // Mengirim data/ memasukkan data ke tbl_fakultas, parameter $data
        // Dimana data sudah menangkap data yang kita masukkan

        return $this->db->insert('tbl_fakultas', $data);

    }

    public function viewAllFakultas(){

        // Untuk menampilkan data dari banyak table disebut multiple tables
        $this->db->select(['tbl_users.user_id',
                           'tbl_users.email', 
                           'tbl_fakultas.college_id', 
                           'tbl_users.username',
                           'tbl_users.gender', 
                           'tbl_fakultas.namafakultas',
                           'tbl_roles.rolename'
                        ]);
        //untuk join multiple table, dengan cara nama table.column yang ingin kita panggil

        $this->db->from('tbl_fakultas');
        $this->db->join('tbl_users','tbl_users.college_id = tbl_fakultas.college_id');
        $this->db->join('tbl_roles','tbl_roles.role_id    = tbl_users.role_id');
        $users_nana = $this->db->get();
        return $users_nana->result();
        
    }

    public function insertStudent($data){

        return $this->db->insert('tbl_mahasiswa', $data);
        // Kita masukin data ke tbl_mahasiswa, dan data tersebut dipegang oleh var data
    }
}
?>