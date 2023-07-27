<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class barangcontroller extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("Sundries/modeljenis");
        $this->load->model("Sundries/modelbarang");
        $this->load->model("Sundries/modelkategori");
    }

    public function barangpage(){
        $data['ambil'] = $this->modelbarang->findAll();
        $this->load->view('sundries/Barang',$data);
    }

    public function barangadd(){
        $data['barang'] = $this->input->post('barang');
        $data['brand'] = $this->input->post('brand');
        $data['type'] = $this->input->post('type');
        $data['ukuran'] = $this->input->post('ukuran');
        $data['satuan'] = $this->input->post('satuan');
        $data['id_jenis'] = $this->input->post('jenis');
        $data['stok'] = $this->input->post('stok');

        $this->modelbarang->save($data);
        return redirect('Sundries/barangcontroller/barangpage');
    }

    public function barangaddbyother(){
        $data['barang'] = $this->input->post('barang');
        $data['brand'] = $this->input->post('brand');
        $data['type'] = $this->input->post('type');
        $data['ukuran'] = $this->input->post('ukuran');
        $data['satuan'] = $this->input->post('satuan');
        $data['id_jenis'] = $this->input->post('jenis');
        $data['stok'] = $this->input->post('stok');
        $this->modelbarang->save($data);
        $this->session->set_userdata('berhasil', 'Yeay, Barang Baru Berhasil Ditambahin Nich, Silahkan Lanjut Bikin Requestnya....');
        return redirect('Sundries/requestsundriescontroller/requestsundriespage');
    }

    public function barangupdate(){
        $id = $this->input->post('id_barang');
        $barang= $this->input->post('barang');
        $jenis = $this->input->post('jenis');
        $stok = $this->input->post('stok');
        $data = array(
            'barang' => $barang,
            'id_jenis' => $jenis,
            'stok' => $stok
        );
     
        $where = array(
            'id_barang' => $id
        );
     
        $this->modelbarang->update($where,$data);
        return redirect('Sundries/barangcontroller/barangpage');
    }

    public function barangdelete($id){
        if (!isset($id)) show_404();
        
        if ($this->modelbarang->delete($id)) {
            $this->session->set_flashdata('hapus', 'Berhasil dihapus');
            return redirect('Sundries/barangcontroller/barangpage');
        }
    }

}