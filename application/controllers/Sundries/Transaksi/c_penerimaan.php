<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class penerimaancontroller extends MY_Controller{

    
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
        $this->load->model("Sundries/modelpenerimaan");
        $this->load->model("Sundries/modelpurchase");
        $this->load->library('Pdf');
    }

    public function penerimaanpage(){
        $data['penerimaan'] = $this->modelpenerimaan->findall();
        $data['purchase'] = $this->modelpurchase->findpurchase();
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

        $this->modelpenerimaan->savepenerimaan($data);
        $this->session->set_userdata('sukses', 'Berhasil, Data Penerimaan Telah Dibuat....');
        return redirect('Sundries/penerimaancontroller/penerimaanpage');
    }

    public function formaddbarang(){
        $fakpch = $this->uri->segment(4);

        $data['daftarpurchase'] = $this->modelpenerimaan->purchase($fakpch);
        $this->load->view('sundries/formdaftarbarang');
    }
}