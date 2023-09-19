<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_jenis extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Sundries/Barang/m_jenis");
		$this->load->model("Sundries/Barang/m_kategori");
	}

	public function index()
	{
		$data['ambil'] = $this->m_jenis->getJenisAll();
		$this->load->view('Sundries/Barang/v_jenis', $data);
	}

	public function jenisadd()
	{
		$data['jenis'] = $this->input->post('jenis');
		$data['id_kategori'] = $this->input->post('kategori');
		$this->m_jenis->savejenis($data);
		$this->session->set_flashdata('success', 'Berhasil ditambah');
		return redirect('Sundries/Barang/c_jenis/index');
	}

	public function jenisdelete($id)
	{
		if (!isset($id)) show_404();

		if ($this->m_jenis->deleteJenis($id)) {
			$this->session->set_flashdata('hapus', 'Berhasil dihapus');
			return redirect('Sundries/Barang/c_jenis/index');
		}
	}

	public function jenisupdate()
	{
		$id = $this->input->post('id_jenis');
		$jenis = $this->input->post('jenis');
		$kategori = $this->input->post('id_kategori');
		$data = array(
			'jenis' => $jenis,
			'id_kategori' => $kategori
		);

		$where = array(
			'id_jenis' => $id
		);

		$this->m_jenis->update($where, $data);
		return redirect('Sundries/Barang/c_jenis/index');
	}
}
