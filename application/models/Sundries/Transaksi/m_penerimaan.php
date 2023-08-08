<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_penerimaan extends CI_Model
{
    protected $table = 'sdr_penerimaan';
    protected $primaryKey = 'id_penerimaan';

    public function getPenerimaan()
    {
        return $this->db->from('sdr_penerimaan')
            ->join('sdr_purchase', 'sdr_purchase.faktur=sdr_penerimaan.fakturpurchase')
            ->order_by('id_penerimaan', 'DESC')
            ->get()
            ->result();
    }

    public function savePenerimaan($data)
    {
        $this->db->insert('sdr_penerimaan', $data);
    }

    public function getPembelian($faktur)
    {
        return $this->db->from('sdr_purchase_detail')
            ->join('sdr_barang', 'sdr_barang.id_barang=sdr_purchase_detail.id_barang')
            ->where('sdr_purchase_detail.faktur', $faktur)
            ->get()
            ->result();
    }
}
?>
