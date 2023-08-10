<<<<<<< HEAD
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');


class c_karyawan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
		$this->load->helper('url');
		$this->load->library('Pdf');
		$this->load->model('Master/m_karyawan');
	}

	public function karyawan()
	{
		$menu = $this->uri->segment(2);

		$data['karyawan'] = $this->m_karyawan->data_karyawan();

		if ($this->session->userdata('role') == 'super_user') {
			$this->render_backend('Sundries/Personal/v_karyawan.php', $menu, $data);
		} else {
			$this->render_backend('v_error', $menu, $data);
		}
	}

	public function karyawan_out()
	{
		$menu = $this->uri->segment(2);

		$data['karyawan_out'] = $this->m_karyawan->data_karyawan_out();

		$this->render_backend('Sundries/Personal/v_karyawan_keluar.php', $menu, $data);
	}

	public function karyawan_temp()
	{
		$menu = $this->uri->segment(2);

		$data['karyawan'] = $this->m_karyawan->data_karyawan_temp();

		$this->render_backend('Sundries/Personal/v_pelatihan_coba.php', $menu, $data);
	}

	public function karyawan_out_temp()
	{
		$menu = $this->uri->segment(2);

		$data['karyawan'] = $this->m_karyawan->data_karyawan_out_temp();

		$this->render_backend('Sundries/Personal/v_pelatihan_keluar', $menu, $data);
	}

	function do_tbh_user()
	{
		$spysiid       	= $_POST['spysiid'];
		$role       	= $_POST['role'];
		$username       = $_POST['username'];
		$password       = md5($_POST['password']);
		$karyawan = $this->m_karyawan->data_karyawan_byspysi($spysiid);
		$data = array(
			'spysiid' 		=> $spysiid,
			'role' 			=> $role,
			'id_section'	=> $id_section,
			'username' 		=> $username,
			'password' 		=> $password,
			'nama' 			=> $nama,
		);

		foreach ($karyawan as $kar) {
			$nama 		= $kar->nama;
			$id_section = $kar->id_section;
		}
		$this->m_karyawan->input_any($data, 'tbl_user');

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data User berhasil ditambahkan');
		}
		redirect(site_url("Auth/c_role/user"));
	}

	function do_edit_user()
	{
		$spysiid    = $_POST['spysiid'];
		$role       = $_POST['role'];
		$id_user    = $_POST['id_user'];
		$username   = $_POST['username'];
		$password   = $_POST['password'];
		$karyawan = $this->m_karyawan->data_karyawan_byspysi($spysiid);

		foreach ($karyawan as $k) {
			$nama 		= $k->nama;
			$id_section	= $k->id_section;
		}

		$where = array(
			'id_user' => $id_user
		);

		// TENTUKAN MD5 apabila Password ganti
		$user = $this->m_karyawan->data_any_where($where, 'tbl_user')->result();
		foreach ($user as $us) {
			$pass_db = $us->password;
		}

		if ($password != $pass_db) {
			$password = md5($_POST['password']);
		}

		$data = array(
			'username' 	=> $username,
			'password' 	=> $password,
			'role' 		=> $role,
			'nama' 		=> $nama,
			'id_section' => $id_section,
			'spysiid' 	=> $spysiid,
		);
		$this->M_user->update_any($where, $data, 'tbl_user');

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect(site_url("medical/page/user"));
	}

	function do_tbh_karyawan()
	{
		$spysiid        = $_POST['spysiid'];
		$nama           = $_POST['nama'];
		$id_section     = $_POST['id_section'];
		$nik            = $_POST['nik'];
		$id_golongan    = $_POST['id_golongan'];
		$id_jabatan     = $_POST['id_jabatan'];
		$id_shift       = $_POST['id_shift'];
		$tgl_masuk      = $_POST['tgl_masuk'];
		$tgl_lahir      = $_POST['tgl_lahir'];
		$gender         = $_POST['gender'];
		$pendidikan     = $_POST['pendidikan'];
		$keterangan     = "Aktif";
		$data = array(
			'spysiid' 		=> $spysiid,
			'nama' 			=> $nama,
			'id_section' 	=> $id_section,
			'nik' 			=> $nik,
			'id_golongan' 	=> $id_golongan,
			'id_jabatan' 	=> $id_jabatan,
			'id_shift' 		=> $id_shift,
			'tgl_masuk' 	=> $tgl_masuk,
			'tgl_lahir' 	=> $tgl_lahir,
			'gender' 		=> $gender,
			'pendidikan' 	=> $pendidikan,
			'keterangan' 	=> $keterangan
		);
		$this->m_karyawan->input_any($data, 'his_karyawan');

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Karyawan baru berhasil ditambahkan');
		}
		redirect(site_url("page_his/karyawan"));
	}

	function do_tbh_karyawan_temp()
	{
		$spysiid 	    = $_POST['spysiid'];
		$nama           = $_POST['nama'];
		$id_section     = $_POST['id_section'];
		$nik_temp       = $_POST['nik_temp'];
		$id_golongan    = $_POST['id_golongan'];
		$id_jabatan     = $_POST['id_jabatan'];
		$id_shift       = $_POST['id_shift'];
		$tgl_masuk      = $_POST['tgl_masuk'];
		$tgl_lahir      = $_POST['tgl_lahir'];
		$gender         = $_POST['gender'];
		$pendidikan     = $_POST['pendidikan'];
		$keterangan     = $_POST['keterangan'];
		$data = array(
			'spysiid'		=> $spysiid,
			'nik'			=> $nik_temp,
			'nik_temp' 		=> $nik_temp,
			'nama' 			=> $nama,
			'id_section' 	=> $id_section,
			'id_golongan' 	=> $id_golongan,
			'id_jabatan' 	=> $id_jabatan,
			'id_shift' 		=> $id_shift,
			'tgl_masuk' 	=> $tgl_masuk,
			'tgl_lahir' 	=> $tgl_lahir,
			'gender' 		=> $gender,
			'pendidikan' 	=> $pendidikan,
			'keterangan' 	=> $keterangan,
		);
		$this->m_karyawan->input_any($data, 'his_karyawan');

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Karyawan baru berhasil ditambahkan');
		}
		redirect(site_url("page_his/karyawan_temp"));
	}


	// EDIT ===================================================================================
	function do_edit_karyawan($nik_awal)
	{
		$nik       			= $_POST['nik'];
		$nama       		= $_POST['nama'];
		$id_section       	= $_POST['id_section'];
		$id_golongan       	= $_POST['id_golongan'];
		$id_jabatan       	= $_POST['id_jabatan'];
		$id_shift       	= $_POST['id_shift'];
		$tgl_masuk       	= $_POST['tgl_masuk'];
		$tgl_lahir       	= $_POST['tgl_lahir'];
		$gender       		= $_POST['gender'];
		$pendidikan       	= $_POST['pendidikan'];
		$data = array(
			'nama' 			=> $nama,
			'id_section' 	=> $id_section,
			'nik' 			=> $nik,
			'id_golongan' 	=> $id_golongan,
			'id_jabatan' 	=> $id_jabatan,
			'id_shift' 		=> $id_shift,
			'tgl_masuk' 	=> $tgl_masuk,
			'tgl_lahir' 	=> $tgl_lahir,
			'gender' 		=> $gender,
			'pendidikan' 	=> $pendidikan,
		);
		$where = array(
			'nik' => $nik_awal
		);
		//update status keluarga proporsional pada tbl_st_kel
		$this->m_karyawan->update_any($where, $data, 'his_karyawan');

		if ($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data berhasil disimpan');</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
		}
		redirect(site_url("page_his/karyawan"));
	}

	function do_edit_karyawan_temp($nik_temp)
	{
		$nama       		= $_POST['nama'];
		$id_section       	= $_POST['id_section'];
		$id_golongan       	= $_POST['id_golongan'];
		$id_jabatan       	= $_POST['id_jabatan'];
		$id_shift       	= $_POST['id_shift'];
		$tgl_masuk       	= $_POST['tgl_masuk'];
		$tgl_lahir       	= $_POST['tgl_lahir'];
		$gender       		= $_POST['gender'];
		$pendidikan       	= $_POST['pendidikan'];
		$data = array(
			'nama' 			=> $nama,
			'id_section' 	=> $id_section,
			'id_golongan' 	=> $id_golongan,
			'id_jabatan' 	=> $id_jabatan,
			'id_shift' 		=> $id_shift,
			'tgl_masuk' 	=> $tgl_masuk,
			'tgl_lahir' 	=> $tgl_lahir,
			'gender' 		=> $gender,
			'pendidikan' 	=> $pendidikan,
		);
		$where = array(
			'nik_temp' => $nik_temp
		);
		//update status keluarga proporsional pada tbl_st_kel
		$this->m_karyawan->update_any($where, $data, 'his_karyawan');

		if ($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data berhasil disimpan');</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
		}
		redirect(site_url("page_his/karyawan_temp"));
	}

	function do_out_karyawan()
	{
		$nik       			= $_POST['nik'];
		$keterangan       	= $_POST['keterangan'];
		$data = array(
			'keterangan' 	=> $keterangan,
		);
		$where = array(
			'nik' 		=> $nik
		);
		//update status keluarga proporsional pada tbl_st_kel
		$this->m_karyawan->update_any($where, $data, 'his_karyawan');

		if ($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data berhasil disimpan');</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
		}
		redirect(site_url("page_his/karyawan_out"));
	}

	function do_out_karyawan_temp()
	{
		$nik       					= $_POST['nik'];
		$keterangan       			= $_POST['keterangan'];
		$data = array(
			'keterangan' 	=> $keterangan,
		);
		$where = array(
			'nik' 		=> $nik
		);
		//update status keluarga proporsional pada tbl_st_kel
		$this->m_karyawan->update_any($where, $data, 'his_karyawan');

		if ($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data berhasil disimpan');</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
		}
		if ($keterangan == "Aktif") {
			redirect(site_url("page_his/karyawan"));
		} else {
			redirect(site_url("page_his/karyawan_out_temp"));
		}
	}
}
>>>>>>> rief-branch
