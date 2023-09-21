<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_pembelian extends MY_Controller
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
        $this->load->model('Sundries/Transaksi/m_pembelian');
        $this->load->model('Sundries/m_detail');
        $this->load->model('Sundries/m_detail_sementara');
        $this->load->library('Pdf');
    }

    public function index()
    {
        $data['pembelian'] = $this->m_pembelian->getPembelian();

        $menu = 'pembelian';
        $this->render_backend('Sundries/Transaksi/Pembelian/v_pembelian', $menu,  $data);
    }

    public function formPembelian()
    {
        // $data['barang'] = $this->m_pembelian->getBarangBelumSiap();
        $data['permintaanbarang'] = $this->m_pembelian->getPermintaanBarang();
        $data['barang'] = $this->m_pembelian->getBarang();
        $data['fakturotomatis'] = $this->m_pembelian->generateFaktur();
        $data['keranjang'] = $this->m_pembelian->getKeranjang();

        var_dump($data['barang']);

        $menu = 'formpembelian';
        $this->render_backend('Sundries/Transaksi/Pembelian/v_form', $menu, $data);
    }

    public function addKeranjang()
    {
        $id_barang = 
    }

    public function add_Keranjang()
    {
        $idbarang = $this->input->post('id_barang');
        $qty = $this->input->post('jumlah');
        $faktur = $this->input->post('faktur');
        $catatan = $this->input->post('catatan');
        $stkeranjang = $this->input->post('stkeranjang');
        $iduser = $this->input->post('id_user');
    
        $data = array(
            'id_barang' => $idbarang,
            'jumlah' => $qty,
            'faktursundries' => $faktur,
            'keterangan' => $catatan,
            'id_user' => $iduser
        );

        $ubahkeranjang = array(
            'statuskeranjang' => $stkeranjang
        );

        $where = array(
            'id_barang' => $idbarang,
            'faktur' => $faktur
        );
            
        $this->m_pembelian->saveKeranjang($data);
        $this->m_pembelian->updateKeranjang($where, $ubahkeranjang);

        return redirect('Sundries/Transaksi/C_pembelian/formPembelian');
    }

    public function showKeranjang()
    {
        $data['keranjang'] = $this->m_pembelian->getKeranjang();
        $this->load->view('Sundries/Transaksi/Pembelian/v_keranjang', $data);
    }

    public function deleteKeranjang()
    {
        $id_barang = $this->uri->segment(5);
        $stkeranjang = $this->uri->segment(4);

        $data = array(
            'statuskeranjang' => $stkeranjang
        );

        $where = array(
            'id_barang' => $id_barang
        );

        $ubah = $this->m_pembelian->updateKeranjang($where, $data);
        $hapus = $this->m_pembelian->deleteKeranjang($id_barang);
        echo $ubah;
        echo $hapus;
        return redirect('Sundries/Transaksi/C_pembelian/formPembelian');
    }

    public function addPembelian()
    {
        $faktur = $this->input->post('faktur');
        $tanggal = $this->input->post('tanggal');
        $iduser = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $jamdibuat = $this->input->post('jam');
        
        $data = array(
            'faktur' => $faktur,
            'nama_peminta' => $nama,
            'id_user' => $iduser,
            'tanggal' => $tanggal,
            'jamdibuat' => $jamdibuat
        );

        $this->m_pembelian->save($data, $iduser, $faktur); // Tambahkan $iduser dan $faktur sebagai parameter
        $this->session->set_userdata('sukses', 'Berhasil, Request Pembelian telah dibuat');
        return redirect('Sundries/Transaksi/C_pembelian/index');
    }

    public function detailPembelian($id)
    {
        $data['data'] = $this->m_pembelian->getPembelianById($id);
        $data['detail'] = $this->m_pembelian->getDetailPembelian($id);
        $this->load->view('Sundries/Transaksi/Pembelian/v_detail', $data);
    }

    public function printPembelian()
    {
        $id = $this->uri->segment(4);
        $data['data'] = $this->m_pembelian->getIdPdf($id);
        $data['detail'] = $this->m_pembelian->getDetailIdPdf($id);
        $this->load->view('Sundries/Transaksi/Pembelian/v_print', $data);
    }
}
?>