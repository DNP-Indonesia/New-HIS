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
        $data['ambil'] = $this->m_barang->getBarangAll();

        $menu = 'ambil';
        $this->render_backend('Sundries/Barang/v_barang', $menu, $data);
    }

    public function addBarang()
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
        return redirect('Sundries/Barang/c_barang/page');
    }

    public function deleteBarang($id)
    {
        if (!isset($id)) show_404();

        $this->m_barang->deleteBarang($id);
        $this->session->set_flashdata('hapus', 'Barang Berhasil Dihapus');
        return redirect('Sundries/Barang/c_barang/page');
    }

    // public function page()
    // {
    //     // $data['title'] = 'Barang';
    //     // $data['ambil'] = $this->m_barang->findAll();

    //     // $menu = 'ambil';
    //     // $this->render_backend('Sundries/Barang/v_barang', $menu, $data);
    //     $data['ambil'] = $this->m_barang->findAll();
    //     $this->load->view('Sundries/Barang/v_barang',$data);
    // }

    // public function barangadd()
    // {
    //     $data['barang'] = $this->input->post('barang');
    //     $data['brand'] = $this->input->post('brand');
    //     $data['type'] = $this->input->post('type');
    //     $data['ukuran'] = $this->input->post('ukuran');
    //     $data['satuan'] = $this->input->post('satuan');
    //     $data['id_jenis'] = $this->input->post('jenis');
    //     $data['stok'] = $this->input->post('stok');

    //     $this->m_barang->save($data);
    //     return redirect('Sundries/Barang/c_barang/page');
    // }

    // public function barangaddbyother()
    // {
    //     $data['barang'] = $this->input->post('barang');
    //     $data['brand'] = $this->input->post('brand');
    //     $data['type'] = $this->input->post('type');
    //     $data['ukuran'] = $this->input->post('ukuran');
    //     $data['satuan'] = $this->input->post('satuan');
    //     $data['id_jenis'] = $this->input->post('jenis');
    //     $data['stok'] = $this->input->post('stok');
    //     $this->m_barang->save($data);
    //     $this->session->set_userdata('berhasil', 'Yeay, Barang Baru Berhasil Ditambahin Nich, Silahkan Lanjut Bikin Requestnya....');
    //     return redirect('Sundries/requestsundriescontroller/requestsundriespage');
    // }

    // public function barangupdate()
    // {
    //     $id = $this->input->post('id_barang');
    //     $barang = $this->input->post('barang');
    //     $jenis = $this->input->post('jenis');
    //     $stok = $this->input->post('stok');
    //     $data = array(
    //         'barang' => $barang,
    //         'id_jenis' => $jenis,
    //         'stok' => $stok
    //     );

    //     $where = array(
    //         'id_barang' => $id
    //     );

    //     $this->m_barang->update($where, $data);
    //     return redirect('Sundries/Barang/c_barang/page');
    // }

    // public function barangdelete($id)
    // {
    //     if (!isset($id)) show_404();

    //     if ($this->m_barang->delete($id)) {
    //         $this->session->set_flashdata('hapus', 'Berhasil dihapus');
    //         return redirect('Sundries/Barang/c_barang/page');
    //     }
    // }
}
