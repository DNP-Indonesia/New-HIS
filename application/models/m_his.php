<?php

class M_his extends CI_Model{


    // QUERY GLOBAL
    function update_any($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function input_any($data, $table){
        $this->db->insert($table, $data);
    }

    function data_any_where($where, $tbl){
        return $this->db
            ->where($where)
            ->get($tbl);
    }

    function hapus_any($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    // END QUERY GLOBAL




    function data_user(){
        return $this->db->from('tbl_user')
        ->join('his_section', 'his_section.id_section=tbl_user.id_section')
        ->get()
        ->result();
    }

    function data_role_fromUser(){
        return $this->db->from('tbl_user')
        ->group_by('role')
        ->get()
        ->result();
    }

    

	function data_karyawan(){
        return $this->db->from('his_karyawan')
        	->join('his_section', 'his_section.id_section=his_karyawan.id_section')
        	->join('his_departemen', 'his_departemen.id_dep=his_section.id_dep')
        	->join('his_divisi', 'his_divisi.id_divisi=his_departemen.id_divisi')
        	->join('his_jabatan', 'his_jabatan.id_jabatan=his_karyawan.id_jabatan')
        	->join('his_shift', 'his_shift.id_shift=his_karyawan.id_shift', 'left')
            ->join('his_golongan', 'his_golongan.id_golongan=his_karyawan.id_golongan')
            ->where('his_karyawan.keterangan', 'Aktif')
            ->get()
            ->result();
    }

    function data_karyawan_byspysi($spysiid){
        return $this->db->from('his_karyawan')
            ->join('his_section', 'his_section.id_section=his_karyawan.id_section')
            ->where('his_karyawan.spysiid', $spysiid)
            ->get()
            ->result();
    }

    function data_karyawan_out(){
        return $this->db->from('his_karyawan')
            ->join('his_section', 'his_section.id_section=his_karyawan.id_section')
            ->join('his_departemen', 'his_departemen.id_dep=his_section.id_dep')
            ->join('his_divisi', 'his_divisi.id_divisi=his_departemen.id_divisi')
            ->join('his_jabatan', 'his_jabatan.id_jabatan=his_karyawan.id_jabatan')
            ->join('his_shift', 'his_shift.id_shift=his_karyawan.id_shift', 'left')
            ->join('his_golongan', 'his_golongan.id_golongan=his_karyawan.id_golongan')
            ->where('his_karyawan.keterangan', 'Pensiun')
            ->or_where('his_karyawan.keterangan', 'Mengundurkan Diri')
            ->or_where('his_karyawan.keterangan', 'PHK')
            ->or_where('his_karyawan.keterangan', 'Meninggal Dunia')
            ->get()
            ->result();
    }


    function data_karyawan_temp(){
        return $this->db->from('his_karyawan')
            ->join('his_section', 'his_section.id_section=his_karyawan.id_section')
            ->join('his_departemen', 'his_departemen.id_dep=his_section.id_dep')
            ->join('his_divisi', 'his_divisi.id_divisi=his_departemen.id_divisi')
            ->join('his_jabatan', 'his_jabatan.id_jabatan=his_karyawan.id_jabatan')
            ->join('his_shift', 'his_shift.id_shift=his_karyawan.id_shift', 'left')
            ->join('his_golongan', 'his_golongan.id_golongan=his_karyawan.id_golongan')
            ->where('his_karyawan.keterangan', 'Training')
            ->or_where('his_karyawan.keterangan', 'Percobaan')
            ->get()
            ->result();
    }

    function data_karyawan_out_temp(){
        return $this->db->from('his_karyawan')
            ->join('his_section', 'his_section.id_section=his_karyawan.id_section')
            ->join('his_departemen', 'his_departemen.id_dep=his_section.id_dep')
            ->join('his_divisi', 'his_divisi.id_divisi=his_departemen.id_divisi')
            ->join('his_jabatan', 'his_jabatan.id_jabatan=his_karyawan.id_jabatan')
            ->join('his_shift', 'his_shift.id_shift=his_karyawan.id_shift', 'left')
            ->join('his_golongan', 'his_golongan.id_golongan=his_karyawan.id_golongan')
            ->where('his_karyawan.keterangan', 'Pasca Training')
            ->or_where('his_karyawan.keterangan', 'Pasca Percobaan')
            ->get()
            ->result();
    }

    function data_divisi(){
        return $this->db->from('his_divisi')
            ->get()
            ->result();
    }

    function data_dep(){
        return $this->db->from('his_departemen')
        	->join('his_divisi', 'his_divisi.id_divisi=his_departemen.id_divisi')
            ->get()
            ->result();
    }

    function data_section(){
        return $this->db->from('his_section')
        	->join('his_departemen', 'his_departemen.id_dep=his_section.id_dep')
            ->get()
            ->result();
    }

    function data_section_byId_dep($id_dep){
        return $this->db->from('his_section')
        	->where('his_section.id_dep', $id_dep)
            ->get()
            ->result();
    }

     function data_departemen_byId_div($id_div){
        return $this->db->from('his_departemen')
        	->where('his_departemen.id_divisi', $id_div)
            ->get()
            ->result();
    }

    function data_shift(){
        return $this->db->from('his_shift')
            ->get()
            ->result();
    }

    function data_jabatan(){
        return $this->db->from('his_jabatan')
            ->get()
            ->result();
    }

    function data_golongan(){
        return $this->db->from('his_golongan')
            ->get()
            ->result();
    }

    

}