<?php

class M_auth extends CI_Model {

    public function get($username) {
        $this->db->from('tbl_user');
        $this->db->join('his_section', 'his_section.id_section=tbl_user.id_section');
        $this->db->where('username', $username);
        $result = $this->db->get()->row(); // Mengambil satu baris data
        return $result;
    }

    function cek_login($table, $where) {
        return $this->db->get_where($table, $where);
    }

    function data_user() {
        return $this->db->get('tbl_user');
    }

    public function updatePassword($username, $newPassword) {
        // Ganti 'tbl_user' dengan nama tabel yang benar jika diperlukan
        $this->db->where('username', $username);
        $this->db->update('tbl_user', array('password' => $newPassword));
    }
}
