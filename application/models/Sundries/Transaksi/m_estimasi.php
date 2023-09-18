<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_estimasi extends CI_Model
{
    protected $table = 'sdr_estimasi';
    protected $primaryKey = 'id_estimasi';
    protected $tabletolak = "sdr_estimasi_tolak";
     

    public function getEstimasi()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user = sdr_estimasi.id_user')
            ->join('his_section', 'his_section.id_section = tbl_user.id_section')
            ->where('sdr_estimasi.id_user', $this->session->userdata('id_user'))
            ->order_by('id_estimasi', 'DESC')
            ->get()
            ->result();
    }

    public function getEstimasiAll()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user = sdr_estimasi.id_user')
            ->join('his_section', 'his_section.id_section = tbl_user.id_section')
            ->order_by('id_estimasi', 'DESC')
            ->get()
            ->result();
    }

    public function getBarang()
    {
        return $this->db->from('sdr_barang')
            ->join('sdr_jenis', 'sdr_jenis.id_jenis = sdr_barang.id_jenis')
            ->join('sdr_kategori', 'sdr_kategori.id_kategori = sdr_jenis.id_kategori')
            ->where('sdr_jenis.id_kategori', '2')
            ->get()
            ->result();
    }

    public function forKepalaBagian()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user = sdr_estimasi.id_user')
            ->join('his_section', 'his_section.id_section = tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by('id_estimasi', 'DESC')
            ->get()
            ->result();   
    }

    public function cekKeranjang($idbarang, $iduser)
    {
        return $this->db->get_where('sdr_estimasi_keranjang', array('id_barang'=>$idbarang, 'id_user'=>$iduser));
    }

    public function saveKeranjang($data)
    {
        $this->db->insert('sdr_estimasi_keranjang', $data);
    }

    public function getKeranjang($id_user)
    {
        return $this->db->from('sdr_estimasi_keranjang')
            ->join('sdr_barang', 'sdr_barang.id_barang=sdr_estimasi_keranjang.id_barang')
            ->where('sdr_estimasi_keranjang.id_user', $id_user)
            ->get()
            ->result();    
    }

    public function deleteKeranjang($id_barang, $id_user)
    {
        $hapus = $this->db->delete('sdr_estimasi_keranjang', array('id_barang'=>$id_barang, 'id_user'=> $id_user));
        if ($hapus) {
            return 1;
        }
    }

    public function save($data, $iduser, $faktur)
    {
        $simpan = $this->db->insert($this->table, $data);
        if ($simpan) {
            $carikeranjang = $this->db->get_where('sdr_estimasi_keranjang', array('id_user'=>$iduser));
            foreach ($carikeranjang->result() as $tempel) {
                $detail = array(
                    'faktur' => $faktur,
                    'id_barang' => $tempel->id_barang,
                    'jumlah' => $tempel->jumlah
                );
                $this->db->insert('sdr_estimasi_detail', $detail);   
            }
            $this->db->delete('sdr_estimasi_keranjang', array('id_user'=>$iduser));
        }        
    }

    public function deleteEstimasi($faktur)
    {
        $hapus = $this->db->delete($this->table, array('faktur' => $faktur));
        if ($hapus) {
            $hapusdetail = $this->db->delete('sdr_estimasi_detail', array('faktur' => $faktur));
            if ($hapusdetail) {
                redirect('Sundries/Transaksi/c_estimasi/index');
            }
        }
    }

    public function getEstimasiById($id)
    {
        return $this->db->from('sdr_estimasi')
            ->join('tbl_user','tbl_user.id_user=sdr_estimasi.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_estimasi.faktur', $id)
            ->get()
            ->result();
    }

    public function getEstimasiDetail($id)
    {
        return $this->db->from('sdr_estimasi_detail')
            ->join('sdr_estimasi', 'sdr_estimasi.faktur = sdr_estimasi_detail.faktur')
            ->join('sdr_barang', 'sdr_barang.id_barang = sdr_estimasi_detail.id_barang')
            ->join('tbl_user', 'tbl_user.id_user = sdr_estimasi.id_user')
            ->join('his_section', 'his_section.id_section = tbl_user.id_section')
            ->where('sdr_estimasi_detail.faktur', $id)
            ->get()
            ->result();
    }

    public function getIdPdf($id)
    {
        $query = $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user = sdr_estimasi.id_user')
            ->join('his_section', 'his_section.id_section = tbl_user.id_section')
            ->where('sdr_estimasi.faktur', $id)
            ->get();

        return $query->result_array();
    }

    public function getDetailIdPdf($id)
    {
        $query = $this->db->from('sdr_estimasi_detail')
            ->join('sdr_estimasi', 'sdr_estimasi.faktur = sdr_estimasi_detail.faktur')
            ->join('sdr_barang', 'sdr_barang.id_barang = sdr_estimasi_detail.id_barang')
            ->join('tbl_user', 'tbl_user.id_user = sdr_estimasi.id_user')
            ->join('his_section', 'his_section.id_section = tbl_user.id_section')
            ->where('sdr_estimasi_detail.faktur', $id)
            ->get();

        return $query->result_array();
    }

    public function forApprove()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user = sdr_estimasi.id_user')
            ->join('his_section', 'his_section.id_section = tbl_user.id_section')
            ->where('status', 'Diajukan')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by('id_estimasi', 'DESC')
            ->get()
            ->result();
    }

    public function update($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->table, $data);
    }

    // Fungsi untuk meng-generate nomor faktur berdasarkan data terakhir dalam database
    public function generateFaktur()
    {
        $this->db->select('RIGHT(faktur,4) as faktur', false);
        $this->db->order_by("faktur", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('sdr_request_sundries');


        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $faktur = intval($data->faktur) + 1;
        } else {
            $faktur = 1;
        }

        $lastKode = str_pad($faktur, 4, "0", STR_PAD_LEFT);
        $tahun = date("y");
        $bulan = date("m");
        $tanggal = date("d");
        $em = "EM";

        $newfaktur = $em . "-" . $tanggal . "-" . $bulan . "-" . $tahun . "-" . $lastKode;

        return $newfaktur;
    }
}
?>