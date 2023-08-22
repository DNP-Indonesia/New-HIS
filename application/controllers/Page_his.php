<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Page_his extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_his');
  }

  public function home()
  {
    $menu = 'hom';
    $data[''] = "";

    // $data['sidebar'] = $this->load->view('side_medical/admin_medical');
    if (
      $this->session->userdata('role') == 'sdr_Admin Bagian'
      or $this->session->userdata('role') == 'sdr_Kepala Bagian'
      or $this->session->userdata('role') == 'sdr_Admin Gudang'
      or $this->session->userdata('role') == 'sdr_Kepala Gudang'
    ) {
      redirect('Sundries/requestsundriescontroller/dashboard');
    } else {
      $this->render_backend('layout/v_dashboard', $menu, $data);
    }
  }

  // tampil role super user
  public function user()
  {
    $data['user'] = $this->M_his->data_user();

    $menu = 'user';

    if ($this->session->userdata('role') == 'super_user') {
      $this->render_backend('application/views/v_user.php', $menu, $data);
    } else {
      $this->render_backend('v_error', $menu, $data);
    }
  }

  // 
  public function karyawan()
  {
    $menu = $this->uri->segment(2);

    $data['karyawan'] = $this->M_his->data_karyawan();

    if ($this->session->userdata('role') == 'super_user') {
      $this->render_backend('personalData/v_karyawan.php', $menu, $data);
    } else {
      $this->render_backend('v_error', $menu, $data);
    }
  }

  public function karyawan_out()
  {
    $menu = $this->uri->segment(2);

    $data['karyawan_out'] = $this->M_his->data_karyawan_out();

    $this->render_backend('personalData/v_karyawan_keluar.php', $menu, $data);
  }

  public function karyawan_temp()
  {
    $menu = $this->uri->segment(2);

    $data['karyawan'] = $this->M_his->data_karyawan_temp();

    $this->render_backend('personalData/v_pelatihan_coba.php', $menu, $data);
  }

  public function karyawan_out_temp()
  {
    $menu = $this->uri->segment(2);

    $data['karyawan'] = $this->M_his->data_karyawan_out_temp();

    $this->render_backend('personalData/v_pelatihan_keluar', $menu, $data);
  }

  public function karyawan_mutasi()
  {
    $menu = $this->uri->segment(2);


    $data['karyawan'] = $this->M_his->data_karyawan_mutasi();

    $this->render_backend('personalData/v_karyawan_mutasi', $menu, $data);
  }

  public function history_karyawan($nik)
  {
    $menu = $this->uri->segment(2);

    $data['history'] = $this->M_his->history_karyawan($nik);
    $data['karyawan'] = $this->M_his->data_karyawan_bynik($nik);

    $this->render_backend('personalData/v_detail_karyawan', $menu,$data);
  }

  function divisi()
  {
    $menu = $this->uri->segment(2);
    $data['div'] = $this->M_his->data_divisi();

    $this->render_backend('personalData/v_divisi', $menu, $data);
  }

  function departemen()
  {
    $menu = $this->uri->segment(2);
    $data['dep'] = $this->M_his->data_dep();
    // $data['section'] = $this->M_his->data_section_byId();

    $this->render_backend('personalData/v_departemen', $menu, $data);
  }

  function section()
  {
    $menu = $this->uri->segment(2);
    $data['section'] = $this->M_his->data_section();

    $this->render_backend('personalData/v_section', $menu, $data);
  }

  function shift()
  {
    $menu = $this->uri->segment(2);
    $data['shift'] = $this->M_his->data_shift();

    $this->render_backend('personalData/v_shift', $menu, $data);
  }

  function jabatan()
  {
    $menu = $this->uri->segment(2);
    $data['jabatan'] = $this->M_his->data_jabatan();

    $this->render_backend('personalData/v_jabatan', $menu, $data);
  }

  function golongan()
  {
    $menu = $this->uri->segment(2);
    $data['golongan'] = $this->M_his->data_golongan();

    $this->render_backend('personalData/v_golongan', $menu, $data);
  }
}
