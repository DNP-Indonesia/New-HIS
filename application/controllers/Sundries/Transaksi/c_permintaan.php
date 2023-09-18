<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_permintaan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sundries/Barang/m_jenis');
        $this->load->model('Sundries/Barang/m_barang');
        $this->load->model('Sundries/Barang/m_kategori');
        $this->load->model('Sundries/Transaksi/m_permintaan');
        $this->load->model('Sundries/Transaksi/m_estimasi');
        $this->load->model('Sundries/Transaksi/m_konsumsi');
        $this->load->model('Sundries/m_detail');
        $this->load->model('Sundries/m_detail_sementara');
        $this->load->library('Pdf');
    }

    public function dashboard()
    {
        $data['diproses'] = $this->m_permintaan->getProses();
        $data['forapprove'] = $this->m_permintaan->forApprove();
        $data['estimasi'] = $this->m_estimasi->forApprove();
        $data['konsumsi'] = $this->m_konsumsi->forApprove();
        $data['admingudang'] = $this->m_permintaan->forAdminGudang();
        $data['kepalagudang'] = $this->m_permintaan->forKepalaGudang();

        $menu = 'dashboard';
        $this->render_backend('layout/v_dashboard', $menu, $data);
    }

    public function index()
    {
        $data['bypermintaan'] = $this->m_permintaan->byPermintaan();
        $data['bytolak'] = $this->m_permintaan->byTolak();
        $data['byproses'] = $this->m_permintaan->byProses();
        $data['byselesai'] = $this->m_permintaan->bySelesai();
        $data['permintaan'] = $this->m_permintaan->getPermintaan();
        $data['setuju'] = $this->m_permintaan->getSetuju();
        $data['tolak'] = $this->m_permintaan->getTolak();
        $data['proses'] = $this->m_permintaan->getProses();
        $data['selesai'] = $this->m_permintaan->getSelesai();
        $data['adang'] = $this->m_permintaan->forAdminGudang();
        $data['kadang'] = $this->m_permintaan->forKepalaGudang();
        $data['kabagpermintaan'] = $this->m_permintaan->forKepalaBagianPermintaan();
        $data['kabagsetuju'] = $this->m_permintaan->forKepalaBagianSetuju();
        $data['kabagtolak'] = $this->m_permintaan->forKepalaBagianTolak();
        $data['kabagproses'] = $this->m_permintaan->forKepalaBagianProses();
        $data['kabagselesai'] = $this->m_permintaan->forKepalaBagianSelesai();
        $data['barang'] = $this->m_permintaan->getBarangSundries();
        $data['jenis'] = $this->m_jenis->getJenisById();
        $data['faktur'] = $this->m_permintaan->generateFaktur();

        $menu = 'permintaan';
        $this->render_backend('Sundries/Transaksi/Permintaan/v_permintaan', $menu, $data);
    }
    
    public function detail($id)
    {
        // Gunakan parameter $id yang diterima langsung dalam fungsi
        $data['data'] = $this->m_permintaan->getPermintaanById($id);
        $data['detail'] = $this->m_detail->getDetail($id);
        $data['tolak'] = $this->m_permintaan->getTolakById($id);
        $data['barang'] = $this->m_barang->getBarangAll();

        $this->load->view('Sundries/Transaksi/Permintaan/v_detail', $data);
    }

    public function updateJumlah()
    {
        $barang = $this->input->post('barang');
        $jumlah = $this->input->post('jumlah');
        $faktur = $this->input->post('faktur');
        $catatan = $this->input->post('catatan');

        $data = array(
            'jumlah' => $jumlah,
            'keterangan' => $catatan
        );

        $where = array(
            'id_barang' => $barang,
            'faktur' => $faktur
        );

        $this->m_detail->update($where, $data);
        $this->session->set_userdata('update', 'Yeay, Jumlah Atau Catatan Berhasil Diperbarui, Yuk Lihat Di Detail Request...');
        redirect('Sundries/Transaksi/c_permintaan/detail/' . $faktur);
    }

    public function cekKeranjang()
    {
        $id_barang = $this->input->post('id_barang');
        $qty = $this->input->post('qty');
        $id_user = $this->input->post('id_user');
        $catatan = $this->input->post('catatan');

        $cek = $this->m_permintaan->cekKeranjang($id_barang, $id_user)->num_rows();
        if ($cek > 0) {
            echo "1";
        } else {
            $data = array(
                'id_barang' => $id_barang,
                'jumlah' => $qty,
                'id_user' => $id_user,
                'keterangan' => $catatan
            );

            $this->m_detail_sementara->saveKeranjang($data);
        }
    }

    public function showKeranjang()
    {
        $id_user = $this->input->post('id_user');
        $data['keranjang'] = $this->m_permintaan->selectKeranjang($id_user);
        $this->load->view('Sundries/Transaksi/Permintaan/v_keranjang', $data);
    }

    public function deleteKeranjang()
    {
        $id_user = $this->input->post('iduser');
        $id_barang = $this->input->post('idbarang');
        $hapus = $this->m_permintaan->deleteKeranjang($id_user, $id_barang);
        echo $hapus;
    }

    public function addPermintaan()
    {
        $faktur = $this->input->post('faktur');
        $tanggal = $this->input->post('tanggal');
        $iduser = $this->input->post('id_user');
        $status = $this->input->post('status');
        $jamdibuat = $this->input->post('jamdibuat');
        $nama = $this->input->post('nama');

        $stkeranjang = $this->input->post('statuskeranjang');
        $barangready = "tidak";

        $cek2 = $this->m_permintaan->cekKeranjang2($iduser)->num_rows();
        if ($cek2 == 0) {
            $this->session->set_userdata('keranjangkosong', 'Hey, Keranjang Masih Kosong, Main Pencet Tombol Request Aja Nich....');
        } else {
            $data = array(
                'faktur' => $faktur,
                'nama_peminta' => $nama,
                'id_user' => $iduser,
                'tanggal' => $tanggal,
                'status' => $status,
                'jamdibuat' => $jamdibuat
            );

            $simpan = $this->m_permintaan->save($data, $iduser, $faktur, $stkeranjang, $barangready);
            // $this->session->set_userdata('sukses', 'Sukses, Request Berhasil Dibuat, Masih Menunggu Persetujuan Kepala Bagian dan Kepala Gudang....');
            $this->session->set_userdata('sukses', 'Request berhasil dibuat, Menunggu persetujuan Kepala Bagian...');
            redirect('Sundries/Transaksi/c_permintaan/index');
        }
    }

    public function deletePermintaan($faktur)
    {
        $this->m_permintaan->delete($faktur);
        $this->session->set_userdata('hapus', 'Yeay, Request Berhasil Dihapus...');
        redirect('Sundries/Transaksi/c_permintaan/index');
    }

    // public function deletePermintaan($faktur)
    // {
    //     $faktur = $this->uri->segment(4);
    //     $hapus = $this->m_permintaan->delete($faktur);
    //     $this->session->set_userdata('hapus', 'Yeay, Request Berhasil Dihapus...');
    //     redirect('Sundries/Transaksi/c_permintaan/index');
    // }

    public function printPermintaan($id)
    {
        $data['data'] = $this->m_permintaan->getIdPdf($id);
        $data['detail'] = $this->m_detail->getDetailIdPdf($id);
        $this->load->view('Sundries/Transaksi/Permintaan/v_print', $data);
    }

    public function approvePermintaan()
    {
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
        $jamsetuju = $this->input->post('jamsetuju');
        $penyetuju = $this->input->post('penyetuju');
        $tanggalsetuju = $this->input->post('tgl_setuju');

        $where = array(
            'faktur' => $faktur
        );

        $data = array(
            'status' => $status,
            'jamsetuju1' => $jamsetuju,
            'penyetuju1' => $penyetuju,
            'tanggal_setuju1' => $tanggalsetuju
        );

        // if ($this->session->userdata('role') == 'sdr_Kepala Bagian') {
            $this->m_permintaan->update($where, $data);
            $this->session->set_userdata('approve', 'Yeay, Request Berhasil Disetujui..., Masih Menunggu Persetujuan Kepala Gudang...');
            return redirect('Sundries/Transaksi/c_permintaan/index');
        
        // } elseif ($this->session->userdata('role') == 'sdr_Kepala Gudang') {
        //     $this->m_permintaan->update($where, $data2);
        //     $this->session->set_userdata('approve', 'Yeay, Request Berhasil Disetujui...');
        // }
    }

    public function rejectPermintaan()
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

        $data2 = array(
            'faktur' => $faktur,
            'alasan_tolak' => $alasan,
            'tanggal_tolak' => $tanggaltolak,
            'jamtolak' => $jamtolak,
            'id_user' => $iduser,
            'penolak' => $penolak
        );

        $where = array(
            'faktur' => $faktur
        );

        $this->m_permintaan->update($where, $data);
        $this->m_permintaan->saveTolak($data2);
        $this->session->set_userdata('tolak', 'Yahh, Request Ditolak...');
        return redirect('Sundries/Transaksi/c_permintaan/index');
    }

    public function deleteBarang($id)
    {
        if (!isset($id))
            show_404();

        if ($this->m_permintaan->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('Sundries/Transaksi/c_permintaan/index'));
        }
    }

    public function addBarang()
    {
        $faktur = $this->input->post('faktur');
        $barang = $this->input->post('barang');
        $jumlah = $this->input->post('jumlah');
        $catatan = $this->input->post('keterangan');

        $data = array(
            'faktur' => $faktur,
            'id_barang' => $barang,
            'jumlah' => $jumlah,
            'keterangan' => $catatan
        );

        $this->m_permintaan->addBarang($data);
        $this->session->set_userdata('sukses', 'Yeay, Barang Berhasil Ditambahkan...');
        return redirect('Sundries/Transaksi/c_permintaan/index');
    }

    public function permintaanUlang()
    {
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
        $tanggal = $this->input->post('tanggal');
        $stkeranjang = $this->input->post('stkeranjang');

        $data = array(
            'status' => $status,
            'tanggal' => $tanggal
        );

        $where = array(
            'faktur' => $faktur
        );

        $data2 = array(
            'statuskeranjang' => $stkeranjang
        );

        $this->m_permintaan->update($where, $data);
        $this->m_permintaan->updateKeranjang($where, $data2);
        $this->session->set_userdata('sukses', 'Yeay, Request Berhasil Dikirim Ulang...');
        return redirect('Sundries/Transaksi/c_permintaan/index');
    }

    public function permintaanProses()
    {
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
        $pemroses = $this->input->post('pemroses');
        $tanggalproses = $this->input->post('tanggalproses');
        $jamproses = $this->input->post('jamproses');

        $data = array(
            'status' => $status,
            'pemroses' => $pemroses,
            'tanggal_proses' => $tanggalproses,
            'jamproses' => $jamproses
        );

        $where = array(
            'faktur' => $faktur
        );

        $this->m_permintaan->update($where, $data);
        $this->session->set_userdata('sukses', 'Yeay, Request Berhasil Diproses...');
        return redirect('Sundries/Transaksi/c_permintaan/index');
    }

    public function permintaanSelesai()
    {
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
        $tanggalselesai = $this->input->post('tanggalselesai');
        $jamselesai = $this->input->post('jamselesai');

        $data = array(
            'status' => $status,
            'tanggal_selesai' => $tanggalselesai,
            'jamselesai' => $jamselesai
        );

        $where = array(
            'faktur' => $faktur
        );

        $this->m_permintaan->update($where, $data);
        $this->session->set_userdata('sukses', 'Yeay, Request Berhasil Diselesaikan...');
        return redirect('Sundries/Transaksi/c_permintaan/index');
    }

    public function permintaanSiap()
    {
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
        $po = $this->input->post('po');
        $jam = $this->input->post('jam');
        $surjal = $this->input->post('surjal');

        $data = array(
            'status' => $status,
            'waktu' => $jam,
            'nomorpo' => $po,
            'suratjalan' => $surjal
        );

        $where = array(
            'faktur' => $faktur
        );

        $this->m_permintaan->update($where, $data);
        $this->session->set_userdata('sukses', 'Yeay, Barang Sudah Tiba...');
        return redirect('Sundries/Transaksi/c_permintaan/index');
    }

    public function detailBarang()
    {
        $id_barang = $this->input->post('id_barang');
        $detail = "SELECT brand as brand, type as type, ukuran as ukuran, satuan as satuan FROM sdr_barang WHERE id_barang='$id_barang'";
        $ambil = $this->db->query($detail)->row_array();

        $this->output->set_content_type('application/json')->set_output(json_encode($ambil));
    }
}