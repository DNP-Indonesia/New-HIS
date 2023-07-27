<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_permintaan extends CI_Model
{
    protected $table = "sdr_request_sundries";
    protected $primaryKey = "id_request_sundries";
    protected $tabletolak = "sdr_tolak_sundries";
    protected $table2 = "sdr_request_sundries_detail";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Mengambil data permintaan berdasarkan status dan id_user
    public function getPermintaan($status, $id_user)
    {
        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.id_user = sdr_request_sundries.id_user');
        $this->db->join('his_section', 'his_section.id_section = tbl_user.id_section');
        $this->db->where('sdr_request_sundries.id_user', $id_user);
        $this->db->where('status', $status);
        $this->db->order_by('id_request_sundries', 'DESC');
    
        return $this->db->get()->result();
    }
    
    // Mengambil data permintaan berdasarkan id_user dan status 'Disetujui1'
    public function getSetuju1($id_user)
    {
        return $this->getPermintaan('Disetujui1', $id_user);
    }
    
    // Mengambil data permintaan berdasarkan id_user dan status 'Disetujui2'
    public function getSetuju2($id_user)
    {
        return $this->getPermintaan('Disetujui2', $id_user);
    }
    
    // Mengambil data permintaan berdasarkan id_user dan status 'Ditolak'
    public function getTolak($id_user)
    {
        return $this->getPermintaan('Ditolak', $id_user);
    }
    
    // Mengambil data permintaan berdasarkan id_user dan status 'Diproses'
    public function getProses($id_user)
    {
        return $this->getPermintaan('Diproses', $id_user);
    }
    
    // Mengambil data permintaan berdasarkan id_user dan status 'Selesai'
    public function getSelesai($id_user)
    {
        return $this->getPermintaan('Selesai', $id_user);
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Request' tanpa memperhitungkan id_user
    public function byPermintaan()
    {
        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.id_user = sdr_request_sundries.id_user');
        $this->db->join('his_section', 'his_section.id_section = tbl_user.id_section');
        $this->db->where('status', 'Request');
        $this->db->order_by('id_request_sundries', 'DESC');

        return $this->db->get()->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Disetujui2' tanpa memperhitungkan id_user
    public function bySetuju2()
    {
        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.id_user = sdr_request_sundries.id_user');
        $this->db->join('his_section', 'his_section.id_section = tbl_user.id_section');
        $this->db->where('status', 'Disetujui2');
        $this->db->order_by('id_request_sundries', 'DESC');

        return $this->db->get()->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Ditolak' tanpa memperhitungkan id_user
    public function byTolak()
    {
        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.id_user = sdr_request_sundries.id_user');
        $this->db->join('his_section', 'his_section.id_section = tbl_user.id_section');
        $this->db->where('status', 'Ditolak');
        $this->db->order_by('id_request_sundries', 'DESC');

        return $this->db->get()->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Diproses' tanpa memperhitungkan id_user
    public function byProses()
    {
        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.id_user = sdr_request_sundries.id_user');
        $this->db->join('his_section', 'his_section.id_section = tbl_user.id_section');
        $this->db->where('status', 'Diproses');
        $this->db->order_by('id_request_sundries', 'DESC');

        return $this->db->get()->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Selesai' tanpa memperhitungkan id_user
    public function bySelesai()
    {
        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.id_user = sdr_request_sundries.id_user');
        $this->db->join('his_section', 'his_section.id_section = tbl_user.id_section');
        $this->db->where('status', 'Selesai');
        $this->db->order_by('id_request_sundries', 'DESC');

        return $this->db->get()->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Disetujui2' untuk admin gudang
    public function forAdminGudang()
    {
        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.id_user = sdr_request_sundries.id_user');
        $this->db->join('his_section', 'his_section.id_section = tbl_user.id_section');
        $this->db->where('status', 'Disetujui2');
        $this->db->order_by('id_request_sundries', 'DESC');

        return $this->db->get()->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Disetujui1' untuk kepala gudang
    public function forKepalaGudang()
    {
        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.id_user = sdr_request_sundries.id_user');
        $this->db->join('his_section', 'his_section.id_section = tbl_user.id_section');
        $this->db->where('status', 'Disetujui1');
        $this->db->order_by('id_request_sundries', 'DESC');

        return $this->db->get()->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Request' dan id_bagian untuk approval
    public function forApprove()
    {
        $id_section = $this->session->userdata('section');

        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.id_user = sdr_request_sundries.id_user');
        $this->db->join('his_section', 'his_section.id_section = tbl_user.id_section');
        $this->db->where('status', 'Request');
        $this->db->where('tbl_user.id_section', $id_section);
        $this->db->order_by('id_request_sundries', 'DESC');

        return $this->db->get()->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Request' dan id_bagian untuk kepala bagian
    public function forKepalaBagianPermintaan()
    {
        $id_section = $this->session->userdata('section');

        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.id_user = sdr_request_sundries.id_user');
        $this->db->join('his_section', 'his_section.id_section = tbl_user.id_section');
        $this->db->where('status', 'Request');
        $this->db->where('tbl_user.id_section', $id_section);
        $this->db->order_by('id_request_sundries', 'DESC');

        return $this->db->get()->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Disetujui' dan id_bagian untuk kepala bagian
    public function forKepalaBagianSetuju()
    {
        $id_section = $this->session->userdata('section');

        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.id_user = sdr_request_sundries.id_user');
        $this->db->join('his_section', 'his_section.id_section = tbl_user.id_section');
        $this->db->where('status', 'Disetujui');
        $this->db->where('tbl_user.id_section', $id_section);
        $this->db->order_by('id_request_sundries', 'DESC');

        return $this->db->get()->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Ditolak' dan id_bagian untuk kepala bagian
    public function forKepalaBagianTolak()
    {
        $id_section = $this->session->userdata('section');

        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.id_user = sdr_request_sundries.id_user');
        $this->db->join('his_section', 'his_section.id_section = tbl_user.id_section');
        $this->db->where('status', 'Ditolak');
        $this->db->where('tbl_user.id_section', $id_section);
        $this->db->order_by('id_request_sundries', 'DESC');

        return $this->db->get()->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Diproses' dan id_bagian untuk kepala bagian
    public function forKepalaBagianProses()
    {
        $id_section = $this->session->userdata('section');

        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.id_user = sdr_request_sundries.id_user');
        $this->db->join('his_section', 'his_section.id_section = tbl_user.id_section');
        $this->db->where('status', 'Diproses');
        $this->db->where('tbl_user.id_section', $id_section);
        $this->db->order_by('id_request_sundries', 'DESC');

        return $this->db->get()->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Selesai' dan id_bagian untuk kepala bagian
    public function forKepalaBagianSelesai()
    {
        $id_section = $this->session->userdata('section');

        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.id_user = sdr_request_sundries.id_user');
        $this->db->join('his_section', 'his_section.id_section = tbl_user.id_section');
        $this->db->where('status', 'Selesai');
        $this->db->where('tbl_user.id_section', $id_section);
        $this->db->order_by('id_request_sundries', 'DESC');

        return $this->db->get()->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan faktur
    public function getIdPdf($id)
    {
        $query = $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user = sdr_request_sundries.id_user')
            ->join('his_section', 'his_section.id_section = tbl_user.id_section')
            ->where('sdr_request_sundries.faktur', $id)
            ->get();

        return $query->result_array();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan faktur
    public function getPermintaanById($id)
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user = sdr_request_sundries.id_user')
            ->join('his_section', 'his_section.id_section = tbl_user.id_section')
            ->where('sdr_request_sundries.faktur', $id)
            ->get()
            ->result();
    }

    // Fungsi untuk mengambil data barang dari tabel 'sdr_barang'
    public function getBarang()
    {
        return $this->db->from('sdr_barang')
            ->join('sdr_jenis', 'sdr_jenis.id_jenis = sdr_barang.id_jenis')
            ->join('sdr_kategori', 'sdr_kategori.id_kategori = sdr_jenis.id_kategori')
            ->where('sdr_jenis.id_kategori', '1')
            ->get()
            ->result();
    }

    // Fungsi untuk mengambil data tolak berdasarkan faktur
    public function getTolakById($id)
    {
        return $this->db->from($this->tabletolak)
            ->join('sdr_request_sundries', 'sdr_tolak_sundries.faktur = sdr_request_sundries.faktur')
            ->join('tbl_user', 'tbl_user.id_user = sdr_tolak_sundries.id_user')
            ->where('sdr_tolak_sundries.faktur', $id)
            ->order_by('sdr_tolak_sundries.id_tolak', 'DESC')
            ->get()
            ->result();
    }

    // Fungsi untuk menyimpan data permintaan
    public function save($data, $iduser, $faktur, $stkeranjang, $barangready)
    {
        $simpan = $this->db->insert('sdr_request_sundries', $data);
        if ($simpan) {
            $carikeranjang = $this->db->get_where('sdr_request_sundries_keranjang', array('id_user' => $iduser));
            foreach ($carikeranjang->result() as $tempel) {
                $detail = array(
                    'faktur' => $faktur,
                    'id_barang' => $tempel->id_barang,
                    'jumlah' => $tempel->jumlah,
                    'keterangan' => $tempel->keterangan,
                    'statuskeranjang' => $stkeranjang,
                    'barangready' => $barangready
                );
                $this->db->insert('sdr_request_sundries_detail', $detail);
            }
            $this->db->delete('sdr_request_sundries_keranjang', array('id_user' => $iduser));
        }
    }

    // Fungsi untuk menghapus data permintaan berdasarkan faktur
    public function delete($faktur)
    {
        $hapus = $this->db->delete('sdr_request_sundries', array('faktur' => $faktur));
        if ($hapus) {
            $hapusdetail = $this->db->delete('sdr_request_sundries_detail', array('faktur' => $faktur));
        }
    }

    // Fungsi untuk mengecek apakah item barang sudah ada di keranjang berdasarkan id_barang dan id_user
    public function cekKeranjang($idbarang, $iduser)
    {
        return $this->db->get_where('sdr_request_sundries_keranjang', array('id_barang' => $idbarang, 'id_user' => $iduser));
    }

    // Fungsi untuk mengecek apakah user memiliki item barang di keranjang berdasarkan id_user
    public function cekKeranjang2($iduser)
    {
        return $this->db->get_where('sdr_request_sundries_keranjang', array('id_user' => $iduser));
    }

    // Fungsi untuk mengambil data keranjang berdasarkan id_user
    public function selectKeranjang($id_user)
    {
        return $this->db->from('sdr_request_sundries_keranjang')
            ->join('sdr_barang', 'sdr_barang.id_barang = sdr_request_sundries_keranjang.id_barang')
            ->where('id_user', $id_user)
            ->get()
            ->result();
    }

    // Fungsi untuk menghapus data barang dari keranjang berdasarkan id_barang dan id_user
    public function deleteKeranjang($id_barang, $id_user)
    {
        $hapus = $this->db->delete('sdr_estimasi_keranjang', array('id_barang' => $id_barang, 'id_user' => $id_user));
        if ($hapus) {
            return true; // Penghapusan berhasil
        } else {
            return false; // Penghapusan gagal
        }
    }
    

    // Fungsi untuk mengupdate data permintaan berdasarkan kondisi tertentu
    public function update($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->table, $data);
    }

    // Fungsi untuk menyimpan data tolak
    public function saveTolak($data)
    {
        $this->db->insert($this->tabletolak, $data);
    }

    // Fungsi untuk mengupdate data keranjang berdasarkan kondisi tertentu
    public function updateKeranjang($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->table2, $data);
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

        $date = date('ym');
        $batas = str_pad($faktur, 4, "0", STR_PAD_LEFT);
        $faktur = "SDR/" . $date . "/" . $batas;
        return $faktur;
    }
}
?>
