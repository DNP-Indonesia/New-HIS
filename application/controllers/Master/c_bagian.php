<<<<<<< HEAD
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');


class c_bagian extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master/c_karyawan');
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

    function do_tbh_divisi()
    {
        $nama_divisi    = $_POST['nama_divisi'];
        $data   = array(
            '
            nama_divisi' => $nama_divisi
        );
        $this->m_karyawan->input_any($data, 'his_divisi');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Divisi baru berhasil ditambahkan');
        }
        redirect(site_url("page_his/divisi"));
    }

    function do_tbh_departemen()
    {
        $id_divisi          = $_POST['id_divisi'];
        $nama_departemen    = $_POST['nama_departemen'];
        $data = array(
            'nama_dep'  => $nama_departemen,
            'id_divisi' => $id_divisi
        );
        $this->m_karyawan->input_any($data, 'his_departemen');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Departemen baru berhasil ditambahkan');
        }
        redirect(site_url("page_his/departemen"));
    }

    function do_tbh_section()
    {
        $id_dep         = $_POST['id_dep'];
        $nama_section   = $_POST['nama_section'];
        $data = array(
            'nama_section'  => $nama_section,
            'id_dep'        => $id_dep
        );
        $this->m_karyawan->input_any($data, 'his_section');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Section baru berhasil ditambahkan');
        }
        redirect(site_url("page_his/section"));
    }

    function do_tbh_shift()
    {
        $nama_shift = $_POST['nama_shift'];
        $data = array(
            'nama_shift'    => $nama_shift,
        );
        $this->m_karyawan->input_any($data, 'his_shift');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Shift baru berhasil ditambahkan');
        }
        redirect(site_url("page_his/shift"));
    }

    function do_tbh_jabatan()
    {
        $nama_jabatan   = $_POST['nama_jabatan'];
        $data = array(
            'nama_jabatan'  => $nama_jabatan,
        );
        $this->m_karyawan->input_any($data, 'his_jabatan');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Jabatan baru berhasil ditambahkan');
        }
        redirect(site_url("page_his/jabatan"));
    }

    function do_tbh_golongan()
    {
        $nama_golongan  = $_POST['nama_golongan'];
        $data = array(
            'nama_golongan' => $nama_golongan,
        );
        $this->m_karyawan->input_any($data, 'his_golongan');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Golongan baru berhasil ditambahkan');
        }
        redirect(site_url("page_his/golongan"));
    }

    // EDIT ===================================================================================
    function do_edit_divisi()
    {
        $id_divisi      = $_POST['id_divisi'];
        $nama_divisi    = $_POST['nama_divisi'];
        $data = array(
            'nama_divisi'   => $nama_divisi,
        );
        $where = array(
            'id_divisi' => $id_divisi
        );
        //update status keluarga proporsional pada tbl_st_kel
        $this->m_karyawan->update_any($where, $data, 'his_divisi');

        if ($this->db->affected_rows() > 0) {
            // echo "<script>alert('Data berhasil disimpan');</script>";
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        }
        redirect(site_url("page_his/divisi"));
    }

    function do_edit_departemen()
    {
        $id_dep     = $_POST['id_dep'];
        $nama_dep   = $_POST['nama_dep'];
        $id_divisi  = $_POST['id_divisi'];
        $data = array(
            'id_divisi' => $id_divisi,
            'nama_dep'  => $nama_dep,
        );
        $where = array(
            'id_dep' => $id_dep
        );
        //update status keluarga proporsional pada tbl_st_kel
        $this->m_karyawan->update_any($where, $data, 'his_departemen');

        if ($this->db->affected_rows() > 0) {
            // echo "<script>alert('Data berhasil disimpan');</script>";
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        }
        redirect(site_url("page_his/departemen"));
    }

    function do_edit_section()
    {
        $id_dep         = $_POST['id_dep'];
        $id_section     = $_POST['id_section'];
        $nama_section   = $_POST['nama_section'];
        $data = array(
            'id_dep'        => $id_dep,
            'nama_section'  => $nama_section,
        );
        $where = array(
            'id_section' => $id_section
        );
        //update status keluarga proporsional pada tbl_st_kel
        $this->m_karyawan->update_any($where, $data, 'his_section');

        if ($this->db->affected_rows() > 0) {
            // echo "<script>alert('Data berhasil disimpan');</script>";
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        }
        redirect(site_url("page_his/section"));
    }

    function do_edit_shift()
    {
        $id_shift       = $_POST['id_shift'];
        $nama_shift     = $_POST['nama_shift'];
        $data = array(
            'nama_shift'    => $nama_shift,
        );
        $where = array(
            'id_shift' => $id_shift
        );
        //update status keluarga proporsional pada tbl_st_kel
        $this->m_karyawan->update_any($where, $data, 'his_shift');

        if ($this->db->affected_rows() > 0) {
            // echo "<script>alert('Data berhasil disimpan');</script>";
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        }
        redirect(site_url("page_his/shift"));
    }

    function do_edit_jabatan()
    {
        $id_jabatan     = $_POST['id_jabatan'];
        $nama_jabatan   = $_POST['nama_jabatan'];
        $data = array(
            'nama_jabatan'             => $nama_jabatan,
        );
        $where = array(
            'id_jabatan' => $id_jabatan
        );
        //update status keluarga proporsional pada tbl_st_kel
        $this->m_karyawan->update_any($where, $data, 'his_jabatan');

        if ($this->db->affected_rows() > 0) {
            // echo "<script>alert('Data berhasil disimpan');</script>";
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        }
        redirect(site_url("page_his/jabatan"));
    }


    function do_edit_golongan()
    {
        $id_golongan    = $_POST['id_golongan'];
        $nama_golongan  = $_POST['nama_golongan'];
        $data = array(
            'nama_golongan'             => $nama_golongan,
        );
        $where = array(
            'id_golongan' => $id_golongan
        );
        //update status keluarga proporsional pada tbl_st_kel
        $this->m_karyawan->update_any($where, $data, 'his_golongan');

        if ($this->db->affected_rows() > 0) {
            // echo "<script>alert('Data berhasil disimpan');</script>";
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        }
        redirect(site_url("page_his/golongan"));
    }
}
>>>>>>> rief-branch
