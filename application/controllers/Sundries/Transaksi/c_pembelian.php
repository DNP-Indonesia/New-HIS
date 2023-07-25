<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_pembelian extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("Sundries/Barang/m_jenis");
        $this->load->model("Sundries/Barang/m_barang");
        $this->load->model("Sundries/Barang/m_kategori");
        $this->load->model("Sundries/Transaksi/m_persetujuan");
        $this->load->model("Sundries/Transaksi/m_detail");
        $this->load->model("Sundries/Transaksi/m_detail_sementara");
        $this->load->model("Sundries/Transaksi/m_estimasi");
        $this->load->model("Sundries/Transaksi/m_konsumsi");
        $this->load->model("Sundries/Transaksi/m_pembelian");
        $this->load->library('Pdf');
    }

    public function purchasepage(){
        $data['purchase'] = $this->m_pembelian->findpurchase();
        $this->load->view('Sundries/Transaksi/v_permintaan_pembelian',$data);
    }

    public function formpurchase(){
        $data['barangrequest'] = $this->m_pembelian->findbarangrequest();
        $data['fakturotomatis']  = $this->m_pembelian->generatefaktur();
        $data['keranjang'] = $this->m_pembelian->findkeranjang();
        $this->load->view('sundries/formpurchase',$data);
    }

    public function addkeranjang(){
        $idbarang = $this->input->post('id_barang');
        $qty = $this->input->post('jumlah');
        $faktur = $this->input->post('faktur');
        $catatan = $this->input->post('catatan');
        $stkeranjang = $this->input->post('stkeranjang');
        $iduser = $this->input->post('id_user');

        //$cekfaktur = $this->m_pembelian->cekkeranjang($faktur)->num_rows();
        //$cekbarang = $this->m_pembelian->cekkeranjang2($idbarang)->num_rows();
        //$cekfakbar = $this->m_pembelian->cekkeranjang3($faktur, $idbarang)->num_rows();
    
            $data = array(
                'id_barang'=>$idbarang,
                'jumlah'=>$qty,
                'faktursundries'=>$faktur,
                'keterangan'=>$catatan,
                'id_user'=>$iduser
            );

            $ubahkeranjang = array(
                'statuskeranjang'=>$stkeranjang
            );

            $where = array(
                'id_barang'=>$idbarang,
                'faktur'=>$faktur
            );

            $this->m_pembelian->savekeranjang($data);
            $this->m_pembelian->ubahstkeranjang($ubahkeranjang, $where);   
        
            return redirect('Sundries/Transaksi/c_pembelian/formpurchase');

        // if ($cekbarang > 0) {
        //     if ($cekfaktur > 0) {
        //         echo "1";
        //     }else{
        //         $cekjumlah = $this->m_pembelian->cekjumlahbarang($idbarang);
        //         foreach ($cekjumlah as $data) {
        //             $jumlahkan = $data->jumlah + $qty;
        //         }

        //         $data = array(
        //             'id_barang'=>$idbarang,
        //             'jumlah'=>$qty,
        //             'faktur'=>$faktur,
        //             'keterangan'=>$catatan,
        //             'id_user'=>$iduser
        //         );

        //         $this->m_pembelian->savekeranjangbarangsama($data);   
        //     }
        // } else {
        //     $data = array(
        //         'id_barang'=>$idbarang,
        //         'jumlah'=>$qty,
        //         'faktur'=>$faktur,
        //         'keterangan'=>$catatan,
        //         'id_user'=>$iduser
        //     );
            
        //     $this->m_pembelian->savekeranjang($data);
        // }
    }

    public function showkeranjang(){
        $data['keranjang'] = $this->m_pembelian->findkeranjang();
        $this->load->view('Sundries/Transaksi/v_keranjang_pembelian',$data);
    }

    public function hapuskeranjang(){
        $id_barang = $this->uri->segment(5);
        $stkeranjang = $this->uri->segment(4);

        $data = array(
            'statuskeranjang'=>$stkeranjang
        );

        $where = array(
            'id_barang'=>$id_barang
        );

        $ubha = $this->m_pembelian->ubahstkeranjang($data, $where);
        $hapus = $this->m_pembelian->deletekeranjang($id_barang);
        echo $ubha;
        echo $hapus;
        return redirect('Sundries/Transaksi/c_pembelian/formpurchase');
    }

    public function purchaseadd(){
        $faktur = $this->input->post('faktur');
        $tanggal = $this->input->post('tanggal');
        $iduser = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $jamdibuat = $this->input->post('jam');


        $data = array(
            'faktur'=>$faktur,
            'nama_peminta'=>$nama,
            'id_user'=>$iduser,
            'tanggal'=>$tanggal,
            'jamdibuat'=>$jamdibuat
        );

        $simpan = $this->m_pembelian->save($data, $iduser, $faktur);
        $this->session->set_userdata('sukses', 'Berhasil, Request Telah Dibuat....');
        return redirect('Sundries/Transaksi/c_pembelian/purchasepage');

    }

    public function detail(){
        $id     = $this->uri->segment(4);
        $data['data'] = $this->m_pembelian->findbyid($id);
        $data['detail']   = $this->m_pembelian->finddetail($id);
        $this->load->view('Sundries/Transaksi/v_detail_pembelian', $data);
    }

    public function printpdf(){
        $id     = $this->uri->segment(4);
        $data['data'] = $this->m_pembelian->findbyidforpdf($id);
        $data['detail'] = $this->m_pembelian->finddetailforpdf($id);
        $this->load->view('sundries/printpurchase',$data);
        
    }
}