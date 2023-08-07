<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class jeniscontroller extends MY_Controller{

	public function __construct(){
        parent::__construct();
        $this->load->model("Sundries/modeljenis");
        $this->load->model("Sundries/modelkategori");
    }

	public function jenispage(){
		$data['ambil'] = $this->modeljenis->findAll();
		$this->load->view('sundries/Jenis',$data);
	}

	public function jenisadd(){
		$data['jenis'] = $this->input->post('jenis');
		$data['id_kategori'] = $this->input->post('kategori');
		$this->modeljenis->save($data);
		$this->session->set_flashdata('success', 'Berhasil ditambah');
		return redirect('Sundries/jeniscontroller/jenispage');
	}

	public function jenisdelete($id){
		if (!isset($id)) show_404();
        
	    if ($this->modeljenis->delete($id)) {
	    	$this->session->set_flashdata('hapus', 'Berhasil dihapus');
	        return redirect('Sundries/jeniscontroller/jenispage');
	    }
	}

	public function jenisupdate(){
		$id = $this->input->post('id_jenis');
		$jenis = $this->input->post('jenis');
 		$kategori= $this->input->post('id_kategori');
		$data = array(
			'jenis' => $jenis,
			'id_kategori' => $kategori
		);
	 
		$where = array(
			'id_jenis' => $id
		);
	 
		$this->modeljenis->update($where,$data);
		return redirect('Sundries/jeniscontroller/jenispage');
	}
}