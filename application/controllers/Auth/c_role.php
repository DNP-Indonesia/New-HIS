<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_role extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Master/m_karyawan");
        $this->load->model("Sundries/Barang/m_jenis");
        $this->load->model("Sundries/Barang/m_barang");
        $this->load->model("Sundries/Barang/m_kategori");
        $this->load->model("Sundries/Transaksi/m_persetujuan");
        $this->load->model("Sundries/Transaksi/m_detail");
        $this->load->model("Sundries/Transaksi/m_detail_sementara");
        $this->load->model("Sundries/Transaksi/m_estimasi");
        $this->load->model("Sundries/Transaksi/m_konsumsi");
        $this->load->library('Pdf');
    }

    public function dashboard()
    {
        $data['diproses'] = $this->m_persetujuan->finddiproses();
        $data['foraprove'] = $this->m_persetujuan->findforaprove();
        $data['estimasi'] = $this->m_estimasi->findforaprove();
        $data['consum'] = $this->m_konsumsi->findforaprove();
        $data['foradmingudang'] = $this->m_persetujuan->findforadmingudang();
        $data['forkplgudang'] = $this->m_persetujuan->findforkplgudang();
        $this->load->view('Sundries/Template/dashboard', $data);
    }

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
