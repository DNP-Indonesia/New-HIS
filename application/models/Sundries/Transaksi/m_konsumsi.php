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
            ->order_by('id_consumption', 'DESC')
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
            ->order_by('id_consumption', 'DESC')
            ->get()
            ->result();
    }

    public function getPermintaan()
    {
        return $this->db
            ->select('*')
            ->from('sdr_request_sundries_detail')
            ->join('sdr_request_sundries', 'sdr_request_sundries.faktur = sdr_request_sundries_detail.faktur')
            ->where('sdr_request_sundries.id_user', $this->session->userdata('id_user'))
            ->where('status', 'Diproses')
            ->where('statusstok', 'Ready')
            ->order_by('id_detail_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function forKepalaBagian()
    {
        return $this->db
            ->from('sdr_consumption')
            ->join('tbl_user', 'tbl_user.id_user=sdr_consumption.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by('id_consumption', 'DESC')
            ->get()
            ->result();
    }

    public function cekKeranjang($idbarang, $iduser)
    {
        return $this->db->get_where('sdr_consumption_keranjang', ['id_barang' => $idbarang, 'id_user' => $iduser]);
    }

    public function saveKeranjang($data)
    {
        $this->db->insert('sdr_consumption_keranjang', $data);
    }

    public function getKeranjang($id_user)
    {
        return $this->db
            ->from('sdr_consumption_keranjang')
            ->join('sdr_barang', 'sdr_barang.id_barang=sdr_consumption_keranjang.id_barang')
            ->where('sdr_consumption_keranjang.id_user', $id_user)
            ->get()
            ->result();
    }

    public function deleteKeranjang($id_barang, $id_user)
    {
        $hapus = $this->db->delete('sdr_consumption_keranjang', ['id_barang' => $id_barang, 'id_user' => $id_user]);
        if ($hapus) {
            return 1;
        }
    }

    public function save($data, $iduser, $faktur, $faris)
    {
        $simpan = $this->db->insert('sdr_consumption', $data);
        if ($simpan) {
            $carikeranjang = $this->db->get_where('sdr_consumption_keranjang', ['id_user' => $iduser]);
            foreach ($carikeranjang->result() as $tempel) {
                $detail = [
                    'faktur' => $faktur,
                    'id_barang' => $tempel->id_barang,
                    'jumlah' => $tempel->jumlah,
                    'faris' => $tempel->faris,
                ];

                $cekstok = $this->db->get_where('sdr_request_sundries_detail', ['faktur' => $faris, 'id_barang' => $tempel->id_barang]);
                foreach ($cekstok->result() as $cs) {
                    if ($cs->jumlah < $tempel->jumlah) {
                        $this->db->delete('sdr_consumption', ['faktur' => $faktur]);
                    } else {
                        $this->db->insert('sdr_consumption_detail', $detail);
                    }
                }
            }
            $this->db->delete('sdr_consumption_keranjang', ['id_user' => $iduser]);
        }
    }

    public function deleteKonsumsi($faktur)
    {
        $hapus = $this->db->delete('sdr_consumption', ['faktur' => $faktur]);
        if ($hapus) {
            $hapusdetail = $this->db->delete('sdr_consumption_detail', ['faktur' => $faktur]);
            if ($hapusdetail) {
                redirect('Sundries/Transaksi/c_konsumsi/index');
            }
        }
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
            ->order_by('id_consumption', 'DESC')
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
