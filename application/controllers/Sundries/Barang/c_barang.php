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

    public function page()
    {
        $data['title'] = 'Barang';
        $data['barang'] = $this->m_barang->getBarangAll();

        $menu = 'barang';
        $this->render_backend('Sundries/Barang/v_barang', $menu, $data);
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

        $this->m_barang->saveBarang($data);
        return redirect('Sundries/Barang/c_barang/page');
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

        $this->m_barang->saveBarang($data);
        $this->session->set_userdata('berhasil', 'Barang Baru Berhasil Ditambahkan, Silahkan Lanjutkan Membuat Requestnya...');
        return redirect('Sundries/Transaksi/c_permintaan/page');
    }

    public function updateBarang()
    {
        $id = $this->input->post('id_barang');
        $barang = $this->input->post('barang');
        $jenis = $this->input->post('jenis');
        $stok = $this->input->post('stok');
        $data = [
            'barang' => $barang,
            'id_jenis' => $jenis,
            'stok' => $stok,
        ];

        $where = [
            'id_barang' => $id,
        ];

        $this->m_barang->updateBarang($where, $data);
        return redirect('Sundries/Barang/c_barang/page');
    }

    public function deleteBarang($id)
    {
        $this->m_barang->deleteBarang($id);
        $this->session->set_flashdata('hapus', 'Berhasil dihapus');
        return redirect('Sundries/Barang/c_barang/page');
    }
}
