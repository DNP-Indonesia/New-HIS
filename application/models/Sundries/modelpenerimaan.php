<?php

class modelpenerimaan extends CI_Model{
	protected $table = "sdr_penerimaan";
    protected $primaryKey = "id_penerimaan";

    public function findAll(){
    	return $this->db->from('sdr_penerimaan')
            ->join('sdr_purchase', 'sdr_purchase.faktur=sdr_penerimaan.fakturpurchase')
            ->order_by('id_penerimaan','DESC')
            ->get()
            ->result();
    }

    public function savepenerimaan($data){
        $this->db->insert('sdr_penerimaan', $data);
    }

    public function purchase($faktur){
        return $this->db->from('sdr_purchase')
            ->join('sdr_purchase_detail', 'sdr_purchase.faktur=sdr_purchase_detail.faktur')
            ->join('sdr_barang','sdr_barang.id_barang=sdr_purchase_detail.id_barang')
            ->where('sdr_purchase.faktur', $faktur)
            ->get()
            ->result();
    }
}