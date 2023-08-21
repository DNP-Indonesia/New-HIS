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

		redirect(site_url("Auth/c_role/user"));
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
		$spysiid 		= $_POST['spysiid'];
		$nama 			= $_POST['nama'];
		$id_section 	= $_POST['id_section'];
		$nik 			= $_POST['nik'];
		$id_golongan 	= $_POST['id_golongan'];
		$id_jabatan 	= $_POST['id_jabatan'];
		$id_shift 		= $_POST['id_shift'];
		$tgl_masuk 		= $_POST['tgl_masuk'];
		$tgl_lahir 		= $_POST['tgl_lahir'];
		$gender 		= $_POST['gender'];
		$pendidikan 	= $_POST['pendidikan'];
		$keterangan 	= "Aktif";
	
		// Validasi spysiid telah digunakan
		$existingSpysiid = $this->M_his->get_by_condition('his_karyawan', array('spysiid' => $spysiid));
		if ($existingSpysiid) {
			$this->session->set_flashdata('error', 'SPYSIID telah digunakan. Silakan pilih SPYSIID yang lain.');
			redirect(site_url("page_his/karyawan"));
		}

		// Validasi 1: spysiid harus angka sepanjang 8 digit dan harus unik
		if (!preg_match('/^\d{8}$/', $spysiid)) {
			// Format spysiid tidak valid
			// Atur pesan kesalahan, misalnya, tampilkan pesan kesalahan atau redirect kembali dengan kesalahan
			$this->session->set_flashdata('error', 'Format spysiid tidak valid. Harus berupa angka 8 digit.');
			redirect(site_url("page_his/karyawan"));
		}

		// Validasi nik telah digunakan
		$existingNik = $this->M_his->get_by_condition('his_karyawan', array('nik' => $nik));
		if ($existingNik) {
			$this->session->set_flashdata('error', 'NIK telah digunakan. Silakan pilih NIK yang lain.');
			redirect(site_url("page_his/karyawan"));
		}

	
		// Validasi 2: nama tidak boleh mengandung karakter spesial atau angka
		if (!preg_match('/^[a-zA-Z\s]+$/', $nama)) {
			// Format nama tidak valid
			// Atur pesan kesalahan, misalnya, tampilkan pesan kesalahan atau redirect kembali dengan kesalahan
			$this->session->set_flashdata('error', 'Format nama tidak valid. Hanya huruf dan spasi yang diperbolehkan.');
			redirect(site_url("page_his/karyawan"));
		}
	
		// Validasi 3: nik harus angka sepanjang 4 digit dan harus unik
		if (!preg_match('/^\d{4}$/', $nik)) {
			// Format nik tidak valid
			// Atur pesan kesalahan, misalnya, tampilkan pesan kesalahan atau redirect kembali dengan kesalahan
			$this->session->set_flashdata('error', 'Format nik tidak valid. Harus berupa angka 4 digit.');
			redirect(site_url("page_his/karyawan"));
		}

		// Validasi tanggal lahir
		$birthdate = new DateTime($tgl_lahir);
		$today = new DateTime();
		$age = $birthdate->diff($today)->y;
	
		if ($age < 18) {
			$this->session->set_flashdata('error', 'Usia karyawan harus minimal 18 tahun');
			redirect(site_url("page_his/karyawan"));
		}
	
		// // Periksa apakah spysiid atau nik sudah ada di database
		// $existingData = $this->M_his->get_karyawan_by_spysiid_nik($spysiid, $nik);
		// if (!empty($existingData)) {
		// 	// spysiid atau nik sudah ada di database
		// 	// Atur pesan kesalahan, misalnya, tampilkan pesan kesalahan atau redirect kembali dengan kesalahan
		// 	$this->session->set_flashdata('error', 'spysiid atau nik sudah ada.');
		// 	redirect(site_url("page_his/karyawan"));
		// }
	
		$data = array(
			'spysiid' => $spysiid,
			'nama' => $nama,
			'id_section' => $id_section,
			'nik' => $nik,
			'id_golongan' => $id_golongan,
			'id_jabatan' => $id_jabatan,
			'id_shift' => $id_shift,
			'tgl_masuk' => $tgl_masuk,
			'tgl_lahir' => $tgl_lahir,
			'gender' => $gender,
			'pendidikan' => $pendidikan,
			'keterangan' => $keterangan
		);
	
		$this->M_his->input_any($data, 'his_karyawan');
	
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Karyawan baru berhasil ditambahkan');
		}
	
		redirect(site_url("page_his/karyawan"));
	}
	


	function do_tbh_karyawan_temp(){

		$spysiid 			= $_POST['spysiid'];
		$nama       		= $_POST['nama'];
		$id_section       	= $_POST['id_section'];
		$nik_training   	= $_POST['nik_training'];
		$id_golongan       	= $_POST['id_golongan'];
		$id_jabatan       	= $_POST['id_jabatan'];
		$id_shift       	= $_POST['id_shift'];
		$tgl_masuk       	= $_POST['tgl_masuk'];
		$tgl_lahir       	= $_POST['tgl_lahir'];
		$gender       		= $_POST['gender'];
		$pendidikan       	= $_POST['pendidikan'];
		$keterangan 		= $_POST['keterangan'];

		// Validasi spysiid telah digunakan
			$existingSpysiid = $this->M_his->get_by_condition('his_karyawan', array('spysiid' => $spysiid));
		if ($existingSpysiid) {
			$this->session->set_flashdata('error', 'SPYSIID telah digunakan. Silakan pilih SPYSIID yang lain.');
			redirect(site_url("page_his/karyawan_temp"));
		}

		// Validasi 1: spysiid harus angka sepanjang 8 digit dan harus unik
		if (!preg_match('/^\d{8}$/', $spysiid)) {
			// Format spysiid tidak valid
			// Atur pesan kesalahan, misalnya, tampilkan pesan kesalahan atau redirect kembali dengan kesalahan
			$this->session->set_flashdata('error', 'Format spysiid tidak valid. Harus berupa angka 8 digit.');
			redirect(site_url("page_his/karyawan_temp"));
		}

		// Validasi nik telah digunakan
		$existingNik = $this->M_his->get_by_condition('his_karyawan', array('nik_training' => $nik_training));
		if ($existingNik) {
			$this->session->set_flashdata('error', 'NIK telah digunakan. Silakan pilih NIK yang lain.');
			redirect(site_url("page_his/karyawan_temp"));
		}

	
		// Validasi 2: nama tidak boleh mengandung karakter spesial atau angka
		if (!preg_match('/^[a-zA-Z\s]+$/', $nama)) {
			// Format nama tidak valid
			// Atur pesan kesalahan, misalnya, tampilkan pesan kesalahan atau redirect kembali dengan kesalahan
			$this->session->set_flashdata('error', 'Format nama tidak valid. Hanya huruf dan spasi yang diperbolehkan.');
			redirect(site_url("page_his/karyawan_temp"));
		}
	
		// Validasi 3: nik harus angka sepanjang 4 digit dan harus unik
		if (!preg_match('/^\d{4}$/', $nik_training)) {
			// Format nik tidak valid
			// Atur pesan kesalahan, misalnya, tampilkan pesan kesalahan atau redirect kembali dengan kesalahan
			$this->session->set_flashdata('error', 'Format nik tidak valid. Harus berupa angka 4 digit.');
			redirect(site_url("page_his/karyawan_temp"));
		}


		// Validasi tanggal lahir
		$birthdate = new DateTime($tgl_lahir);
		$today = new DateTime();
		$age = $birthdate->diff($today)->y;
	
		if ($age < 18) {
			$this->session->set_flashdata('error', 'Usia karyawan harus minimal 18 tahun');
			redirect(site_url("page_his/karyawan_temp"));
		}


		
		$data = array(
			'spysiid'		=> $spysiid,
			'nama' 			=> $nama,
			'id_section' 	=> $id_section,
			'nik_training' 	=> $nik_training,
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
		$nama 			= $_POST['nama'];
		$id_section 	= $_POST['id_section'];
		$nik 			= $_POST['nik'];
		$id_golongan 	= $_POST['id_golongan'];
		$id_jabatan 	= $_POST['id_jabatan'];
		$id_shift 		= $_POST['id_shift'];
		$tgl_masuk 		= $_POST['tgl_masuk'];
		$tgl_lahir 		= $_POST['tgl_lahir'];
		$gender 		= $_POST['gender'];
		$pendidikan 	= $_POST['pendidikan'];

		// validasi nama
		if (!preg_match('/^[A-Za-z\s]+$/', $nama)) {
        $this->session->set_flashdata('error', 'Format nama tidak valid. Hanya huruf dan spasi yang diperbolehkan.');
        redirect(site_url("page_his/karyawan"));
   		}
		// Validasi nik
		if (!preg_match('/^\d{4}$/', $nik)) {
			$this->session->set_flashdata('error', 'Format nik tidak valid. Harus berupa angka 4 digit.');
			redirect(site_url("page_his/karyawan"));
		}
	
		// Validasi tanggal lahir
		$today = new DateTime();
		$birthdate = DateTime::createFromFormat('Y-m-d', $tgl_lahir);
		$age = $birthdate->diff($today)->y;
		if ($age < 18) {
			$this->session->set_flashdata('error', 'Umur harus minimal 18 tahun.');
			redirect(site_url("page_his/karyawan"));
		}
	
		$data = array(
			'nama' => $nama,
			'id_section' => $id_section,
			'nik' => $nik,
			'id_golongan' => $id_golongan,
			'id_jabatan' => $id_jabatan,
			'id_shift' => $id_shift,
			'tgl_masuk' => $tgl_masuk,
			'tgl_lahir' => $tgl_lahir,
			'gender' => $gender,
			'pendidikan' => $pendidikan,
		);
	
		$where = array(
			'nik' => $nik_awal
		);
	
		$this->M_his->update_any($where, $data, 'his_karyawan');
	
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil diubah');
		}
	
		redirect(site_url("page_his/karyawan"));
	}

	function do_edit_karyawan_temp($nik_temp){

		$nama       		= $_POST['nama'];
		$nik_training		= $_POST['nik_training'];
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
			'nik_training' 	=> $nik_training,
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
			'nik_training' => $nik_temp
		);

		
		//update status keluarga proporsional pada tbl_st_kel
		$this->M_his->update_any($where, $data, 'his_karyawan');

		if($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data berhasil disimpan');</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
		}

		redirect(site_url("page_his/karyawan_temp"));

	}

	function do_mutasi_karyawan($nik_awal){

		$karyawan = $this->M_his->data_karyawan_bynik($nik_awal);

        if (!empty($karyawan)) {
            // Menyimpan data lama sebelum perubahan
            $data_lama = array(
                'id_section'  => $karyawan[0]->id_section,
                'id_golongan' => $karyawan[0]->id_golongan,
                'id_jabatan'  => $karyawan[0]->id_jabatan,
                'id_shift'    => $karyawan[0]->id_shift,
            );

            // Tampilkan data lama sebelum perubahan



            // Proses mutasi dan penyimpanan log
            $id_section = $this->input->post('id_section');
            $id_golongan = $this->input->post('id_golongan');
            $id_jabatan = $this->input->post('id_jabatan');
            $id_shift = $this->input->post('id_shift');

            $data_baru = array(
                'id_section' => $id_section,
                'id_golongan' => $id_golongan,
                'id_jabatan' => $id_jabatan,
                'id_shift' => $id_shift,
            );

            $where = array(
                'nik' => $nik_awal
            );


			$log_data = array(

				'spysiid' => $karyawan[0]->spysiid,
				'nik' => $karyawan[0]->nik,
				'id_section_sebelum' => $data_lama['id_section'],
				'id_section_sesudah' => $data_baru['id_section'],
				'id_golongan_sebelum' => $data_lama['id_golongan'],
				'id_golongan_sesudah' => $data_baru['id_golongan'],
				'id_jabatan_sebelum' => $data_lama['id_jabatan'],
				'id_jabatan_sesudah' => $data_baru['id_jabatan'],
				'id_shift_sebelum' => $data_lama['id_shift'],
				'id_shift_sesudah' => $data_baru['id_shift'],
				'tgl_mutasi'       => date('Y-m-d H:i:s'),
				
			);

            $this->M_his->update_any($where, $data_baru, 'his_karyawan');
			$this->M_his->input_any($log_data, 'his_mutasi');

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diubah');
            }

            redirect(site_url("page_his/karyawan_mutasi"));
        } else {
            echo "Data karyawan tidak ditemukan.";
        }
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

	function do_out_karyawan_temp() {
		$keterangan       			= $_POST['keterangan'];
		$nik_training       		= $_POST['nik_training'];
		

		$data = array(
			'keterangan' 	=> $keterangan,
		);

		$where = array(
			'nik_training' 	=> $nik_training
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

	function angkat_karyawan(){
		$keterangan       			= $_POST['keterangan'];
		$nik_training       		= $_POST['nik_training'];
		$new_nik					= $_POST['new_nik'];
		
		$existingNik = $this->M_his->get_by_condition('his_karyawan', array('nik' => $new_nik));
			if ($existingNik) {
				$this->session->set_flashdata('error', 'NIK telah digunakan. Silakan pilih NIK yang lain.');
				redirect(site_url("page_his/karyawan"));
			}

		$data = array(
			'keterangan' 	=> $keterangan,
			'nik' 			=> $new_nik
		);

		$where = array(
			'nik_training' 		=> $nik_training
		);

		
		//update status keluarga proporsional pada tbl_st_kel
		$this->M_his->update_any($where, $data, 'his_karyawan');

		if($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data berhasil disimpan');</script>";
			$this->session->set_flashdata('success', 'Karyawan berhasil diangkat');
		}
			redirect(site_url("page_his/karyawan"));
	}

	function check_nik_availability() {
		$response = array();
		$newNik = $_POST['new_nik'];
	
		// Lakukan validasi unik untuk memeriksa apakah "nik" sudah ada di dalam database
		$existingNik = $this->M_his->get_by_condition('his_karyawan', array('nik' => $newNik));
		$response['available'] = !$existingNik;
	
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	

}