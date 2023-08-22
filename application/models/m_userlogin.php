<?php

class M_userlogin extends CI_Model{

    public function get($username){
        $this->db->from('tbl_user');
        $this->db->join('his_section', 'his_section.id_section=tbl_user.id_section');
        $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get()->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
    }
    
    function cek_login($table,$where){		
        return $this->db->get_where($table,$where);
    }
    
    function data_user(){
        return $this->db->get('tbl_user');
    }


}