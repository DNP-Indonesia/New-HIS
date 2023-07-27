<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Page_his extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Master/m_karyawan');
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
      redirect('Sundries/Transaksi/c_permintaan/dashboard');
    } else {
      $this->render_backend('layout/v_dashboard', $menu, $data);
    }
  }

  // tampil role super user
  public function user()
  {
    $data['user'] = $this->m_karyawan->data_user();

    $menu = 'user';

    if ($this->session->userdata('role') == 'super_user') {
      $this->render_backend('v_user', $menu, $data);
    } else {
      $this->render_backend('v_error', $menu, $data);
    }
  }

  // 
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

  function divisi()
  {
    $menu = $this->uri->segment(2);
    $data['div'] = $this->m_karyawan->data_divisi();

    $this->render_backend('Sundries/Personal/v_divisi', $menu, $data);
  }

  function departemen()
  {
    $menu = $this->uri->segment(2);
    $data['dep'] = $this->m_karyawan->data_dep();
    // $data['section'] = $this->Master/m_karyawan->data_section_byId();

    $this->render_backend('Sundries/Personal/v_departemen', $menu, $data);
  }

  function section()
  {
    $menu = $this->uri->segment(2);
    $data['section'] = $this->m_karyawan->data_section();

    $this->render_backend('Sundries/Personal/v_section', $menu, $data);
  }

  function shift()
  {
    $menu = $this->uri->segment(2);
    $data['shift'] = $this->m_karyawan->data_shift();

    $this->render_backend('Sundries/Personal/v_shift', $menu, $data);
  }

  function jabatan()
  {
    $menu = $this->uri->segment(2);
    $data['jabatan'] = $this->m_karyawan->data_jabatan();

    $this->render_backend('Sundries/Personal/v_jabatan', $menu, $data);
  }

  function golongan()
  {
    $menu = $this->uri->segment(2);
    $data['golongan'] = $this->m_karyawan->data_golongan();

    $this->render_backend('Sundries/Personal/v_golongan', $menu, $data);
  }
}
