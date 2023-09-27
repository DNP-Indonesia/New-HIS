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
        return $this->db->select('role')
        ->from('tbl_user')
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

    function data_karyawan_mutasi() {
        return $this->db->from('his_mutasi')
        ->join('his_karyawan', 'his_karyawan.nik = his_mutasi.nik')
        ->join('his_section as section_sebelum', 'section_sebelum.id_section=his_mutasi.id_section_sebelum')
        ->join('his_section as section_sesudah', 'section_sesudah.id_section=his_mutasi.id_section_sesudah')
        ->join('his_departemen as dep_sebelum', 'dep_sebelum.id_dep=section_sebelum.id_dep')
        ->join('his_departemen as dep_sesudah', 'dep_sesudah.id_dep=section_sesudah.id_dep')
        ->join('his_divisi as divisi_sebelum', 'divisi_sebelum.id_divisi=dep_sebelum.id_divisi')
        ->join('his_divisi as divisi_sesudah', 'divisi_sesudah.id_divisi=dep_sesudah.id_divisi')
        ->join('his_jabatan as jabatan_sebelum', 'jabatan_sebelum.id_jabatan=his_mutasi.id_jabatan_sebelum')
        ->join('his_jabatan as jabatan_sesudah', 'jabatan_sesudah.id_jabatan=his_mutasi.id_jabatan_sesudah')
        ->join('his_shift as shift_sebelum', 'shift_sebelum.id_shift=his_mutasi.id_shift_sebelum', 'left') 
        ->join('his_shift as shift_sesudah', 'shift_sesudah.id_shift=his_mutasi.id_shift_sesudah', 'left')
        ->join('his_golongan as golongan_sebelum', 'golongan_sebelum.id_golongan=his_mutasi.id_golongan_sebelum')
        ->join('his_golongan as golongan_sesudah', 'golongan_sesudah.id_golongan=his_mutasi.id_golongan_sesudah')
        ->select('his_mutasi.*,
        his_karyawan.nama as nama_karyawan,
        section_sebelum.nama_section as nama_section_sebelum,
        section_sesudah.nama_section as nama_section_sesudah,
        dep_sebelum.nama_dep as nama_departemen_sebelum,
        dep_sesudah.nama_dep as nama_departemen_sesudah,
        divisi_sebelum.nama_divisi as nama_divisi_sebelum,
        divisi_sesudah.nama_divisi as nama_divisi_sesudah,
        jabatan_sebelum.nama_jabatan as nama_jabatan_sebelum,
        jabatan_sesudah.nama_jabatan as nama_jabatan_sesudah,
        shift_sebelum.nama_shift as nama_shift_sebelum,
        shift_sesudah.nama_shift as nama_shift_sesudah,
        golongan_sebelum.nama_golongan as nama_golongan_sebelum,
        golongan_sesudah.nama_golongan as nama_golongan_sesudah')
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

    function data_karyawan_bynik($nik){
        return $this->db->from('his_karyawan')
        ->join('his_section', 'his_section.id_section=his_karyawan.id_section')
        ->join('his_departemen', 'his_departemen.id_dep=his_section.id_dep')
        ->join('his_divisi', 'his_divisi.id_divisi=his_departemen.id_divisi')
        ->join('his_jabatan', 'his_jabatan.id_jabatan=his_karyawan.id_jabatan')
        ->join('his_shift', 'his_shift.id_shift=his_karyawan.id_shift', 'left')
        ->join('his_golongan', 'his_golongan.id_golongan=his_karyawan.id_golongan')
       
            ->where('his_karyawan.nik', $nik)
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

    function history_karyawan($nik){
        return $this->db->from('his_mutasi')
        ->join('his_karyawan', 'his_karyawan.nik = his_mutasi.nik')
        ->join('his_section as section_sebelum', 'section_sebelum.id_section=his_mutasi.id_section_sebelum')
        ->join('his_section as section_sesudah', 'section_sesudah.id_section=his_mutasi.id_section_sesudah')
        ->join('his_departemen as dep_sebelum', 'dep_sebelum.id_dep=section_sebelum.id_dep')
        ->join('his_departemen as dep_sesudah', 'dep_sesudah.id_dep=section_sesudah.id_dep')
        ->join('his_divisi as divisi_sebelum', 'divisi_sebelum.id_divisi=dep_sebelum.id_divisi')
        ->join('his_divisi as divisi_sesudah', 'divisi_sesudah.id_divisi=dep_sesudah.id_divisi')
        ->join('his_jabatan as jabatan_sebelum', 'jabatan_sebelum.id_jabatan=his_mutasi.id_jabatan_sebelum')
        ->join('his_jabatan as jabatan_sesudah', 'jabatan_sesudah.id_jabatan=his_mutasi.id_jabatan_sesudah')
        ->join('his_shift as shift_sebelum', 'shift_sebelum.id_shift=his_mutasi.id_shift_sebelum', 'left') 
        ->join('his_shift as shift_sesudah', 'shift_sesudah.id_shift=his_mutasi.id_shift_sesudah', 'left')
        ->join('his_golongan as golongan_sebelum', 'golongan_sebelum.id_golongan=his_mutasi.id_golongan_sebelum')
        ->join('his_golongan as golongan_sesudah', 'golongan_sesudah.id_golongan=his_mutasi.id_golongan_sesudah')
        ->select('his_mutasi.*,
        his_karyawan.nama as nama_karyawan,
        section_sebelum.nama_section as nama_section_sebelum,
        section_sesudah.nama_section as nama_section_sesudah,
        dep_sebelum.nama_dep as nama_departemen_sebelum,
        dep_sesudah.nama_dep as nama_departemen_sesudah,
        divisi_sebelum.nama_divisi as nama_divisi_sebelum,
        divisi_sesudah.nama_divisi as nama_divisi_sesudah,
        jabatan_sebelum.nama_jabatan as nama_jabatan_sebelum,
        jabatan_sesudah.nama_jabatan as nama_jabatan_sesudah,
        shift_sebelum.nama_shift as nama_shift_sebelum,
        shift_sesudah.nama_shift as nama_shift_sesudah,
        golongan_sebelum.nama_golongan as nama_golongan_sebelum,
        golongan_sesudah.nama_golongan as nama_golongan_sesudah')
            ->where('his_karyawan.nik', $nik)
            ->get()
            ->result();
        
    }

    function getKaryawanAkanPensiun() {
        // Ambil tahun sekarang
        $tanggalSekarang = date('Y-m-d');
    
        // Hitung tahun pensiun
        $tanggalPensiun = date('Y-m-d', strtotime('+1.5 months', strtotime($tanggalSekarang)));

    
        $this->db->select('hk.nama, hk.nik, hk.tgl_lahir, hp.bunga, hp.kue, hp.piagam'); // Pilih semua kolom yang Anda butuhkan
        $this->db->from('his_karyawan hk');
        $this->db->join('his_pensiun hp', 'hk.spysiid = hp.spysiid', 'LEFT'); // LEFT JOIN berdasarkan spysiid
        $this->db->where('DATE_ADD(hk.tgl_lahir, INTERVAL 55 YEAR) <=', $tanggalPensiun);
        $this->db->where('hk.keterangan', 'Aktif'); // Menambahkan konstrain untuk keterangan = Aktif

        // Tambahkan kondisi untuk mengecek jika spysiid belum ada di his_pensiun
        $this->db->group_start();
        $this->db->or_where('hp.spysiid IS NULL');
        $this->db->or_where('hp.spysiid', '');
        $this->db->or_where('hp.bunga !=', 'siap');
        $this->db->or_where('hp.kue !=', 'siap');
        $this->db->or_where('hp.piagam !=', 'siap');
        $this->db->group_end();

        $query = $this->db->get();
        $results = $query->result();
    
        // Loop melalui hasil untuk mengatur status 'belum siap' jika diperlukan
        foreach ($results as $result) {
            if ($result->bunga != 'siap' || $result->kue != 'siap' || $result->piagam != 'siap') {
                $result->status = 'belum siap';
            } else {
                $result->status = 'siap';
            }
        }
    
        return $results;
    }

    function getPensiun($spysiid){
        return $this->db->from('his_pensiun')
        ->where('his_pensiun.spysiid', $spysiid)
        ->get()
        ->result();
    }

    function getStatusPensiun(){
        $this->db->select('hp.*, hk.nama,hk.nik,hk.tgl_lahir'); // Pilih semua kolom dari his_pensiun dan kolom nama dari his_karyawan
        $this->db->from('his_pensiun hp');
        $this->db->join('his_karyawan hk', 'hp.spysiid = hk.spysiid', 'INNER'); // INNER JOIN berdasarkan spysiid
    
        $query = $this->db->get();
        $results = $query->result();
    
        // Loop melalui hasil untuk mengatur status 'belum siap' jika diperlukan
        foreach ($results as $result) {
            if ($result->bunga != 'siap' || $result->kue != 'siap' || $result->piagam != 'siap') {
                $result->status = 'belum siap';
            } else {
                $result->status = 'siap';
            }
        }
    
        return $results;
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

    public function get_by_condition($table, $condition) {
        $this->db->where($condition);
        return $this->db->get($table)->row();
    }

    

}