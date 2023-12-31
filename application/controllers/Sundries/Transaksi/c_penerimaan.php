<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penerimaan extends MY_Controller
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
        $this->load->model('Sundries/Transaksi/m_penerimaan');
        $this->load->model('Sundries/Transaksi/m_pembelian');
        $this->load->model('Sundries/m_detail');
        $this->load->model('Sundries/m_detail_sementara');
        $this->load->library('Pdf');
    }

    public function index()
    {
        $data['penerimaan'] = $this->m_penerimaan->getPenerimaan();
        $data['pembelian'] = $this->m_pembelian->getPembelian();

        $menu = 'penerimaan';
        $this->render_backend('Sundries/Transaksi/Penerimaan/v_penerimaan', $menu, $data);
    }

    public function adminGudang()
    {
        $data['penerimaan'] = $this->m_penerimaan->getPenerimaan();
        $data['pembelian'] = $this->m_pembelian->getPembelian();

        $menu = 'penerimaan';
        $this->render_backend('Sundries/Transaksi/Dashboard/Penerimaan/v_penerimaan_admin_gudang', $menu, $data);
    }
    public function kepalaGudang()
    {
        $data['penerimaan'] = $this->m_penerimaan->getPenerimaan();
        $data['pembelian'] = $this->m_pembelian->getPembelian();

        $menu = 'penerimaan';
        $this->render_backend('Sundries/Transaksi/Dashboard/Penerimaan/v_penerimaan_kepala_gudang', $menu, $data);
    }

    public function addPenerimaan()
    {
        $suratjalan = $this->input->post('suratjalan');
        $fakturpch = $this->input->post('fakturpch');
        $keterangan = $this->input->post('keterangan');
        $po = $this->input->post('po');

        $data = array(
            'suratjalan' => $suratjalan,
            'fakturpurchase' => $fakturpch,
            'keterangan' => $keterangan
        );

        $this->m_penerimaan->savePenerimaan($data);
        $this->session->set_flashdata('success', 'Data Penerimaan Berhasil Dibuat...');
        redirect('Sundries/Transaksi/C_penerimaan/index');
    }

    public function formPenerimaan()
    {
        $fakpch = $this->uri->segment(4);

        $data['daftarpembelian'] = $this->m_penerimaan->getPembelian($fakpch);
        $this->load->view('Sundries/Transaksi/Penerimaan/v_form', $data);
    }
}
?>