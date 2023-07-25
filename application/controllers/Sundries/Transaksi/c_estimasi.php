<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_estimasi extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("Sundries/Barang/m_jenis");
        $this->load->model("Sundries/Barang/m_barang");
        $this->load->model("Sundries/Barang/m_kategori");
        $this->load->model("Sundries/Transaksi/m_estimasi");
        $this->load->library('Pdf');
    }

    public function estimasipage(){
        $data['dataestimasi'] = $this->m_estimasi->find();
        $data['barcons'] = $this->m_estimasi->findbarcons();
        $data['dataestimasikepalabagian'] = $this->m_estimasi->findforkepalabagian();
        $data['estimasiall'] = $this->m_estimasi->findall();
        $this->load->view('Sundries/Transaksi/v_estimasi',$data);
    }

    public function keranjangadd(){
        $id_barang = $this->input->post('id_barang');
        $qty = $this->input->post('qty');
        $id_user = $this->input->post('id_user');

        $cekbarang = $this->m_estimasi->cekkeranjang($id_barang, $id_user)->num_rows();
        if ($cekbarang > 0){
            
        }else{
            $data = array(
                'id_barang'=>$id_barang,
                'jumlah'=>$qty,
                'id_user'=>$id_user
            );
            
            $this->m_estimasi->savekeranjang($data);
        }
    }

    public function showkeranjang(){
        $id_user = $this->input->post('id_user');
        $data['keranjang'] = $this->m_estimasi->findkeranjang($id_user)->result();
        $this->load->view('Sundries/Transaksi/v_keranjang_estimasi',$data);
    }

    public function hapuskeranjang(){
        $id_user = $this->input->post('iduser');
        $id_barang = $this->input->post('idbarang');
        $hapus = $this->m_estimasi->deletekeranjang($id_barang, $id_user);
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

        $simpan = $this->m_estimasi->save($data, $iduser, $faktur);
        return redirect('Sundries/Transaksi/c_estimasi/estimasipage');
    }

    public function estimasidelete($faktur){
        $faktur = $this->uri->segment(4);
        $hapus = $this->m_estimasi->deleteestimasi($faktur);
    }

    public function detail(){
        $id     = $this->uri->segment(4);
        $data['data'] = $this->m_estimasi->findestimasibyid($id);
        $data['detail']   = $this->m_estimasi->findestimasidetail($id);
        $this->load->view('Sundries/Transaksi/v_detail_estimasi', $data);
    }

    public function printpdf(){
        $id     = $this->uri->segment(4);
        $data['data'] = $this->m_estimasi->findbyidforpdf($id);
        $data['detail'] = $this->m_estimasi->finddetailforpdf($id);
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
     
        $this->m_estimasi->update($where,$data);
        $this->session->set_userdata('setuju', 'Yeay, Estimasi Berhasil Disetujui Nich....');
        return redirect('Sundries/Transaksi/c_persetujuan/dashboard');
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
     
        $this->m_estimasi->update($where,$data);
        $this->session->set_userdata('tolak', 'Yah, Estimasi Ditolak Nich....');
        return redirect('Sundries/Transaksi/c_persetujuan/dashboard');
    }

}