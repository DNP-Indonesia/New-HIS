<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_detail_sementara extends CI_Model
{
    protected $table = 'sdr_request_sundries_keranjang';
    public function saveKeranjang($data)
    {
        $this->db->insert('sdr_request_sundries_keranjang', $data);
    }    
}
?>