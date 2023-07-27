<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class kategoricontroller extends MY_Controller{

	public function __construct(){
        parent::__construct();
        $this->load->model("Sundries/modelkategori");
    }

	public function kategoripage(){
		$data['ambil'] = $this->modelkategori->findAll();
		$this->load->view('sundries/Kategori',$data);
	}

	public function kategoriadd(){
		$data['kategori'] = $this->input->post('kategori');
		$this->modelkategori->save($data);
		$this->session->set_flashdata('success', 'Berhasil ditambah');
		return redirect('Sundries/kategoricontroller/kategoripage');
	}

	public function kategoridelete($id){
		if (!isset($id)) show_404();
        
	    if ($this->modelkategori->delete($id)) {
	    	$this->session->set_flashdata('hapus', 'Berhasil dihapus');
	        return redirect('Sundries/kategoricontroller/kategoripage');
	    }
	}

	public function kategoriupdate(){
		$id = $this->input->post('id_kategori');
		$kategori = $this->input->post('kategori');
 
		$data = array(
			'kategori' => $kategori
		);
	 
		$where = array(
			'id_kategori' => $id
		);
	 
		$this->modelkategori->update($where,$data);
		return redirect('Sundries/kategoricontroller/kategoripage');
	}
}