<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_konsumsi extends CI_Model
{
    protected $table = 'sdr_consumption';
    protected $primaryKey = 'id_consumption';

    public function getKonsumsi()
    {
        return $this->db
            ->from('sdr_consumption')
            ->join('tbl_user', 'tbl_user.id_user=sdr_consumption.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumption.id_user', $this->session->userdata('id_user'))
            ->order_by('id_consumption', 'ASC')
            ->get()
            ->result();
    }

    public function getBarangById($id_detail_sundries)
    {
        return $this->db
            ->from('sdr_request_sundries_detail')
            ->join('sdr_barang', 'sdr_request_sundries_detail.id_barang=sdr_barang.id_barang')
            ->where('id_detail_sundries', $id_detail_sundries)
            ->get()
            ->result();
    }

    public function getKonsumsiAll()
    {
        return $this->db
            ->from('sdr_consumption')
            ->join('tbl_user', 'tbl_user.id_user=sdr_consumption.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->order_by('id_consumption', 'ASC')
            ->get()
            ->result();
    }

    public function getPermintaan1()
    {
        return $this->db
            ->select('*')
            ->from('sdr_request_sundries_detail')
            ->join('sdr_request_sundries', 'sdr_request_sundries.faktur = sdr_request_sundries_detail.faktur')
            ->where('sdr_request_sundries.id_user', $this->session->userdata('id_user'))
            ->where('status', 'Diproses')
            ->where('statusstok', 'Ready')
            ->order_by('id_detail_sundries', 'ASC')
            ->get()
            ->result();
    }

    public function getPermintaan()
    {
        $this->db->select('
            sdr_request_sundries_detail.id_barang,
            SUM(sdr_request_sundries_detail.jumlah) as jumlah
        ');
        $this->db->from('sdr_request_sundries_detail');
        $this->db->join('sdr_request_sundries', 'sdr_request_sundries.faktur = sdr_request_sundries_detail.faktur');
        $this->db->where('sdr_request_sundries.id_user', $this->session->userdata('id_user'));
        $this->db->where('status', 'Diproses');
        $this->db->where('statusstok', 'Ready');
        $this->db->group_by('sdr_request_sundries_detail.id_barang');
        $query = $this->db->get();
    
        $combinedData = [];
    
        foreach ($query->result() as $row) {
            $id_barang = $row->id_barang;
            $jumlah = $row->jumlah;
    
            // Jika id_barang sudah ada dalam $combinedData, tambahkan jumlahnya
            if (isset($combinedData[$id_barang])) {
                $combinedData[$id_barang] += $jumlah;
            } else {
                // Jika id_barang belum ada, buat entri baru
                $combinedData[$id_barang] = $jumlah;
            }
        }
    
        return $combinedData;
    }
    

    public function forKepalaBagian()
    {
        return $this->db
            ->from('sdr_consumption')
            ->join('tbl_user', 'tbl_user.id_user=sdr_consumption.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by('id_consumption', 'ASC')
            ->get()
            ->result();
    }

    public function save($data)
    {
        $this->db->insert('sdr_consumption', $data);
    }    

    public function deleteKonsumsi($faktur)
    {
        $this->db->delete('sdr_consumption', ['faktur' => $faktur]);
        redirect('Sundries/Transaksi/c_konsumsi/index');
    }

    public function getKonsumsiById($id)
    {
        return $this->db
            ->from('sdr_consumption')
            ->join('tbl_user', 'tbl_user.id_user=sdr_consumption.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumption.faktur', $id)
            ->get()
            ->result();
    }

    public function getKonsumsiDetail($id)
    {
        return $this->db
            ->from('sdr_consumption_detail')
            ->join('sdr_consumption', 'sdr_consumption.faktur=sdr_consumption_detail.faktur')
            ->join('sdr_barang', 'sdr_barang.id_barang=sdr_consumption_detail.id_barang')
            ->join('tbl_user', 'tbl_user.id_user=sdr_consumption.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumption_detail.faktur', $id)
            ->get()
            ->result();
    }

    public function getIdPdf($id)
    {
        $query = $this->db
            ->from('sdr_consumption')
            ->join('tbl_user', 'tbl_user.id_user=sdr_consumption.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumption.faktur', $id)
            ->get();

        return $query->result_array();
    }

    public function forApprove()
    {
        return $this->db
            ->from('sdr_consumption')
            ->join('tbl_user', 'tbl_user.id_user=sdr_consumption.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('status', 'Request')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by('id_consumption', 'ASC')
            ->get()
            ->result();
    }

    public function update($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->table, $data);
    }
}
?>
