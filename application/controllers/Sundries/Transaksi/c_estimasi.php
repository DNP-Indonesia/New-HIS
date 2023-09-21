<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_estimasi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sundries/Barang/m_jenis');
        $this->load->model('Sundries/Barang/m_barang');
        $this->load->model('Sundries/Barang/m_kategori');
        $this->load->model('Sundries/Transaksi/m_estimasi');
        $this->load->library('Pdf');
    }

    public function index()
    {
        // Admin Gudang
        $data['estimasi'] = $this->m_estimasi->getEstimasi();
        $data['setuju'] = $this->m_estimasi->getSetuju();
        $data['tolak'] = $this->m_estimasi->getTolak();
        // $data['proses'] = $this->m_estimasi->getProses();
        // $data['ready'] = $this->m_estimasi->getReady();
        // $data['selesai'] = $this->m_estimasi->getSelesai();

        // Kepala Bagian
        $data['kabagestimasi'] = $this->m_estimasi->forKepalaBagianPermintaan();
        $data['kabagsetuju'] = $this->m_estimasi->forKepalaBagianSetuju();
        $data['kabagtolak'] = $this->m_estimasi->forKepalaBagianTolak();

        // Input
        $data['barcons'] = $this->m_estimasi->getBarang();
        $data['allestimasi'] = $this->m_estimasi->getEstimasiAll();
        $data['faktur'] = $this->m_estimasi->generateFaktur();

        $menu = 'estimasi';
        $this->render_backend('Sundries/Transaksi/Estimasi/v_estimasi', $menu, $data);
    }

    public function kurangiStok()
    {
        $id_estimasi = $this->input->post('id_estimasi');
        $jumlah = $this->input->post('jumlah');
        $stok = $this->input->post('stok');
        $statusstok = $this->input->post('statusstok');

        // Panggil model untuk mengupdate stok dan status
        $result = $this->m_estimasi->updateData($id_estimasi, $jumlah, $stok, $statusstok);

        // Kirim respons JSON ke klien
        if ($result) {
            $response = ['success' => true, 'message' => 'Stok berhasil diperbarui.'];
        } else {
            $response = ['success' => false, 'message' => 'Terjadi kesalahan saat memperbarui stok.'];
        }
        echo json_encode($response);
    }

    public function cekKeranjang()
    {
        $id_barang = $this->input->post('id_barang');
        $qty = $this->input->post('qty');
        $id_user = $this->input->post('id_user');
        $catatan = $this->input->post('catatan');

        $cek = $this->m_estimasi->cekKeranjang($id_barang, $id_user)->num_rows();
        if ($cek > 0) {
            echo '1';
        } else {
            $data = [
                'id_barang' => $id_barang,
                'jumlah' => $qty,
                'id_user' => $id_user,
                'keterangan' => $catatan,
            ];

            $this->m_estimasi->saveKeranjang($data);
        }
    }

    public function showKeranjang()
    {
        $id_user = $this->input->post('id_user');
        $data['keranjang'] = $this->m_estimasi->getKeranjang($id_user);
        $this->load->view('Sundries/Transaksi/Estimasi/v_keranjang', $data);
    }

    public function deleteKeranjang()
    {
        $id_user = $this->input->post('iduser');
        $id_barang = $this->input->post('idbarang');
        $hapus = $this->m_estimasi->deleteKeranjang($id_barang, $id_user);
        echo $hapus;
    }

    public function addEstimasi()
    {
        $faktur = $this->input->post('faktur');
        $tanggal = $this->input->post('tanggal');
        $iduser = $this->input->post('id_user');
        $status = $this->input->post('status');
        $nama = $this->input->post('nama');
        $statusstok = $this->input->post('statusstok');

        $cek2 = $this->m_estimasi->cekKeranjang2($iduser)->num_rows();
        if ($cek2 == 0) {
            $this->session->set_userdata('keranjangkosong', 'Keranjang Anda masih kosong');
        } else {
            $data = [
                'faktur' => $faktur,
                'nama_pembuat' => $nama,
                'id_user' => $iduser,
                'tanggal' => $tanggal,
                'status' => $status,
            ];

            $this->m_estimasi->save($data, $iduser, $faktur, $statusstok);
            redirect('Sundries/Transaksi/c_estimasi/index');
        }
    }

    public function deleteEstimasi($faktur)
    {
        $this->m_estimasi->deleteEstimasi($faktur);
    }

    public function detailEstimasi($id)
    {
        $data['data'] = $this->m_estimasi->getEstimasiById($id);
        $data['detail'] = $this->m_estimasi->getEstimasiDetail($id);
        $data['tolak'] = $this->m_estimasi->getTolakById($id);
        $data['barang'] = $this->m_estimasi->getBarang();

        $this->load->view('Sundries/Transaksi/Estimasi/v_detail', $data);
    }

    public function printEstimasi($id)
    {
        $data['data'] = $this->m_estimasi->getIdPdf($id);
        $data['detail'] = $this->m_detail->getDetailIdPdf($id);
        $this->load->view('Sundries/Transaksi/Estimasi/v_print', $data);
    }

    public function approveEstimasi()
    {
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
    
        $data = [
            'status' => $status,
        ];
    
        $where = [
            'faktur' => $faktur,
        ];
    
        // Update status di tabel sdr_estimasi
        $this->m_estimasi->update($where, $data);
    
        // Ambil id_estimasi berdasarkan faktur
        $estimasi = $this->m_estimasi->getByFaktur($faktur);
    
        if ($estimasi) {
            // Ambil id_estimasi dari hasil query
            $id_estimasi = $estimasi->id_estimasi;
    
            // Panggil model untuk memperbarui stok dan status stok
            if ($this->m_estimasi->updateData($id_estimasi)) {
                $this->session->set_userdata('setuju', 'Estimasi berhasil disetujui');
            } else {
                $this->session->set_userdata('setuju', 'Stok tidak cukup');
            }
        } else {
            $this->session->set_userdata('setuju', 'Estimasi tidak ditemukan');
        }
    
        redirect('Sundries/Transaksi/c_estimasi/index');
    }
    

    public function rejectEstimasi()
    {
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
        $alasan = $this->input->post('alasan');
        $tanggaltolak = $this->input->post('tanggaltolak');
        $jamtolak = $this->input->post('jam');
        $iduser = $this->input->post('id_user');
        $penolak = $this->input->post('penolak');

        $data = [
            'status' => $status,
        ];

        $data2 = [
            'faktur' => $faktur,
            'alasan_tolak' => $alasan,
            'tanggal_tolak' => $tanggaltolak,
            'jamtolak' => $jamtolak,
            'id_user' => $iduser,
            'penolak' => $penolak,
        ];

        $where = [
            'faktur' => $faktur,
        ];

        $this->m_estimasi->update($where, $data);
        $this->m_estimasi->saveTolak($data2);
        $this->session->set_userdata('tolak', 'Estimasi berhasil ditolak');
        redirect('Sundries/Transaksi/c_estimasi/index');
    }

    public function detailBarang()
    {
        $id_barang = $this->input->post('id_barang');
        $detail = "SELECT brand as brand, type as type, ukuran as ukuran, satuan as satuan FROM sdr_barang WHERE id_barang='$id_barang'";
        $ambil = $this->db->query($detail)->row_array();

        $this->output->set_content_type('application/json')->set_output(json_encode($ambil));
    }
}
?>
