<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class penerimaancontroller extends MY_Controller{

    
    public function __construct(){
        parent::__construct();
        $this->load->model("Sundries/Barang/m_jenis");
        $this->load->model("Sundries/Barang/m_barang");
        $this->load->model("Sundries/Barang/m_kategori");
        $this->load->model("Sundries/Transasksi/m_persetujuan");
        $this->load->model("Sundries/Transaksi/m_detail");
        $this->load->model("Sundries/Transaksi/m_detail_sementara");
        $this->load->model("Sundries/Transaksi/m_estimasi");
        $this->load->model("Sundries/Transaksi/m_konsumsi");
        $this->load->model("Sundries/Transaksi/m_penerimaan");
        $this->load->model("Sundries/Transaksi/m_pembelian");
        $this->load->library('Pdf');
    }

    public function penerimaanpage(){
        $data['penerimaan'] = $this->m_penerimaan->findall();
        $data['purchase'] = $this->m_pembelian->findpurchase();
        $this->load->view('sundries/penerimaan',$data);
    }

    public function penerimaanadd(){
        $suratjalan = $this->input->post('suratjalan');
        $fakturpch = $this->input->post('fakturpch');
        $keterangan = $this->input->post('keterangan');
        $po = $this->input->post('po');

        $data=array(
            'suratjalan'=>$suratjalan,
            'fakturpurchase'=>$fakturpch,
            'keterangan'=>$keterangan
        );

        $this->m_penerimaan->savepenerimaan($data);
        $this->session->set_userdata('sukses', 'Berhasil, Data Penerimaan Telah Dibuat....');
        return redirect('Sundries/penerimaancontroller/penerimaanpage');
    }

    public function formaddbarang(){
        $fakpch = $this->uri->segment(4);

        $data['daftarpurchase'] = $this->m_penerimaan->purchase($fakpch);
        $this->load->view('sundries/formdaftarbarang');
    }
}