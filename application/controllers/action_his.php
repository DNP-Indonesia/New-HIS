<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Action_his extends MY_Controller{
	public function __construct(){
	    parent::__construct();
	    $this->load->dbforge();
		$this->load->helper('url');

		$this->load->library('Pdf');

	    $this->load->model('M_his');

	    
	}


	function do_tbh_user(){
		$spysiid       	= $_POST['spysiid'];
		$username       = $_POST['username'];
		$password       = md5($_POST['password']);
		$role       	= $_POST['role'];

		$karyawan = $this->M_his->data_karyawan_byspysi($spysiid);

		foreach ($karyawan as $kar){
			$nama 		= $kar->nama;
			$id_section = $kar->id_section;
		} 

		// echo $nama."<br>";
		// echo $id_section; die();


		$data = array(
			'username' 	=> $username,
			'password' 	=> $password,
			'nama' 		=> $nama,
			'spysiid' 	=> $spysiid,
			'id_section'=> $id_section,
			'role' 		=> $role
		);

		// echo "<pre>";
		// print_r($data);
		// echo "<pre>";
		// die();

		$this->M_his->input_any($data, 'tbl_user');


		if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data User berhasil ditambahkan');
		}

		redirect(site_url("page_his/user"));
	}

	function do_edit_user(){
		$id_user       	= $_POST['id_user'];

		$spysiid       	= $_POST['spysiid'];
		$username       = $_POST['username'];
		$password       = $_POST['password'];
		$role       	= $_POST['role'];

		$karyawan = $this->M_his->data_karyawan_byspysi($spysiid);

		foreach ($karyawan as $k){
			$nama 		= $k->nama;
			$id_section	= $k->id_section;
		}

		$where = array(
			'id_user' => $id_user 
		);

		// TENTUKAN MD5 apabila Password ganti
		$user = $this->M_his->data_any_where($where, 'tbl_user')->result();
		foreach ($user as $us){
			$pass_db = $us->password;
		}
		if ($password != $pass_db){
			$password = md5($_POST['password']);
		}

		$data = array(
			'username' 	=> $username,
			'password' 	=> $password,
			'role' 		=> $role,
			'nama' 		=> $nama,
			'id_section'=> $id_section,
			'spysiid' 	=> $spysiid,
		);

		// echo "<pre>";
		// print_r($data);
		// echo "<pre>";
		// die();

		$this->M_user->update_any($where, $data, 'tbl_user');

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect(site_url("medical/page/user"));

	}


	function do_tbh_divisi(){
		$nama_divisi       	= $_POST['nama_divisi'];
		
		$data = array(
			'nama_divisi' 	=> $nama_divisi
		);

		$this->M_his->input_any($data, 'his_divisi');

		if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Divisi baru berhasil ditambahkan');
		}

		redirect(site_url("page_his/divisi"));
	}

	function do_tbh_departemen(){
		$nama_departemen       	= $_POST['nama_departemen'];
		$id_divisi       		= $_POST['id_divisi'];
		
		$data = array(
			'nama_dep' 			=> $nama_departemen,
			'id_divisi' 		=> $id_divisi
		);

		$this->M_his->input_any($data, 'his_departemen');

		if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Departemen baru berhasil ditambahkan');
		}

		redirect(site_url("page_his/departemen"));
	}

	function do_tbh_section(){
		$nama_section       	= $_POST['nama_section'];
		$id_dep       			= $_POST['id_dep'];
		
		$data = array(
			'nama_section' 			=> $nama_section,
			'id_dep' 				=> $id_dep
		);

		$this->M_his->input_any($data, 'his_section');

		if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Section baru berhasil ditambahkan');
		}

		redirect(site_url("page_his/section"));
	}

	function do_tbh_shift(){
		$nama_shift       	= $_POST['nama_shift'];
		
		
		$data = array(
			'nama_shift' 			=> $nama_shift,
		);

		$this->M_his->input_any($data, 'his_shift');

		if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Shift baru berhasil ditambahkan');
		}

		redirect(site_url("page_his/shift"));
	}

	function do_tbh_jabatan(){
		$nama_jabatan       	= $_POST['nama_jabatan'];
		
		
		$data = array(
			'nama_jabatan' 			=> $nama_jabatan,
		);

		$this->M_his->input_any($data, 'his_jabatan');

		if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Jabatan baru berhasil ditambahkan');
		}

		redirect(site_url("page_his/jabatan"));
	}

	function do_tbh_golongan(){
		$nama_golongan       	= $_POST['nama_golongan'];
		
		
		$data = array(
			'nama_golongan' 			=> $nama_golongan,
		);

		$this->M_his->input_any($data, 'his_golongan');

		if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Golongan baru berhasil ditambahkan');
		}

		redirect(site_url("page_his/golongan"));
	}

	function do_tbh_karyawan(){
		$nama       		= $_POST['nama'];
		$id_section       	= $_POST['id_section'];
		$nik       			= $_POST['nik'];
		$id_golongan       	= $_POST['id_golongan'];
		$id_jabatan       	= $_POST['id_jabatan'];
		$id_shift       	= $_POST['id_shift'];
		$tgl_masuk       	= $_POST['tgl_masuk'];
		$tgl_lahir       	= $_POST['tgl_lahir'];
		$gender       		= $_POST['gender'];
		$pendidikan       	= $_POST['pendidikan'];

		// echo "nama : ".$nama."<br>";
		// echo "id_section : ".$id_section."<br>";
		// echo "nik : ".$nik."<br>";
		// echo "id_golongan : ".$id_golongan."<br>";
		// echo "id_jabatan : ".$id_jabatan."<br>";
		// echo "id_shift : ".$id_shift."<br>";
		// echo "tgl_masuk : ".$tgl_masuk."<br>";
		// echo "tgl_lahir : ".$tgl_lahir."<br>";
		// echo "gender : ".$gender."<br>";
		// echo "pendidikan : ".$pendidikan."<br>";

		
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

		$this->M_his->input_any($data, 'his_karyawan');

		if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Karyawan baru berhasil ditambahkan');
		}

		redirect(site_url("page_his/karyawan"));
	}


	function do_tbh_karyawan_temp(){
		$nama       		= $_POST['nama'];
		$id_section       	= $_POST['id_section'];
		$nik_temp   		= $_POST['nik_temp'];
		$id_golongan       	= $_POST['id_golongan'];
		$id_jabatan       	= $_POST['id_jabatan'];
		$id_shift       	= $_POST['id_shift'];
		$tgl_masuk       	= $_POST['tgl_masuk'];
		$tgl_lahir       	= $_POST['tgl_lahir'];
		$gender       		= $_POST['gender'];
		$pendidikan       	= $_POST['pendidikan'];
		$keterangan       	= $_POST['keterangan'];
		
		$data = array(
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

		$this->M_his->input_any($data, 'his_karyawan');

		if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Karyawan baru berhasil ditambahkan');
		}

		redirect(site_url("page_his/karyawan_temp"));
	}


	// EDIT ===================================================================================
	function do_edit_karyawan($nik_awal){

		$nama       		= $_POST['nama'];
		$id_section       	= $_POST['id_section'];
		$nik       			= $_POST['nik'];
		$id_golongan       	= $_POST['id_golongan'];
		$id_jabatan       	= $_POST['id_jabatan'];
		$id_shift       	= $_POST['id_shift'];
		$tgl_masuk       	= $_POST['tgl_masuk'];
		$tgl_lahir       	= $_POST['tgl_lahir'];
		$gender       		= $_POST['gender'];
		$pendidikan       	= $_POST['pendidikan'];

		// echo "nama : ".$nama."<br>";
		// echo "id_section : ".$id_section."<br>";
		// echo "nik : ".$nik."<br>";
		// echo "id_golongan : ".$id_golongan."<br>";
		// echo "id_jabatan : ".$id_jabatan."<br>";
		// echo "id_shift : ".$id_shift."<br>";
		// echo "tgl_masuk : ".$tgl_masuk."<br>";
		// echo "tgl_lahir : ".$tgl_lahir."<br>";
		// echo "gender : ".$gender."<br>";
		// echo "pendidikan : ".$pendidikan."<br>";

		// echo "<br>nik : ".$nik_awal."<br>";
		

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
		$this->M_his->update_any($where, $data, 'his_karyawan');

		if($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data berhasil disimpan');</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
		}

		redirect(site_url("page_his/karyawan"));

	}

	function do_edit_karyawan_temp($nik_temp){

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
		$this->M_his->update_any($where, $data, 'his_karyawan');

		if($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data berhasil disimpan');</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
		}

		redirect(site_url("page_his/karyawan_temp"));

	}


	function do_edit_divisi(){

		$nama_divisi       	= $_POST['nama_divisi'];
		$id_divisi       	= $_POST['id_divisi'];
		

		$data = array(
			'nama_divisi' 			=> $nama_divisi,
		);

		$where = array(
			'id_divisi' => $id_divisi
		);

		
		//update status keluarga proporsional pada tbl_st_kel
		$this->M_his->update_any($where, $data, 'his_divisi');

		if($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data berhasil disimpan');</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
		}

		redirect(site_url("page_his/divisi"));

	}

	function do_edit_departemen(){

		$nama_dep       	= $_POST['nama_dep'];
		$id_divisi       	= $_POST['id_divisi'];
		$id_dep       		= $_POST['id_dep'];
		

		$data = array(
			'nama_dep' 			=> $nama_dep,
			'id_divisi' 		=> $id_divisi,
		);

		$where = array(
			'id_dep' => $id_dep
		);

		
		//update status keluarga proporsional pada tbl_st_kel
		$this->M_his->update_any($where, $data, 'his_departemen');

		if($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data berhasil disimpan');</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
		}

		redirect(site_url("page_his/departemen"));
	}

	function do_edit_section(){

		$nama_section       = $_POST['nama_section'];
		$id_section       	= $_POST['id_section'];
		$id_dep       		= $_POST['id_dep'];
		

		$data = array(
			'nama_section' 		=> $nama_section,
			'id_dep' 			=> $id_dep,
		);

		$where = array(
			'id_section' => $id_section
		);

		
		//update status keluarga proporsional pada tbl_st_kel
		$this->M_his->update_any($where, $data, 'his_section');

		if($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data berhasil disimpan');</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
		}

		redirect(site_url("page_his/section"));
	}

	function do_edit_shift(){

		$nama_shift       	= $_POST['nama_shift'];
		$id_shift       	= $_POST['id_shift'];
		

		$data = array(
			'nama_shift' 			=> $nama_shift,
		);

		$where = array(
			'id_shift' => $id_shift
		);

		
		//update status keluarga proporsional pada tbl_st_kel
		$this->M_his->update_any($where, $data, 'his_shift');

		if($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data berhasil disimpan');</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
		}

		redirect(site_url("page_his/shift"));
	}


	function do_edit_jabatan(){

		$nama_jabatan       	= $_POST['nama_jabatan'];
		$id_jabatan       		= $_POST['id_jabatan'];
		

		$data = array(
			'nama_jabatan' 			=> $nama_jabatan,
		);

		$where = array(
			'id_jabatan' => $id_jabatan
		);

		
		//update status keluarga proporsional pada tbl_st_kel
		$this->M_his->update_any($where, $data, 'his_jabatan');

		if($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data berhasil disimpan');</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
		}

		redirect(site_url("page_his/jabatan"));
	}


	function do_edit_golongan(){

		$nama_golongan       	= $_POST['nama_golongan'];
		$id_golongan       		= $_POST['id_golongan'];
		

		$data = array(
			'nama_golongan' 			=> $nama_golongan,
		);

		$where = array(
			'id_golongan' => $id_golongan
		);

		
		//update status keluarga proporsional pada tbl_st_kel
		$this->M_his->update_any($where, $data, 'his_golongan');

		if($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data berhasil disimpan');</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
		}

		redirect(site_url("page_his/golongan"));
	}

	function do_out_karyawan(){

		$keterangan       	= $_POST['keterangan'];
		$nik       			= $_POST['nik'];
		

		$data = array(
			'keterangan' 	=> $keterangan,
		);

		$where = array(
			'nik' 		=> $nik
		);

		
		//update status keluarga proporsional pada tbl_st_kel
		$this->M_his->update_any($where, $data, 'his_karyawan');

		if($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data berhasil disimpan');</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
		}

		redirect(site_url("page_his/karyawan_out"));
	}

	function do_out_karyawan_temp(){

		$keterangan       			= $_POST['keterangan'];
		$nik       					= $_POST['nik'];
		

		$data = array(
			'keterangan' 	=> $keterangan,
		);

		$where = array(
			'nik' 		=> $nik
		);

		
		//update status keluarga proporsional pada tbl_st_kel
		$this->M_his->update_any($where, $data, 'his_karyawan');

		if($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data berhasil disimpan');</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
		}
		if ($keterangan == "Aktif"){
			redirect(site_url("page_his/karyawan"));
		} else {
			redirect(site_url("page_his/karyawan_out_temp"));
		}
		
	}

}