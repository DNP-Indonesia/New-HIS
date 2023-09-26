<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_pembelian extends CI_Model
{
    protected $table = 'sdr_purchase';
    protected $primaryKey = 'id_purchase';
    protected $tabledetail = 'sdr_purchase_detail';
    protected $table2 = 'sdr_purchase_keranjang';
    protected $table3 = 'sdr_request_sundries_detail';

    public function getPembelian()
    {
        return $this->db
            ->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user = ' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section = tbl_user.id_section')
            ->order_by($this->primaryKey, 'DESC')
            ->get()
            ->result();
    }

    public function getPermintaanBarang()
    {
        return $this->db
            ->from('sdr_request_sundries_detail')
            ->join('sdr_request_sundries', 'sdr_request_sundries.faktur=sdr_request_sundries_detail.faktur')
            ->join('sdr_barang', 'sdr_barang.id_barang=sdr_request_sundries_detail.id_barang')
            ->where('sdr_request_sundries.status', 'Disetujui')
            ->get()
            ->result();
    }

    public function getBarang()
    {
        $this->db->select('
        sdr_request_sundries_detail.id_barang,
        SUM(sdr_request_sundries_detail.jumlah) as sundries,
        sdr_barang.id_barang,
        sdr_barang.barang,
        sdr_barang.brand,
        sdr_barang.type,
        sdr_barang.ukuran,
        sdr_barang.satuan,
        sdr_barang.stok
        ');
        $this->db->from('sdr_request_sundries_detail');
        $this->db->join('sdr_barang', 'sdr_barang.id_barang = sdr_request_sundries_detail.id_barang');
        $this->db->group_by('sdr_request_sundries_detail.id_barang');
        $this->db->where('sdr_request_sundries_detail.statusstok', 'Tidak Ready');
        $query1 = $this->db->get();

        $this->db->select('
        sdr_estimasi_detail.id_barang,
        SUM(sdr_estimasi_detail.jumlah) as estimasi,
        sdr_barang.id_barang,
        sdr_barang.barang,
        sdr_barang.brand,
        sdr_barang.type,
        sdr_barang.ukuran,
        sdr_barang.satuan,
        sdr_barang.stok
    ');
        $this->db->from('sdr_estimasi_detail');
        $this->db->join('sdr_barang', 'sdr_barang.id_barang = sdr_estimasi_detail.id_barang');
        $this->db->group_by('sdr_estimasi_detail.id_barang');
        $this->db->where('sdr_estimasi_detail.statusstok', 'Tidak Ready');
        $query2 = $this->db->get();

        // Menggabungkan hasil query
        $combinedData = [];

        foreach ($query1->result() as $row) {
            $combinedData[$row->id_barang] = [
                'sundries' => $row->sundries,
                'estimasi' => 0,
                'id_barang' => $row->id_barang,
                'barang' => $row->barang,
                'brand' => $row->brand,
                'type' => $row->type,
                'ukuran' => $row->ukuran,
                'satuan' => $row->satuan,
                'stok' => $row->stok,
            ];
        }

        foreach ($query2->result() as $row) {
            if (isset($combinedData[$row->id_barang])) {
                $combinedData[$row->id_barang]['estimasi'] = $row->estimasi;
            } else {
                $combinedData[$row->id_barang] = [
                    'sundries' => 0,
                    'estimasi' => $row->estimasi,
                    'id_barang' => $row->id_barang,
                    'barang' => $row->barang,
                    'brand' => $row->brand,
                    'type' => $row->type,
                    'ukuran' => $row->ukuran,
                    'satuan' => $row->satuan,
                    'stok' => $row->stok,
                ];
            }
        }

        return $combinedData;
    }

    public function getPembelianById($id)
    {
        return $this->db
            ->from($this->table)
            ->where($this->table . '.faktur', $id)
            ->get()
            ->result();
    }

    public function getBarangBelumSiap()
    {
        $query1 = $this->db
            ->select('sdr_estimasi_detail.*, "sdr_estimasi_detail" AS source_table')
            ->from('sdr_estimasi_detail')
            ->where('status', 'Belum Siap')
            ->get_compiled_select();

        $query2 = $this->db
            ->select('sdr_request_sundries_detail.*, "sdr_request_sundries_detail" AS source_table')
            ->from('sdr_request_sundries_detail')
            ->where('status', 'Belum Siap')
            ->get_compiled_select();

        $union_query = "($query1) UNION ALL ($query2)";

        return $this->db->query($union_query)->result();
    }

    public function getIdPdf($id)
    {
        $query = $this->db
            ->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user = ' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section = tbl_user.id_section')
            ->where($this->table . '.faktur', $id)
            ->get();

        return $query->result_array();
    }

    public function getDetailIdPdf($id)
    {
        $this->db->select('*');
        $this->db->select_sum('jumlah');
        $this->db->from($this->tabledetail);
        $this->db->join($this->table, $this->table . '.faktur = ' . $this->tabledetail . '.faktur');
        $this->db->join('sdr_barang', 'sdr_barang.id_barang = ' . $this->tabledetail . '.id_barang');
        $this->db->join('tbl_user', 'tbl_user.id_user = ' . $this->table . '.id_user');
        $this->db->join('his_section', 'his_section.id_section = tbl_user.id_section');
        $this->db->group_by($this->tabledetail . '.id_barang');
        $this->db->where($this->tabledetail . '.faktur', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function forApprove()
    {
        return $this->db
            ->from($this->table)
            ->join('tbl_user', 'tbl_user.id_user = ' . $this->table . '.id_user')
            ->join('his_section', 'his_section.id_section = tbl_user.id_section')
            ->where($this->table . '.status', 'Request')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by($this->primaryKey, 'DESC')
            ->get()
            ->result();
    }

    public function getDetailPembelian($id)
    {
        return $this->db
            ->select('*')
            ->from($this->tabledetail)
            ->join('sdr_request_sundries', 'sdr_request_sundries.faktur = ' . $this->tabledetail . '.faktur', 'left') // Ganti left join jika diperlukan
            ->join($this->table, $this->table . '.faktur = ' . $this->tabledetail . '.faktur')
            ->join('sdr_barang', 'sdr_barang.id_barang = ' . $this->tabledetail . '.id_barang')
            ->join('tbl_user', 'tbl_user.id_user = sdr_request_sundries.id_user')
            ->join('his_section', 'his_section.id_section = tbl_user.id_section')
            ->where($this->tabledetail . '.faktur', $id)
            ->get()
            ->result();
    }
    

    public function cekKerangjang($faktur)
    {
        return $this->db->get_where($this->table2, ['faktur' => $faktur]);
    }

    public function cekKeranjang2($idbarang)
    {
        return $this->db->get_where($this->table2, ['id_barang' => $idbarang]);
    }

    public function cekKeranjang3($faktur, $idbarang)
    {
        return $this->db->get_where($this->table2, ['faktur' => $faktur, 'id_barang' => $idbarang]);
    }

    public function getJmlBarang($idbarang)
    {
        return $this->db
            ->from($this->table2)
            ->where('id_barang', $idbarang)
            ->get()
            ->result();
    }

    public function saveKeranjang($data)
    {
        $this->db->insert($this->table2, $data);
    }

    public function updateKeranjang($data, $where)
    {
        $this->db->where($where);
        $this->db->update($this->table3, $data);
    }

    public function getKeranjang()
    {
        $this->db->select('*');
        $this->db->select_sum('jumlah');
        $this->db->from($this->table2);
        $this->db->join('sdr_barang', 'sdr_barang.id_barang = ' . $this->table2 . '.id_barang');
        $this->db->group_by($this->table2 . '.id_barang');
        $query = $this->db->get();
        return $query->result();
    }

    public function deleteKeranjang($id_barang)
    {
        $hapus = $this->db->delete($this->table2, ['id_barang' => $id_barang]);
        if ($hapus) {
            return 1;
        }
    }

    public function save($data, $iduser, $faktur)
    {
        $simpan = $this->db->insert($this->table, $data);
        if ($simpan) {
            $carikeranjang = $this->db->get($this->table2);
            foreach ($carikeranjang->result() as $tempel) {
                $detail = [
                    'faktur' => $faktur,
                    'id_barang' => $tempel->id_barang,
                    'jumlah' => $tempel->jumlah,
                    'keterangan' => $tempel->keterangan,

                ];
                $this->db->insert($this->tabledetail, $detail);
            }
            $this->db->delete($this->table2, ['id_user' => $iduser]);
        }
    }

    public function generateFaktur()
    {
        $this->db->select('RIGHT(faktur, 4) as faktur', false);
        $this->db->order_by('faktur', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->table);

        if ($query->num_rows() != 0) {
            $data = $query->row();
            $faktur = intval($data->faktur) + 1;
        } else {
            $faktur = 1;
        }

        $lastKode = str_pad($faktur, 4, '0', STR_PAD_LEFT);
        $tahun = date('y');
        $bulan = date('m');
        $rs = 'PS';

        $newfaktur = $rs . '' . $tahun . '' . $bulan . '.' . $lastKode;

        return $newfaktur;
    }
}
