<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_barang extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Sundries/Barang/m_barang");
        $this->load->model("Sundries/Barang/m_kategori");
        $this->load->model("Sundries/Barang/m_jenis");
    }

    public function barangpage()
    {
        $data['ambil'] = $this->m_barang->getBarangAll();
        $this->load->view('Sundries/Barang/v_barang', $data);
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
        return redirect('Sundries/Barang/c_barang/barangpage');
    }

    public function barangaddbyother()
    {
        $data['barang'] = $this->input->post('barang');
        $data['brand'] = $this->input->post('brand');
        $data['type'] = $this->input->post('type');
        $data['ukuran'] = $this->input->post('ukuran');
        $data['satuan'] = $this->input->post('satuan');
        $data['id_jenis'] = $this->input->post('jenis');
        $data['stok'] = $this->input->post('stok');
        $this->m_barang->save($data);
        $this->session->set_userdata('berhasil', 'Yeay, Barang Baru Berhasil Ditambahin Nich, Silahkan Lanjut Bikin Requestnya....');
        return redirect('Sundries/requestsundriescontroller/requestsundriespage');
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
        return redirect('Sundries/Barang/c_barang/barangpage');
    }

    public function barangdelete($id)
    {
        if (!isset($id)) show_404();

        if ($this->m_barang->delete($id)) {
            $this->session->set_flashdata('hapus', 'Berhasil dihapus');
            return redirect('Sundries/Barang/c_barang/barangpage');
        }
    }
}
