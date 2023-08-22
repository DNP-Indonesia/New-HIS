<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class consumptioncontroller extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("Sundries/modeljenis");
        $this->load->model("Sundries/modelbarang");
        $this->load->model("Sundries/modelkategori");
        $this->load->model("Sundries/modelconsumption");
        $this->load->library('Pdf');
    }

    public function consumptionpage(){
        $data['consumptiondata'] = $this->modelconsumption->find();
        $data['estimasi'] = $this->modelconsumption->findestimasi();
        $data['dataconsumkepalabagian'] = $this->modelconsumption->findforkepalabagian();
        $data['consumall'] = $this->modelconsumption->findall();
        $this->load->view('sundries/consumption',$data);
    }

    public function barangbyfaktur(){
        $faktur = $this->input->post('faktur');
        $data = $this->modelconsumption->findbarangbyfaktur($faktur);
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

        $cekbarang = $this->modelconsumption->cekkeranjang($id_barang, $id_user)->num_rows();
        if ($cekbarang > 0){
            
        }else{
            $data = array(
                'id_barang'=>$id_barang,
                'jumlah'=>$qty,
                'id_user'=>$id_user,
                'fakest'=>$fakest
            );
            
            $this->modelconsumption->savekeranjang($data);
        }
    }

    public function showkeranjang(){
        $id_user = $this->input->post('id_user');
        $data['keranjang'] = $this->modelconsumption->findkeranjang($id_user)->result();
        $this->load->view('sundries/keranjangconsumption',$data);
    }

    public function hapuskeranjang(){
        $id_user = $this->input->post('iduser');
        $id_barang = $this->input->post('idbarang');
        $hapus = $this->modelconsumption->deletekeranjang($id_barang, $id_user);
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

        $simpan = $this->modelconsumption->save($data, $iduser, $faktur, $fakest);
        $this->session->set_userdata('sukses', 'Yeay, Request Berhasil Dibuat, Masih Menunggu Persetujuan Kepala Bagian Nich....');
        return redirect('Sundries/consumptioncontroller/consumptionpage');

    }

    public function detail(){
        $id     = $this->uri->segment(4);
        $data['data'] = $this->modelconsumption->findconsumptionbyid($id);
        $data['detail']   = $this->modelconsumption->findconsumptiondetail($id);
        $this->load->view('sundries/consumption-detail', $data);
    }

    public function printpdf(){
        $id     = $this->uri->segment(4);
        $data['data'] = $this->modelconsumption->findbyidforpdf($id);
        $data['detail'] = $this->modelconsumption->finddetailforpdf($id);
        $this->load->view('sundries/printconsumption',$data);
        
    }

    public function consumptiondelete($faktur){
        $faktur = $this->uri->segment(4);
        $hapus = $this->modelconsumption->deleteconsumption($faktur);
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
     
        $this->modelconsumption->update($where,$data);
        $this->session->set_userdata('setuju', 'Yeay, Request Berhasil Disetujui Nich....');
        return redirect('Sundries/requestsundriescontroller/dashboard');
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
     
        $this->modelconsumption->update($where,$data);
        $this->session->set_userdata('tolak', 'Yah, Request Ditolak Nich....');
        return redirect('Sundries/requestsundriescontroller/dashboard');
    }
    
}