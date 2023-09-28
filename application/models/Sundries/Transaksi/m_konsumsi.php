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

    public function getBarangById($id)
    {
        return $this->db
            ->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where($this->table . 'faktur', $id)
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

    public function save($data, $iduser, $faktur)
    {
        // $this->db->insert('sdr_consumption', $data);
        $simpan = $this->db->insert('sdr_consumption', $data);
        if ($simpan) {
            $carikeranjang = $this->db->get('sdr_consumption_keranjang');
            foreach ($carikeranjang->result() as $tempel) {
                $detail = [
                    'faktur' => $faktur,
                    'id_barang' => $tempel->id_barang,
                    'jumlah' => $tempel->jumlah,
                    // 'keterangan' => $tempel->keterangan,

                ];
                $this->db->insert('sdr_consumption_detail', $detail);
            }
            $this->db->delete('sdr_consumption_keranjang', ['id_user' => $iduser]);
        }
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

    public function getKonsumsiDetail($id_consumption)
    {
        return $this->db
            ->from('sdr_consumption_detail')
            ->join('sdr_consumption', 'sdr_consumption.faktur=sdr_consumption_detail.faktur')
            ->join('sdr_barang', 'sdr_barang.id_barang=sdr_consumption_detail.id_barang')
            ->join('tbl_user', 'tbl_user.id_user=sdr_consumption.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumption_detail.faktur', $id_consumption)
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

    public function saveKeranjang($data)
    {
        $this->db->insert('sdr_consumption_keranjang', $data);
    }

    public function update($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->table, $data);
    }

    public function cekKeranjang($idbarang, $iduser)
    {
        return $this->db->get_where('sdr_consumption_keranjang', array('id_barang'=>$idbarang, 'id_user'=>$iduser));
    }

    public function cekKeranjang2($iduser)
    {
        return $this->db->get_where('sdr_consumption_keranjang', array('id_user'=>$iduser));
    }

    public function selectKeranjang($id_user)
    {
        return $this->db->from('sdr_consumption_keranjang')
            ->join('sdr_barang', 'sdr_barang.id_barang=sdr_consumption_keranjang.id_barang')
            ->where('sdr_consumption_keranjang.id_user', $id_user)
            ->get()
            ->result();
    }

    public function updateKeranjang($where, $data)
    {
        $this->db->where($where);
        $this->db->update('sdr_consumption_keranjang', $data);
    }

    public function getKeranjang()
    {
        $this->db->select('*');
        $this->db->select_sum('jumlah');
        $this->db->from('sdr_consumption_keranjang');
        $this->db->join('sdr_barang', 'sdr_barang.id_barang=sdr_consumption_keranjang.id_barang');
        $this->db->group_by('sdr_consumption_keranjang.id_barang');
        $query = $this->db->get();
        return $query->result();
    }

    public function deleteKeranjang($id_keranjang_consumption)
    {
        $hapus = $this->db->delete('sdr_consumption_keranjang', ['id_keranjang_consumption' => $id_keranjang_consumption]);
        if ($hapus) {
            return 1;
        }
    }
}
?>
