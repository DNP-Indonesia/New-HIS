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
        $data['sdr_barang'] = $this->m_barang->getBarangAll();
        $this->load->view('Sundries/Barang/v_barang', $data);
    }

    public function addBarang()
    {
        $data['title'] = 'Barang';
        $this->load->view('Sundries/Barang/v_barang_create', $data);
    }

    public function store()
    {
        $data = [
            'barang' => $this->input->post('barang'),
            'brand' => $this->input->post('brand'),
            'type' => $this->input->post('type'),
            'ukuran' => $this->input->post('ukuran'),
            'satuan' => $this->input->post('satuan'),
            'id_jenis' => $this->input->post('jenis'),
            'stok' => $this->input->post('stok')
        );

        $this->m_barang->saveBarang($data);
        return redirect('Sundries/Barang/c_barang/index');
    }

    public function addBarangOther()
    {
        $data = array(
            'barang' => $this->input->post('barang'),
            'brand' => $this->input->post('brand'),
            'type' => $this->input->post('type'),
            'ukuran' => $this->input->post('ukuran'),
            'satuan' => $this->input->post('satuan'),
            'id_jenis' => $this->input->post('jenis'),
            'stok' => $this->input->post('stok')
        );

        $this->m_barang->saveBarang($data);
        $this->session->set_userdata('berhasil', 'Barang Baru Berhasil Ditambahkan, Silahkan Lanjutkan Membuat Requestnya...');
        return redirect('Sundries/Transaksi/c_permintaan/index');
    }

    public function updateBarang()
    {
        $id = $this->input->post('id_barang');
        $barang = $this->input->post('barang');
        $jenis = $this->input->post('jenis');
        $stok = $this->input->post('stok');
        $data = array(
            'barang' => $barang,
            'id_jenis' => $jenis,
            'stok' => $stok
        );

        $this->m_barang->updateBarang($id, $data);
        return redirect('Sundries/Barang/c_barang/index');
    }

    public function deleteBarang($id)
    {
        if (!isset($id)) show_404();

        $this->m_barang->deleteBarang($id);
        $this->session->set_flashdata('hapus', 'Barang Berhasil Dihapus');
        return redirect('Sundries/Barang/c_barang/index');
    }
}
?>
