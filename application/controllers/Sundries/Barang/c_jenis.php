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
		$data['ambil'] = $this->m_jenis->getJenisAll();

		$menu = 'ambil';
		$this->render_backend('Sundries/Barang/v_jenis', $menu, $data);
	}

	public function jenisadd()
	{
		$data['jenis'] = $this->input->post('jenis');
		$data['id_kategori'] = $this->input->post('kategori');
		$this->m_jenis->saveJenis($data);
		$this->session->set_flashdata('success', 'Berhasil ditambah');
		return redirect('Sundries/Barang/c_jenis/page');
	}

	public function jenisdelete($id)
	{
		if (!isset($id)) show_404();

		if ($this->m_jenis->deleteJenis($id)) {
			$this->session->set_flashdata('hapus', 'Berhasil dihapus');
			return redirect('Sundries/Barang/c_jenis/page');
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

		$this->m_jenis->updateJenis($where, $data);
		return redirect('Sundries/Barang/c_jenis/page');
	}

	// public function page()
	// {
	// 	$data['ambil'] = $this->m_jenis->findAll();
	// 	$this->load->view('Sundries/Barang/v_jenis',$data);
	// 	// $menu = 'ambil';
	// 	// $data['ambil'] = $this->m_jenis->findAll();
	// 	// $this->render_backend('Sundries/Barang/v_jenis', $menu, $data);
	// }

	// public function jenisadd()
	// {
	// 	$data['jenis'] = $this->input->post('jenis');
	// 	$data['id_kategori'] = $this->input->post('kategori');
	// 	$this->m_jenis->save($data);
	// 	$this->session->set_flashdata('success', 'Berhasil ditambah');
	// 	return redirect('Sundries/Barang/c_barang/page');
	// }

	// public function jenisdelete($id)
	// {
	// 	if (!isset($id)) show_404();

	// 	if ($this->m_jenis->delete($id)) {
	// 		$this->session->set_flashdata('hapus', 'Berhasil dihapus');
	// 		return redirect('Sundries/Barang/c_barang/page');
	// 	}
	// }

	// public function jenisupdate()
	// {
	// 	$id = $this->input->post('id_jenis');
	// 	$jenis = $this->input->post('jenis');
	// 	$kategori = $this->input->post('id_kategori');
	// 	$data = array(
	// 		'jenis' => $jenis,
	// 		'id_kategori' => $kategori
	// 	);

	// 	$where = array(
	// 		'id_jenis' => $id
	// 	);

	// 	$this->m_jenis->update($where, $data);
	// 	return redirect('Sundries/Barang/c_barang/page');
	// }
}
