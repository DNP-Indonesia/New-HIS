<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class purchasecontroller extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("Sundries/modeljenis");
        $this->load->model("Sundries/modelbarang");
        $this->load->model("Sundries/modelkategori");
        $this->load->model("Sundries/modelrequestsundries");
        $this->load->model("Sundries/modeldetailsundries");
        $this->load->model("Sundries/modeldetailsundriessementara");
        $this->load->model("Sundries/modelestimasi");
        $this->load->model("Sundries/modelconsumption");
        $this->load->model("Sundries/modelpurchase");
        $this->load->library('Pdf');
    }

    public function purchasepage(){
        $data['purchase'] = $this->modelpurchase->findpurchase();
        $this->load->view('sundries/purchase',$data);
    }

    public function formpurchase(){
        $data['barangrequest'] = $this->modelpurchase->findbarangrequest();
        $data['fakturotomatis']  = $this->modelpurchase->generatefaktur();
        $data['keranjang'] = $this->modelpurchase->findkeranjang();
        $this->load->view('sundries/formpurchase',$data);
    }

    public function addkeranjang(){
        $idbarang = $this->input->post('id_barang');
        $qty = $this->input->post('jumlah');
        $faktur = $this->input->post('faktur');
        $catatan = $this->input->post('catatan');
        $stkeranjang = $this->input->post('stkeranjang');
        $iduser = $this->input->post('id_user');

        //$cekfaktur = $this->modelpurchase->cekkeranjang($faktur)->num_rows();
        //$cekbarang = $this->modelpurchase->cekkeranjang2($idbarang)->num_rows();
        //$cekfakbar = $this->modelpurchase->cekkeranjang3($faktur, $idbarang)->num_rows();
    
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

            $this->modelpurchase->savekeranjang($data);
            $this->modelpurchase->ubahstkeranjang($ubahkeranjang, $where);   
        
            return redirect('Sundries/purchasecontroller/formpurchase');

        // if ($cekbarang > 0) {
        //     if ($cekfaktur > 0) {
        //         echo "1";
        //     }else{
        //         $cekjumlah = $this->modelpurchase->cekjumlahbarang($idbarang);
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

        //         $this->modelpurchase->savekeranjangbarangsama($data);   
        //     }
        // } else {
        //     $data = array(
        //         'id_barang'=>$idbarang,
        //         'jumlah'=>$qty,
        //         'faktur'=>$faktur,
        //         'keterangan'=>$catatan,
        //         'id_user'=>$iduser
        //     );
            
        //     $this->modelpurchase->savekeranjang($data);
        // }
    }

    public function showkeranjang(){
        $data['keranjang'] = $this->modelpurchase->findkeranjang();
        $this->load->view('sundries/keranjangpurchase',$data);
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

        $ubha = $this->modelpurchase->ubahstkeranjang($data, $where);
        $hapus = $this->modelpurchase->deletekeranjang($id_barang);
        echo $ubha;
        echo $hapus;
        return redirect('Sundries/purchasecontroller/formpurchase');
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

        $simpan = $this->modelpurchase->save($data, $iduser, $faktur);
        $this->session->set_userdata('sukses', 'Berhasil, Request Telah Dibuat....');
        return redirect('Sundries/purchasecontroller/purchasepage');

    }

    public function detail(){
        $id     = $this->uri->segment(4);
        $data['data'] = $this->modelpurchase->findbyid($id);
        $data['detail']   = $this->modelpurchase->finddetail($id);
        $this->load->view('sundries/purchase-detail', $data);
    }

    public function printpdf(){
        $id     = $this->uri->segment(4);
        $data['data'] = $this->modelpurchase->findbyidforpdf($id);
        $data['detail'] = $this->modelpurchase->finddetailforpdf($id);
        $this->load->view('sundries/printpurchase',$data);
        
    }
}