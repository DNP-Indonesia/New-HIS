<?php

class modeldetailsundriessementara extends CI_Model{
	protected $table = "sdr_request_sundries_keranjang";

    public function savekeranjang($data){
        $this->db->insert('sdr_request_sundries_keranjang',$data);
    }

}