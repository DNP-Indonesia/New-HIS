<?php

class c_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sundries\Barang\m_barang');
    }

    public function index()
    {
        $data['title'] = 'Barang';
        $data['sdr_barang'] = $this->m_barang->getBarangAll();
        $this->load->view('Sundries/Barang/v_barang', $data);
    }

    public function create()
    {
        $data['title'] = 'Barang';
        $this->load->view('Sundries/Barang/v_barang_create', $data);
    }

    public function store()
    {
        $data = [
            'barang' => $this->input->post('barang'),
            'id_jenis' => $this->input->post('id_jenis'),
            'stok' => $this->input->post('stok')
        ];
        $this->m_barang->storeBarang($data);
        redirect('Sundries/Barang/c_barang');
    }

    public function edit($id)
    {
        $data['title'] = 'Barang';
        $data['sdr_barang'] = $this->m_barang->getBarangById($id);
        $this->load->view('Sundries/Barang/v_barang_edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id_barang');
        $data = [
            'barang' => $this->input->post('barang'),
            'id_jenis' => $this->input->post('id_jenis'),
            'stok' => $this->input->post('stok')
        ];
        $this->m_barang->updateBarang($id, $data);
        redirect('Sundries/Barang/c_barang');
    }

    public function delete($id)
    {
        $this->m_barang->deleteBarang($id);
        redirect('Sundries/Barang/c_barang');
    }
}
?>