<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_estimasi extends CI_Model
{
    protected $table = 'sdr_estimasi';
    protected $primaryKey = 'id_estimasi';
    protected $tabletolak = 'sdr_estimasi_tolak';

    public function getEstimasi()
    {
        return $this->db
            ->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where($this->table . '.id_user', $this->session->userdata('id_user'))
            ->where('status', 'Diajukan')
            ->order_by($this->primaryKey, 'DESC')
            ->get()
            ->result();
    }

    public function getEstimasiAll()
    {
        return $this->db
            ->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user = sdr_estimasi.id_user')
            ->join('his_section', 'his_section.id_section = tbl_user.id_section')
            ->order_by('id_estimasi', 'DESC')
            ->get()
            ->result();
    }

    public function getBarang()
    {
        return $this->db
            ->from('sdr_barang')
            ->join('sdr_jenis', 'sdr_jenis.id_jenis = sdr_barang.id_jenis')
            ->join('sdr_kategori', 'sdr_kategori.id_kategori = sdr_jenis.id_kategori')
            ->where('sdr_jenis.id_kategori', '2')
            ->get()
            ->result();
    }

    public function getSetuju()
    {
        return $this->db
            ->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where($this->table . '.id_user', $this->session->userdata('id_user'))
            ->where('status', 'Disetujui')
            ->order_by($this->primaryKey, 'DESC')
            ->get()
            ->result();
    }

    public function getTolak()
    {
        return $this->db
            ->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->join($this->tabletolak, $this->tabletolak . '.faktur=' . $this->table . '.faktur')
            ->where($this->table . '.id_user', $this->session->userdata('id_user'))
            ->where('status', 'Ditolak')
            ->order_by($this->primaryKey, 'DESC')
            ->group_by($this->tabletolak . '.faktur')
            ->get()
            ->result();
    }

    public function forKepalaBagianPermintaan()
    {
        return $this->db
            ->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->where('status', 'Diajukan')
            ->order_by($this->primaryKey, 'DESC')
            ->get()
            ->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Disetujui' dan id_bagian untuk kepala bagian
    public function forKepalaBagianSetuju()
    {
        return $this->db
            ->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->where('status', 'Disetujui')
            ->order_by($this->primaryKey, 'DESC')
            ->get()
            ->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Ditolak' dan id_bagian untuk kepala bagian
    public function forKepalaBagianTolak()
    {
        return $this->db
            ->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->join($this->tabletolak, $this->tabletolak . '.faktur=' . $this->table . '.faktur')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->where('status', 'Ditolak')
            ->order_by($this->primaryKey, 'DESC')
            ->group_by($this->tabletolak . '.faktur')
            ->get()
            ->result();
    }

    // Di model m_estimasi
    public function getByFaktur($faktur)
    {
        $this->db->where('faktur', $faktur);
        return $this->db->get('sdr_estimasi_detail')->row();
    }

    public function cekKeranjang($idbarang, $iduser)
    {
        return $this->db->get_where('sdr_estimasi_keranjang', ['id_barang' => $idbarang, 'id_user' => $iduser]);
    }

    public function cekKeranjang2($iduser)
    {
        return $this->db->get_where('sdr_estimasi_keranjang', ['id_user' => $iduser]);
    }

    public function saveKeranjang($data)
    {
        $this->db->insert('sdr_estimasi_keranjang', $data);
    }

    public function getKeranjang($id_user)
    {
        return $this->db
            ->from('sdr_estimasi_keranjang')
            ->join('sdr_barang', 'sdr_barang.id_barang=sdr_estimasi_keranjang.id_barang')
            ->where('sdr_estimasi_keranjang.id_user', $id_user)
            ->get()
            ->result();
    }

    public function deleteKeranjang($id_barang, $id_user)
    {
        $hapus = $this->db->delete('sdr_estimasi_keranjang', ['id_barang' => $id_barang, 'id_user' => $id_user]);
        if ($hapus) {
            return 1;
        }
    }

    public function getTolakById($id)
    {
        return $this->db
            ->from($this->tabletolak)
            ->join($this->table, $this->tabletolak . '.faktur=' . $this->table . '.faktur')
            ->join('tbl_user', 'tbl_user.id_user=' . $this->tabletolak . '.id_user')
            ->where($this->tabletolak . '.faktur', $id)
            ->order_by($this->tabletolak . '.id_tolak', 'DESC')
            ->get()
            ->result();
    }

    public function save($data, $iduser, $faktur, $statusstok)
    {
        $simpan = $this->db->insert($this->table, $data);
        if ($simpan) {
            $carikeranjang = $this->db->get_where('sdr_estimasi_keranjang', ['id_user' => $iduser]);
            foreach ($carikeranjang->result() as $tempel) {
                $detail = [
                    'faktur' => $faktur,
                    'id_barang' => $tempel->id_barang,
                    'jumlah' => $tempel->jumlah,
                    'statusstok' => $statusstok,
                ];
                $this->db->insert('sdr_estimasi_detail', $detail);
            }
            $this->db->delete('sdr_estimasi_keranjang', ['id_user' => $iduser]);
        }
    }

    public function deleteEstimasi($faktur)
    {
        $hapus = $this->db->delete($this->table, ['faktur' => $faktur]);
        if ($hapus) {
            $hapusdetail = $this->db->delete('sdr_estimasi_detail', ['faktur' => $faktur]);
            if ($hapusdetail) {
                redirect('Sundries/Transaksi/c_estimasi/index');
            }
        }
    }

    public function getEstimasiById($id)
    {
        return $this->db
            ->from('sdr_estimasi')
            ->join('sdr_estimasi_detail', 'sdr_estimasi_detail.faktur = sdr_estimasi.faktur')
            ->join('sdr_barang', 'sdr_barang.id_barang = sdr_estimasi_detail.id_barang')
            ->join('tbl_user', 'tbl_user.id_user = sdr_estimasi.id_user')
            ->join('his_section', 'his_section.id_section = tbl_user.id_section')
            ->where('sdr_estimasi.faktur', $id)
            ->get()
            ->result();
    }

    public function getEstimasiDetail($id)
    {
        return $this->db
            ->from('sdr_estimasi_detail')
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
        $query = $this->db
            ->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user = sdr_estimasi.id_user')
            ->join('his_section', 'his_section.id_section = tbl_user.id_section')
            ->where('sdr_estimasi.faktur', $id)
            ->get();

        return $query->result_array();
    }

    public function getDetailIdPdf($id)
    {
        $query = $this->db
            ->from('sdr_estimasi_detail')
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
        return $this->db
            ->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user = sdr_estimasi.id_user')
            ->join('his_section', 'his_section.id_section = tbl_user.id_section')
            ->where('status', 'Diajukan')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by('id_estimasi', 'DESC')
            ->get()
            ->result();
    }

    public function updateData($id_detail_estimasi)
    {
        // Ambil jumlah dan statusstok dari sdr_estimasi_detail berdasarkan id_detail_estimasi
        $this->db->select('jumlah, statusstok');
        $this->db->from('sdr_estimasi_detail');
        $this->db->where('id_detail_estimasi', $id_detail_estimasi);
        $query = $this->db->get();
        $row = $query->row();

        if ($row) {
            $jumlah = $row->jumlah;
            $statusstok = $row->statusstok;

            // Ambil stok dari sdr_barang
            $this->db->select('stok');
            $this->db->from('sdr_barang');
            $this->db->where('id_barang', $id_detail_estimasi); // Menggunakan id_detail_estimasi sebagai id_barang
            $query = $this->db->get();
            $row = $query->row();

            if ($row) {
                $stok = $row->stok;

                // Memeriksa apakah stok cukup
                if ($stok >= $jumlah) {
                    // Mengurangkan jumlah dari stok
                    $stok -= $jumlah;

                    // Mengatur status stok menjadi 'Ready' di sdr_estimasi_detail
                    $data_detail = [
                        'statusstok' => 'Ready',
                    ];
                    $this->db->where('id_detail_estimasi', $id_detail_estimasi);
                    $this->db->update('sdr_estimasi_detail', $data_detail);

                    // Memperbarui stok di sdr_barang
                    $data_barang = [
                        'stok' => $stok,
                    ];
                    $this->db->where('id_barang', $id_detail_estimasi);
                    $this->db->update('sdr_barang', $data_barang);

                    // Menyimpan riwayat perubahan stok atau melakukan tindakan lain yang diperlukan

                    return true; // Berhasil memperbarui data
                }
            }
        }
        return false; // Stok tidak cukup atau data tidak ditemukan
    }

    public function update($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->table, $data);
    }

    public function saveTolak($data)
    {
        $this->db->insert($this->tabletolak, $data);
    }

    // Fungsi untuk meng-generate nomor faktur berdasarkan data terakhir dalam database
    public function generateFaktur()
    {
        $this->db->select('RIGHT(faktur,4) as faktur', false);
        $this->db->order_by('faktur', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('sdr_request_sundries');

        if ($query->num_rows() != 0) {
            $data = $query->row();
            $faktur = intval($data->faktur) + 1;
        } else {
            $faktur = 1;
        }

        $lastKode = str_pad($faktur, 4, '0', STR_PAD_LEFT);
        $tahun = date('y');
        $bulan = date('m');
        $tanggal = date('d');
        $em = 'EM';

        $newfaktur = $em . '-' . $tanggal . '-' . $bulan . '-' . $tahun . '-' . $lastKode;

        return $newfaktur;
    }
}
?>
