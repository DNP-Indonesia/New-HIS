<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends MY_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('M_userlogin');
  }

  public function index(){
    if($this->session->userdata('authenticated_teamdev')) // Jika user sudah login (Session authenticated ditemukan)
      redirect('page_his/home'); // Redirect ke page home
    // function render_login tersebut dari file core/MY_Controller.php
    $this->render_login('v_login'); // Load view login.php
  }

  public function login(){
    $username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
    $password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5
    $user = $this->M_userlogin->get($username); // Panggil fungsi get yang ada di UserModel.php

    if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
      $this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata
      redirect('auth'); // Redirect ke halaman login
    
    }else{

      if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
        $session = array(
          'authenticated_teamdev'=>true, // Buat session authenticated dengan value true
          'username'=>$user->username,  // Buat session username
          'id_user'=>$user->id_user,  // Buat session username
          'nama'=>$user->nama, // Buat session nama
          'role'=>$user->role, // Buat session role
          'section'=>$user->id_section
        );
        $this->session->set_userdata($session); // Buat session sesuai $session
        redirect('page_his/home'); // Redirect ke halaman home
      }else{
        $this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
        redirect('auth'); // Redirect ke halaman login
      }

    }
  }

  public function logout(){

    $this->session->set_userdata('favourite_website', 'http://tutsplus.com');
    
    $this->session->sess_destroy(); // Hapus semua session
    redirect('auth'); // Redirect ke halaman login
  }
}