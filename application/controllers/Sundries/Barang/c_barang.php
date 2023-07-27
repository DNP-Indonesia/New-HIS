<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_barang extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('Sundries/Barang/m_kategori');
		$this->load->model('Sundries/Barang/m_jenis');
        $this->load->model('Sundries/Barang/m_barang');
    }

    public function index()
    {
        $data['title'] = 'Barang';
        $data['ambil'] = $this->m_barang->getBarangAll();
        $this->load->view('Sundries/Barang/v_barang', $data);
    }

    public function addBarang()
    {
        $data['barang'] = $this->input->post('barang');
        $data['brand'] = $this->input->post('brand');
        $data['type'] = $this->input->post('type');
        $data['ukuran'] = $this->input->post('ukuran');
        $data['satuan'] = $this->input->post('satuan');
        $data['id_jenis'] = $this->input->post('jenis');
        $data['stok'] = $this->input->post('stok');

        $this->modelbarang->save($data);
        return redirect('Sundries/Barang/c_barang/index');
    }

    public function addBarangOther()
    {
        $data['barang'] = $this->input->post('barang');
        $data['brand'] = $this->input->post('brand');
        $data['type'] = $this->input->post('type');
        $data['ukuran'] = $this->input->post('ukuran');
        $data['satuan'] = $this->input->post('satuan');
        $data['id_jenis'] = $this->input->post('jenis');
        $data['stok'] = $this->input->post('stok');

        $this->m_barang->saveBarang ($data);
        $this->session->set_userdata('berhasil', 'Barang Baru Berhasil Ditambahkan, Silahkan Lanjutkan Membuat Requestnya...');
        return redirect('Sundries/Transaksi/c_penerimaan/index');
    }

    public function updateBarang()
    {
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
        return redirect('Sundries/Barang/c_barang/index');
    }

    public function deleteBarang()
    {
        if (!isset($id)) show_404();
        
        if ($this->modelbarang->delete($id)) {
            $this->session->set_flashdata('hapus', 'Barang Berhasil Dihapus');
            return redirect('Sundries/Barang/c_barang/index');
        }
    }
}
?>