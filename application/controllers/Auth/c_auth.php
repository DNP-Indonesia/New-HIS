<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_auth extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Auth/m_auth');
    $this->load->helper('url');
  }

  public function index()
  { // Login page
    if ($this->session->userdata('authenticated_teamdev')) // Jika user sudah login (Session authenticated ditemukan)
      redirect('dashboard'); // Redirect ke page home
    // function render_login tersebut dari file core/MY_Controller.php
    $this->render_login('auth/v_login'); // Load view login.php
  }

  public function home()
  {
    $menu = 'event';
    $data[''] = "";

    if ($this->session->userdata('role') == 'sdr_Admin Bagian') {
      redirect(('Auth/c_role/dashboard'));
    } elseif ($this->session->userdata('role') == 'sdr_Admin Gudang') {
      redirect(('Sundries/Auth/c_role/dashboard'));
    } elseif ($this->session->userdata('role') == 'sdr_Kepala Bagian') {
      redirect(('Sundries/Auth/c_role/dashboard'));
    } elseif ($this->session->userdata('role') == 'sdr_Kepala Gudang') {
      redirect(('Sundries/Auth/c_role/dashboard'));
    } else {
      $this->reder_backend('layout/dashboard', $menu, $data);
    }
  }

  public function login()
  { // Fungsi login
    $username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
    $password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5
    $user = $this->m_auth->get($username); // Panggil fungsi get yang ada di UserModel.php

    if (empty($user)) { // Jika hasilnya kosong / user tidak ditemukan
      $this->session->set_flashdata('error', 'Username tidak ditemukan'); // Buat session flashdata
      redirect(site_url('auth')); // Redirect ke halaman login

    } else {

      if ($password == $user->password) { // Jika password yang diinput sama dengan password yang didatabase
        $session = array(
          'authenticated_teamdev' => true, // Buat session authenticated dengan value true
          'username' => $user->username,  // Buat session username
          'id_user' => $user->id_user,  // Buat session username
          'nama' => $user->nama, // Buat session nama
          'role' => $user->role, // Buat session role
          'section' => $user->id_section
        );
        $this->session->set_userdata($session); // Buat session sesuai $session
        redirect('dashboard'); // Redirect ke halaman home
      } else {
        $this->session->set_flashdata('error', 'Password salah'); // Buat session flashdata
        redirect(site_url('auth')); // Redirect ke halaman login
      }
    }
  }

  public function logout()
  { // Fungsi logout

    $this->session->set_userdata('favourite_website', 'http://tutsplus.com');

    $this->session->sess_destroy(); // Hapus semua session
    redirect('auth'); // Redirect ke halaman login
  }

  public function changePassword()
  {
    // Pastikan hanya pengguna yang sudah masuk yang dapat mengakses halaman ini
    if (!$this->session->userdata('authenticated_teamdev')) {
      redirect('auth'); // Redirect ke halaman login jika belum masuk
    }
    // Pastikan hanya pengguna yang sudah masuk yang dapat mengakses halaman ini
    if (!$this->session->userdata('authenticated_teamdev')) {
      redirect('auth'); // Redirect ke halaman login jika belum masuk
    }

    // Atur data yang diperlukan
    $data['title'] = 'Change Password';

    // Tentukan menu yang aktif (jika diperlukan)
    $menu = 'change-password';

    // Panggil render_backend() untuk menampilkan view
    $this->render_backend('auth/v_change_password', $menu, $data);
  }

  public function updatePassword()
  {
    // Pastikan hanya pengguna yang sudah masuk yang dapat mengakses halaman ini
    if (!$this->session->userdata('authenticated_teamdev')) {
      redirect('auth'); // Redirect ke halaman login jika belum masuk
    }

    // Ambil data dari formulir
    $currentPassword = md5($this->input->post('current_password'));
    $newPassword = md5($this->input->post('new_password'));
    $confirmPassword = md5($this->input->post('confirm_password'));

    // Periksa kecocokan password saat ini dengan yang ada di database
    $username = $this->session->userdata('username');
    $user = $this->m_auth->get($username);

    // Tambahkan pengecekan apakah password baru dan konfirmasi password sama dengan password saat ini
    if ($currentPassword == $user->password) {
      // Password saat ini sesuai, periksa kecocokan password baru dengan konfirmasi
      if ($newPassword == $confirmPassword) {
        // Password baru cocok dengan konfirmasi, simpan password baru ke database
        $this->m_auth->updatePassword($username, $newPassword);
        $this->session->set_flashdata('success', 'Password berhasil diubah.');
      } else {
        $this->session->set_flashdata('error', 'Password baru dan konfirmasi password tidak cocok.');
      }
    } else {
      $this->session->set_flashdata('error', 'Password saat ini salah.');
    }

    // Atur data yang diperlukan
    $data['title'] = 'Change Password';

    // Tentukan menu yang aktif (jika diperlukan)
    $menu = 'change-password';

    // Panggil render_backend() untuk menampilkan view dengan data yang sudah disiapkan
    $this->render_backend('auth/v_change_password', $menu, $data);
  }
}
