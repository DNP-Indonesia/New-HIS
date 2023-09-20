<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_estimasi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Sundries/Barang/m_jenis");
        $this->load->model("Sundries/Barang/m_barang");
        $this->load->model("Sundries/Barang/m_kategori");
        $this->load->model("Sundries/Transaksi/m_estimasi");
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

        // Kepala Gudang
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

    public function cekKeranjang()
    {
        $id_barang = $this->input->post('id_barang');
        $qty = $this->input->post('qty');
        $id_user = $this->input->post('id_user');
        $catatan = $this->input->post('catatan');
        
        $cek = $this->m_estimasi->cekKeranjang($id_barang, $id_user)->num_rows();
        if ($cek > 0) {
            echo "1";
        } else {
            $data = array(
                'id_barang' => $id_barang,
                'jumlah' => $qty,
                'id_user' => $id_user,
                'keterangan'=>$catatan
            );

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
        $nama = $this->session->userdata('nama');

        $data = array(
            'faktur' => $faktur,
            'nama_pembuat' => $nama,
            'id_user' => $iduser,
            'tanggal' => $tanggal,
            'status' => $status
        );
        
        $this->m_estimasi->save($data, $iduser, $faktur);
        redirect('Sundries/Transaksi/c_estimasi/index');
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
 
        $data = array(
            'status' => $status
        );
     
        $where = array(
            'faktur' => $faktur
        );

        $this->m_estimasi->update($where, $data);
        $this->session->set_userdata('setuju', 'Estimasi berhasil disetujui');
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
 
        $data = array(
            'status' => $status
        );

        $data2 = [
            'faktur' => $faktur,
            'alasan_tolak' => $alasan,
            'tanggal_tolak' => $tanggaltolak,
            'jamtolak' => $jamtolak,
            'id_user' => $iduser,
            'penolak' => $penolak,
        ];
     
        $where = array(
            'faktur' => $faktur
        );

        $this->m_estimasi->update($where, $data);
        $this->m_estimasi->saveTolak($data2);
        $this->session->set_userdata('tolak', 'Estimasi berhasil ditolak');
        redirect('Sundries/Transaksi/c_estimasi/index');
    }
}
?>