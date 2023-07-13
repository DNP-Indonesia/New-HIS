<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_konsumsi extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("Sundries/Barang/m_jenis");
        $this->load->model("Sundries/Barang/m_barang");
        $this->load->model("Sundries/Barang/m_kategori");
        $this->load->model("Sundries/Transaksi/m_konsumsi");
        $this->load->library('Pdf');
    }

    public function consumptionpage(){
        $data['consumptiondata'] = $this->m_konsumsi->find();
        $data['estimasi'] = $this->m_konsumsi->findestimasi();
        $data['dataconsumkepalabagian'] = $this->m_konsumsi->findforkepalabagian();
        $data['consumall'] = $this->m_konsumsi->findall();
        $this->load->view('Sundries/Transaksi/v_permintaan_konsumsi',$data);
    }

    public function barangbyfaktur(){
        $faktur = $this->input->post('faktur');
        $data = $this->m_konsumsi->findbarangbyfaktur($faktur);
        $output = '<option value="">--Pilih Barang--</option>';
        foreach ($data as $row){
            $output .= '<option value = "'.$row->id_barang.'">'.$row->barang.' Dengan Jumlah Tersisa ('.$row->jumlah.')</option>';
        }   
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function keranjangadd(){
        $id_barang = $this->input->post('id_barang');
        $qty = $this->input->post('qty');
        $id_user = $this->input->post('id_user');
        $fakest = $this->input->post('fakest');

        $cekbarang = $this->m_konsumsi->cekkeranjang($id_barang, $id_user)->num_rows();
        if ($cekbarang > 0){
            
        }else{
            $data = array(
                'id_barang'=>$id_barang,
                'jumlah'=>$qty,
                'id_user'=>$id_user,
                'fakest'=>$fakest
            );
            
            $this->m_konsumsi->savekeranjang($data);
        }
    }

    public function showkeranjang(){
        $id_user = $this->input->post('id_user');
        $data['keranjang'] = $this->m_konsumsi->findkeranjang($id_user)->result();
        $this->load->view('Sundries/Transaksi/v_keranjang_konsumsi',$data);
    }

    public function hapuskeranjang(){
        $id_user = $this->input->post('iduser');
        $id_barang = $this->input->post('idbarang');
        $hapus = $this->m_konsumsi->deletekeranjang($id_barang, $id_user);
        echo $hapus;
    }

    public function consumptionadd(){
        $faktur = $this->input->post('faktur');
        $tanggal = $this->input->post('tanggal');
        $iduser = $this->input->post('id_user');
        $status = $this->input->post('status');
        $nama = $this->input->post('nama');
        $fakest = $this->input->post('fakest');

        $data = array(
            'faktur'=>$faktur,
            'nama_peminta'=>$nama,
            'id_user'=>$iduser,
            'tanggal'=>$tanggal,
            'status'=>$status
        );

        $simpan = $this->m_konsumsi->save($data, $iduser, $faktur, $fakest);
        $this->session->set_userdata('sukses', 'Yeay, Request Berhasil Dibuat, Masih Menunggu Persetujuan Kepala Bagian Nich....');
        return redirect('Sundries/Transaksi/c_konsumsi/consumptionpage');

    }

    public function detail(){
        $id     = $this->uri->segment(4);
        $data['data'] = $this->m_konsumsi->findconsumptionbyid($id);
        $data['detail']   = $this->m_konsumsi->findconsumptiondetail($id);
        $this->load->view('Sundries/Transaksi/v_detail_konsumsi', $data);
    }

    public function printpdf(){
        $id     = $this->uri->segment(4);
        $data['data'] = $this->m_konsumsi->findbyidforpdf($id);
        $data['detail'] = $this->m_konsumsi->finddetailforpdf($id);
        $this->load->view('sundries/printconsumption',$data);
        
    }

    public function consumptiondelete($faktur){
        $faktur = $this->uri->segment(4);
        $hapus = $this->m_konsumsi->deleteconsumption($faktur);
    }

    public function consumptionaprove(){
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
 
        $data = array(
            'status' => $status
        );
     
        $where = array(
            'faktur' => $faktur
        );
     
        $this->m_konsumsi->update($where,$data);
        $this->session->set_userdata('setuju', 'Yeay, Request Berhasil Disetujui Nich....');
        return redirect('Sundries/Transaksi/c_persetujuan/dashboard');
    }

    public function consumptionreject(){
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
 
        $data = array(
            'status' => $status
        );
     
        $where = array(
            'faktur' => $faktur
        );
     
        $this->m_konsumsi->update($where,$data);
        $this->session->set_userdata('tolak', 'Yah, Request Ditolak Nich....');
        return redirect('Sundries/Transaksi/c_persetujuan/dashboard');
    }
    
}