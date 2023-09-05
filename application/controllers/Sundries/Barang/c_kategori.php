<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_kategori extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Sundries/Barang/m_kategori");
	}

	public function page()
	{
		$data['kategori'] = $this->m_kategori->getKategoriAll();

		$menu = 'kategori';
		$this->render_backend('Sundries/Barang/v_kategori', $menu, $data);
	}

	public function kategoriadd()
	{
		$data['kategori'] = $this->input->post('kategori');
		$this->m_kategori->saveKategori($data);
		$this->session->set_flashdata('success', 'Berhasil ditambah');
		return redirect('Sundries/Barang/c_kategori/page');
	}

	public function kategoridelete($id)
	{
		if (!isset($id)) show_404();

		if ($this->m_kategori->deletekategori($id)) {
			$this->session->set_flashdata('hapus', 'Berhasil dihapus');
			return redirect('Sundries/Barang/c_kategori/page');
		}
	}

	public function kategoriupdate()
	{
		$id = $this->input->post('id_kategori');
		$kategori = $this->input->post('kategori');

		$data = array(
			'kategori' => $kategori
		);

		$where = array(
			'id_kategori' => $id
		);

		$this->m_kategori->updateKategori($where, $data);
		return redirect('Sundries/Barang/c_kategori/page');
	}
}