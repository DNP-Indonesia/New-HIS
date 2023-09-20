<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_permintaan extends CI_Model
{
    protected $table = "sdr_request_sundries";
    protected $primaryKey = "id_request_sundries";
    protected $tabletolak = "sdr_request_sundries_tolak";
    protected $table2 = "sdr_request_sundries_detail";

    public function __construct()
    {
        parent::__construct();
    }

    // Mengambil data permintaan berdasarkan status dan id_user
    public function getPermintaan()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where($this->table . '.id_user', $this->session->userdata('id_user'))
            ->where('status', 'Request')
            ->order_by($this->primaryKey, 'DESC')
            ->get()
            ->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan faktur
    public function getPermintaanById($id)
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where($this->table . '.faktur', $id)
            ->get()
            ->result();
    }

    public function getBarangSundries()
    {
        return $this->db->from('sdr_barang')
        ->join('sdr_jenis', 'sdr_jenis.id_jenis=sdr_barang.id_jenis')
        ->join('sdr_kategori', 'sdr_kategori.id_kategori=sdr_jenis.id_kategori')
        ->where('sdr_jenis.id_kategori', '1')
        ->get()
        ->result();
    }

    // Mengambil data permintaan berdasarkan id_user dan status 'Disetujui'
    public function getSetuju()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where($this->table . '.id_user', $this->session->userdata('id_user'))
            ->where('status', 'Disetujui')
            ->order_by($this->primaryKey, 'DESC')
            ->get()
            ->result();
    }

    // Mengambil data permintaan berdasarkan id_user dan status 'Ditolak'
    public function getTolak()
    {
        return $this->db->from($this->table)
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

    public function getReady()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where($this->table . '.id_user', $this->session->userdata('id_user'))
            ->where('status', 'Diproses')
            ->order_by($this->primaryKey, 'DESC')
            ->get()
            ->result();
    }

    // Mengambil data permintaan berdasarkan id_user dan status 'Diproses'
    public function getProses()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where($this->table . '.id_user', $this->session->userdata('id_user'))
            ->where('status', 'Diproses')
            ->order_by($this->primaryKey, 'DESC')
            ->get()
            ->result();
    }

    // Mengambil data permintaan berdasarkan id_user dan status 'Selesai'
    public function getSelesai()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where($this->table . '.id_user', $this->session->userdata('id_user'))
            ->where('status', 'Selesai')
            ->order_by($this->primaryKey, 'DESC')
            ->get()
            ->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Request' tanpa memperhitungkan id_user
    public function byPermintaan()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->order_by($this->primaryKey, 'DESC')
            ->where('status', 'Request')
            ->get()
            ->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Ditolak' tanpa memperhitungkan id_user
    public function byTolak()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->order_by($this->primaryKey, 'DESC')
            ->where('status', 'Ditolak')
            ->get()
            ->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Diproses' tanpa memperhitungkan id_user
    public function byProses()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->order_by($this->primaryKey, 'DESC')
            ->where('status', 'Diproses')
            ->get()
            ->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Selesai' tanpa memperhitungkan id_user
    public function bySelesai()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->order_by($this->primaryKey, 'DESC')
            ->where('status', 'Selesai')
            ->get()
            ->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Disetujui2' untuk admin gudang
    public function forAdminGudang()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('status', 'Disetujui')
            ->order_by($this->primaryKey, 'DESC')
            ->get()
            ->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Disetujui' untuk kepala gudang
    public function forKepalaGudang()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('status', 'Disetujui')
            ->order_by($this->primaryKey, 'DESC')
            ->get()
            ->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Request' dan id_bagian untuk approval
    public function forApprove()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('status', 'Request')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by($this->primaryKey, 'DESC')
            ->get()
            ->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Request' dan id_bagian untuk kepala bagian
    public function forKepalaBagianPermintaan()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->where('status', 'Request')
            ->order_by($this->primaryKey, 'DESC')
            ->get()
            ->result();
    }


    // Fungsi untuk mengambil data permintaan berdasarkan status 'Disetujui' dan id_bagian untuk kepala bagian
    public function forKepalaBagianSetuju()
    {
        return $this->db->from($this->table)
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
        return $this->db->from($this->table)
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

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Diproses' dan id_bagian untuk kepala bagian
    public function forKepalaBagianProses()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->where('status', 'Diproses')
            ->order_by($this->primaryKey, 'DESC')
            ->get()
            ->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan status 'Selesai' dan id_bagian untuk kepala bagian
    public function forKepalaBagianSelesai()
    {
        return $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->where('status', 'Selesai')
            ->order_by($this->primaryKey, 'DESC')
            ->get()
            ->result();
    }

    // Fungsi untuk mengambil data permintaan berdasarkan faktur
    public function getIdPdf($id)
    {
        $query = $this->db->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user=' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section=tbl_user.id_section')
            ->where($this->table . '.faktur', $id)
            ->get();

        return $query->result_array();
    }


    // Fungsi untuk mengambil data barang dari tabel 'sdr_barang'
    public function getBarang()
    {
        return $this->db->from('sdr_barang')
            ->join('sdr_jenis', 'sdr_jenis.id_jenis=sdr_barang.id_jenis')
            ->join('sdr_kategori', 'sdr_kategori.id_kategori=sdr_jenis.id_kategori')
            ->where('sdr_jenis.id_kategori', '1')
            ->get()
            ->result();
    }

    // Fungsi untuk mengambil data tolak berdasarkan faktur
    public function getTolakById($id)
    {
        return $this->db->from($this->tabletolak)
            ->join($this->table, $this->tabletolak . '.faktur=' . $this->table . '.faktur')
            ->join('tbl_user', 'tbl_user.id_user=' . $this->tabletolak . '.id_user')
            ->where($this->tabletolak . '.faktur', $id)
            ->order_by($this->tabletolak . '.id_tolak', 'DESC')
            ->get()
            ->result();
    }

    // Fungsi untuk menyimpan data permintaan
    public function save($data, $iduser, $faktur, $stkeranjang, $barangready)
    {
        $simpan = $this->db->insert($this->table, $data);
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
                $this->db->insert($this->table2, $detail);
            }
            $this->db->delete('sdr_request_sundries_keranjang', array('id_user' => $iduser));
        }
    }

    // Fungsi untuk menghapus data permintaan berdasarkan faktur
    public function delete($faktur)
    {
        $hapus = $this->db->delete($this->table, array('faktur' => $faktur));
        if ($hapus) {
            $hapusdetail = $this->db->delete($this->table2, array('faktur' => $faktur));
        }
    }

    // Fungsi untuk mengecek apakah item barang sudah ada di keranjang berdasarkan id_barang dan id_user
    public function cekKeranjang($idbarang, $iduser)
    {
        return $this->db->get_where('sdr_request_sundries_keranjang', array('id_barang'=>$idbarang, 'id_user'=>$iduser));
    }

    // Fungsi untuk mengecek apakah user memiliki item barang di keranjang berdasarkan id_user
    public function cekKeranjang2($iduser)
    {
        return $this->db->get_where('sdr_request_sundries_keranjang', array('id_user'=>$iduser));
    }

    // Fungsi untuk mengambil data keranjang berdasarkan id_user
    public function selectKeranjang($id_user)
    {
        return $this->db->from('sdr_request_sundries_keranjang')
            ->join('sdr_barang', 'sdr_barang.id_barang=sdr_request_sundries_keranjang.id_barang')
            ->where('sdr_request_sundries_keranjang.id_user', $id_user)
            ->get()
            ->result();
    }

    // Fungsi untuk menghapus data barang dari keranjang berdasarkan id_barang dan id_user
    public function deleteKeranjang($id_barang, $id_user)
    {
        $hapus = $this->db->delete('sdr_request_sundries_keranjang', ['id_barang' => $id_barang, 'id_user' => $id_user]);
        if ($hapus) {
            return 1;
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

        $lastKode = str_pad($faktur, 4, "0", STR_PAD_LEFT);
        $tahun = date("y");
        $bulan = date("m");
        $tanggal = date("d");
        $rs = "RS";

        $newfaktur = $rs . "-" . $tanggal . "-" . $bulan . "-" . $tahun . "-" . $lastKode;

        return $newfaktur;
    }
}
?>