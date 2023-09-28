<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_konsumsistok extends CI_Model
{
    protected $table = 'sdr_consumptionstok';
    protected $primaryKey = 'id_consumptionstok';

    public function getKonsumsistok()
    {
        return $this->db
            ->from('sdr_consumptionstok')
            ->join('tbl_user', 'tbl_user.id_user=sdr_consumptionstok.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumptionstok.id_user', $this->session->userdata('id_user'))
            ->order_by('id_consumptionstok', 'ASC')
            ->get()
            ->result();
    }

    public function getBarangById($id_detail_estimasi)
    {
        return $this->db
            ->from('sdr_estimasi_detail')
            ->join('sdr_barang', 'sdr_estimasi_detail.id_barang=sdr_barang.id_barang')
            ->where('id_detail_estimasi', $id_detail_estimasi)
            ->get()
            ->result();
    }

    public function getKonsumsistokAll()
    {
        return $this->db
            ->from('sdr_consumptionstok')
            ->join('tbl_user', 'tbl_user.id_user=sdr_consumptionstok.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->order_by('id_consumptionstok', 'ASC')
            ->get()
            ->result();
    }

    public function getEstimasi()
    {
        return $this->db
            ->select('*')
            ->from('sdr_estimasi_detail')
            ->join('sdr_estimasi', 'sdr_estimasi.faktur = sdr_estimasi_detail.faktur')
            ->where('sdr_estimasi.id_user', $this->session->userdata('id_user'))
            // ->where('status', 'Diproses')
            // ->where('statusstok', 'Ready')
            ->order_by('id_detail_estimasi', 'ASC')
            ->get()
            ->result();
    }

    public function forKepalaBagian()
    {
        return $this->db
            ->from('sdr_consumptionstok')
            ->join('tbl_user', 'tbl_user.id_user=sdr_consumptionstok.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by('id_consumptionstok', 'ASC')
            ->get()
            ->result();
    }

    public function cekKeranjang($idbarang, $iduser)
    {
        return $this->db->get_where('sdr_consumptionstok_keranjang', ['id_barang' => $idbarang, 'id_user' => $iduser]);
    }

    public function saveKeranjang($data)
    {
        $this->db->insert('sdr_consumptionstok_keranjang', $data);
    }

    public function getKeranjang($id_user)
    {
        return $this->db
            ->from('sdr_consumptionstok_keranjang')
            ->join('sdr_barang', 'sdr_barang.id_barang=sdr_consumptionstok_keranjang.id_barang')
            ->where('sdr_consumptionstok_keranjang.id_user', $id_user)
            ->get()
            ->result();

        // $this->db->select('sdr_consumptionstok_keranjang. id_barang, barang, jumlah, id_user');
        // $this->db->from('sdr_consumptionstok_keranjang');
        // $this->db->join('sdr_barang', 'sdr_barang.id_barang=sdr_consumptionstok_keranjang.id_barang');
        // $this->db->where('id_user', $id_user);
        // return $this->db->get();
    }

    public function deleteKeranjang($id_barang, $id_user)
    {
        $hapus = $this->db->delete('sdr_consumptionstok_keranjang', ['id_barang' => $id_barang, 'id_user' => $id_user]);
        if ($hapus) {
            return 1;
        }
    }

    public function save($data, $iduser, $faktur, $fakest)
    {
        $simpan = $this->db->insert('sdr_consumptionstok', $data);
        if ($simpan) {
            $carikeranjang = $this->db->get_where('sdr_consumptionstok_keranjang', ['id_user' => $iduser]);
            foreach ($carikeranjang->result() as $tempel) {
                $detail = [
                    'faktur' => $faktur,
                    'id_barang' => $tempel->id_barang,
                    'jumlah' => $tempel->jumlah,
                    'fakest' => $tempel->fakest,
                ];

                $cekstok = $this->db->get_where('sdr_estimasi_detail', ['faktur' => $fakest, 'id_barang' => $tempel->id_barang]);
                foreach ($cekstok->result() as $cs) {
                    if ($cs->jumlah < $tempel->jumlah) {
                        $this->db->delete('sdr_consumptionstok', ['faktur' => $faktur]);
                    } else {
                        $this->db->insert('sdr_consumptionstok_detail', $detail);
                    }
                }
            }
            $this->db->delete('sdr_consumptionstok_keranjang', ['id_user' => $iduser]);
        }
    }

    public function deleteKonsumsistok($faktur)
    {
        $hapus = $this->db->delete('sdr_consumptionstok', ['faktur' => $faktur]);
        if ($hapus) {
            $hapusdetail = $this->db->delete('sdr_consumptionstok_detail', ['faktur' => $faktur]);
            if ($hapusdetail) {
                redirect('Sundries/Transaksi/c_konsumsistok/index');
            }
        }
    }

    public function getKonsumsistokById($id)
    {
        return $this->db
            ->from('sdr_consumptionstok')
            ->join('tbl_user', 'tbl_user.id_user=sdr_consumptionstok.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumptionstok.faktur', $id)
            ->get()
            ->result();
    }

    public function getKonsumsiDetail($id)
    {
        return $this->db
            ->from('sdr_consumptionstok_detail')
            ->join('sdr_consumptionstok', 'sdr_consumptionstok.faktur=sdr_consumptionstok_detail.faktur')
            ->join('sdr_barang', 'sdr_barang.id_barang=sdr_consumptionstok_detail.id_barang')
            ->join('tbl_user', 'tbl_user.id_user=sdr_consumptionstok.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumptionstok_detail.faktur', $id)
            ->get()
            ->result();
    }

    public function getIdPdf($id)
    {
        $query = $this->db
            ->from('sdr_consumptionstok')
            ->join('tbl_user', 'tbl_user.id_user=sdr_consumptionstok.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumptionstok.faktur', $id)
            ->get();

        return $query->result_array();
    }

    public function forApprove()
    {
        return $this->db
            ->from('sdr_consumptionstok')
            ->join('tbl_user', 'tbl_user.id_user=sdr_consumptionstok.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('status', 'Request')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by('id_consumptionstok', 'ASC')
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
