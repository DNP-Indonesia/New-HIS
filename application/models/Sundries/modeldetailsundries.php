<?php

class modeldetailsundries extends CI_Model{
	protected $table = "sdr_request_sundries_detail";

    public function finddetail($id){
        return $this->db->from('sdr_request_sundries_detail')
            ->join('sdr_request_sundries','sdr_request_sundries.faktur=sdr_request_sundries_detail.faktur')
            ->join('sdr_barang','sdr_barang.id_barang=sdr_request_sundries_detail.id_barang')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_request_sundries_detail.faktur',$id)
            ->get()
            ->result();
    }
    public function finddetailforpdf($id){
        $query = $this->db->from('sdr_request_sundries_detail')
            ->join('sdr_request_sundries','sdr_request_sundries.faktur=sdr_request_sundries_detail.faktur')
            ->join('sdr_barang','sdr_barang.id_barang=sdr_request_sundries_detail.id_barang')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_request_sundries_detail.faktur',$id)
            ->get();

        return $query->result_array();

    }

    public function updatejumlah($where,$data){
        $this->db->where($where);
        $this->db->update($this->table,$data);
    }

    public function addbarang($data){
        $this->db->insert($this->table,$data);
    }

    public function deletebarang($id){
        return $this->db->delete($this->table, array("id_detail_sundries" => $id));
    }

}