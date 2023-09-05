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

    public function barangadd()
    {
        $data['barang'] = $this->input->post('barang');
        $data['brand'] = $this->input->post('brand');
        $data['type'] = $this->input->post('type');
        $data['ukuran'] = $this->input->post('ukuran');
        $data['satuan'] = $this->input->post('satuan');
        $data['id_jenis'] = $this->input->post('jenis');
        $data['stok'] = $this->input->post('stok');

        $this->m_barang->save($data);
        return redirect('Sundries/Barang/c_barang/page');
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
        return redirect('Sundries/Transaksi/c_permintaan/page');
    }

    public function barangupdate()
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

        $where = array(
            'id_barang' => $id
        );

        $this->m_barang->update($where, $data);
        return redirect('Sundries/Barang/c_barang/page');
    }

    public function barangdelete($id)
    {
        if (!isset($id)) show_404();

        if ($this->m_barang->delete($id)) {
            $this->session->set_flashdata('hapus', 'Berhasil dihapus');
            return redirect('Sundries/Barang/c_barang/page');
        }
    }
}
