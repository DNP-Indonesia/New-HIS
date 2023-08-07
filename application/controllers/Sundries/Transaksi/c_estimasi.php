<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class estimasicontroller extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("Sundries/modeljenis");
        $this->load->model("Sundries/modelbarang");
        $this->load->model("Sundries/modelkategori");
        $this->load->model("Sundries/modelestimasi");
        $this->load->library('Pdf');
    }

    public function estimasipage(){
        $data['dataestimasi'] = $this->modelestimasi->find();
        $data['barcons'] = $this->modelestimasi->findbarcons();
        $data['dataestimasikepalabagian'] = $this->modelestimasi->findforkepalabagian();
        $data['estimasiall'] = $this->modelestimasi->findall();
        $this->load->view('sundries/Estimasi',$data);
    }

    public function keranjangadd(){
        $id_barang = $this->input->post('id_barang');
        $qty = $this->input->post('qty');
        $id_user = $this->input->post('id_user');

        $cekbarang = $this->modelestimasi->cekkeranjang($id_barang, $id_user)->num_rows();
        if ($cekbarang > 0){
            
        }else{
            $data = array(
                'id_barang'=>$id_barang,
                'jumlah'=>$qty,
                'id_user'=>$id_user
            );
            
            $this->modelestimasi->savekeranjang($data);
        }
    }

    public function showkeranjang(){
        $id_user = $this->input->post('id_user');
        $data['keranjang'] = $this->modelestimasi->findkeranjang($id_user)->result();
        $this->load->view('sundries/keranjangestimasi',$data);
    }

    public function hapuskeranjang(){
        $id_user = $this->input->post('iduser');
        $id_barang = $this->input->post('idbarang');
        $hapus = $this->modelestimasi->deletekeranjang($id_barang, $id_user);
        echo $hapus;
    }

    public function estimasiadd(){
        $faktur = $this->input->post('faktur');
        $tanggal = $this->input->post('tanggal');
        $iduser = $this->input->post('id_user');
        $status = $this->input->post('status');
        $nama = $this->input->post('nama');

        $data = array(
            'faktur'=>$faktur,
            'nama_pembuat'=>$nama,
            'id_user'=>$iduser,
            'tanggal'=>$tanggal,
            'status'=>$status
        );

        $simpan = $this->modelestimasi->save($data, $iduser, $faktur);
        return redirect('Sundries/estimasicontroller/estimasipage');
    }

    public function estimasidelete($faktur){
        $faktur = $this->uri->segment(4);
        $hapus = $this->modelestimasi->deleteestimasi($faktur);
    }

    public function detail(){
        $id     = $this->uri->segment(4);
        $data['data'] = $this->modelestimasi->findestimasibyid($id);
        $data['detail']   = $this->modelestimasi->findestimasidetail($id);
        $this->load->view('sundries/estimasi-detail', $data);
    }

    public function printpdf(){
        $id     = $this->uri->segment(4);
        $data['data'] = $this->modelestimasi->findbyidforpdf($id);
        $data['detail'] = $this->modelestimasi->finddetailforpdf($id);
        $this->load->view('sundries/printestimasi',$data);
        
    }

    public function estimasiaprove(){
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
 
        $data = array(
            'status' => $status
        );
     
        $where = array(
            'faktur' => $faktur
        );
     
        $this->modelestimasi->update($where,$data);
        $this->session->set_userdata('setuju', 'Yeay, Estimasi Berhasil Disetujui Nich....');
        return redirect('Sundries/requestsundriescontroller/dashboard');
    }

    public function estimasireject(){
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
 
        $data = array(
            'status' => $status
        );
     
        $where = array(
            'faktur' => $faktur
        );
     
        $this->modelestimasi->update($where,$data);
        $this->session->set_userdata('tolak', 'Yah, Estimasi Ditolak Nich....');
        return redirect('Sundries/requestsundriescontroller/dashboard');
    }

}