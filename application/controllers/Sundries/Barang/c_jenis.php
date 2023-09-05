<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_jenis extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sundries/Barang/m_kategori');
        $this->load->model('Sundries/Barang/m_jenis');
    }

    public function page()
    {
        $data['jenis'] = $this->m_jenis->getJenisAll();

        $menu = 'jenis';
        $this->render_backend('Sundries/Barang/v_jenis', $menu, $data);
    }

    public function addJenis()
    {
        $data['jenis'] = $this->input->post('jenis');
        $data['id_kategori'] = $this->input->post('kategori');
        $this->m_jenis->saveJenis($data);
        $this->session->set_flashdata('success', 'Berhasil ditambah');
        return redirect('Sundries/Barang/c_jenis/page');
    }

    public function deleteJenis($id)
    {
        $this->m_jenis->deleteJenis($id);
        $this->session->set_flashdata('hapus', 'Berhasil dihapus');
        return redirect('Sundries/Barang/c_jenis/page');
    }

    public function updateJenis()
    {
        $id = $this->input->post('id_jenis');
        $jenis = $this->input->post('jenis');
        $kategori = $this->input->post('id_kategori');
        $data = [
            'jenis' => $jenis,
            'id_kategori' => $kategori,
        ];

        $where = [
            'id_jenis' => $id,
        ];

        $this->m_jenis->updateJenis($where, $data);
        return redirect('Sundries/Barang/c_jenis/page');
    }
}
