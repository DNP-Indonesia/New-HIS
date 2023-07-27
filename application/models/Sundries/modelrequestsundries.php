<?php

class modelrequestsundries extends CI_Model{
	protected $table = "sdr_request_sundries";
    protected $primaryKey = "id_request_sundries";
    protected $tabletolak = "sdr_tolak_sundries";
    protected $table2 = "sdr_request_sundries_detail";

    public function findrequest(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_request_sundries.id_user', $this->session->userdata('id_user'))
            ->where('status','Request')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function finddisetujui1(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_request_sundries.id_user', $this->session->userdata('id_user'))
            ->where('status','Disetujui1')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function finddisetujui2(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_request_sundries.id_user', $this->session->userdata('id_user'))
            ->where('status','Disetujui2')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function findditolak(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->join('sdr_tolak_sundries','sdr_tolak_sundries.faktur=sdr_request_sundries.faktur')
            ->where('sdr_request_sundries.id_user', $this->session->userdata('id_user'))
            ->where('status','Ditolak')
            ->order_by('id_request_sundries', 'DESC')
            ->group_by('sdr_tolak_sundries.faktur')
            ->get()
            ->result();
    }

    public function finddiproses(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_request_sundries.id_user', $this->session->userdata('id_user'))
            ->where('status','Diproses')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function findselesai(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_request_sundries.id_user', $this->session->userdata('id_user'))
            ->where('status','Selesai')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }
    public function byrequest(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->order_by('id_request_sundries', 'DESC')
            ->where('status','Request')
            ->get()
            ->result();
    }

    public function bydisetujui2(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->order_by('id_request_sundries', 'DESC')
            ->where('status','Disetujui2')
            ->get()
            ->result();
    }

    public function byditolak(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->order_by('id_request_sundries', 'DESC')
            ->where('status','Ditolak')
            ->get()
            ->result();
    }

    public function bydiproses(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->order_by('id_request_sundries', 'DESC')
            ->where('status','Diproses')
            ->get()
            ->result();
    }

    public function byselesai(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->order_by('id_request_sundries', 'DESC')
            ->where('status','Selesai')
            ->get()
            ->result();
    }

    public function findforadmingudang(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('status','Disetujui2')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function findforkplgudang(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('status','Disetujui1')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function findforaprove(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('status','Request')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function findforkepalabagianbyrequest(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->where('status','Request')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function findforkepalabagianbydisetujui(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->where('status','Disetujui')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function findforkepalabagianbyditolak(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->where('status','Ditolak')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function findforkepalabagianbydiproses(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->where('status','Diproses')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function findforkepalabagianbyselesai(){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->where('status','Selesai')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function findbyidforpdf($id){
        $query = $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_request_sundries.faktur', $id)
            ->get();

        return $query->result_array();
    }

    public function findbyid($id){
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_request_sundries.faktur', $id)
            ->get()
            ->result();
    }

    public function barangsundries(){
        return $this->db->from('sdr_barang')
        ->join('sdr_jenis','sdr_jenis.id_jenis=sdr_barang.id_jenis')
        ->join('sdr_kategori','sdr_kategori.id_kategori=sdr_jenis.id_kategori')
        ->where('sdr_jenis.id_kategori','1')
        ->get()
        ->result();
    }

    public function findpenolakan($id){
        return $this->db->from('sdr_tolak_sundries')
            ->join('sdr_request_sundries','sdr_tolak_sundries.faktur=sdr_request_sundries.faktur')
            ->join('tbl_user','tbl_user.id_user=sdr_tolak_sundries.id_user')
            //->join('','sdr_tolak_sundries.faktur=sdr_request_sundries.faktur')
            ->where('sdr_tolak_sundries.faktur', $id)
            ->order_by('sdr_tolak_sundries.id_tolak', 'DESC')
            ->get()
            ->result();
    }

    public function save($data, $iduser, $faktur, $stkeranjang, $barangready){
        $simpan = $this->db->insert('sdr_request_sundries',$data);
        if ($simpan) {
            $carikeranjang = $this->db->get_where('sdr_request_sundries_keranjang', array('id_user'=>$iduser));
            foreach ($carikeranjang->result() as $tempel){
                $detail = array(
                    'faktur'=>$faktur,
                    'id_barang'=>$tempel->id_barang,
                    'jumlah'=>$tempel->jumlah,
                    'keterangan'=>$tempel->keterangan,
                    'statuskeranjang'=>$stkeranjang,
                    'barangready'=>$barangready
                    );
                $this->db->insert('sdr_request_sundries_detail', $detail);   
            }
            $this->db->delete('sdr_request_sundries_keranjang', array('id_user'=>$iduser));
        }
    }

    public function deleterequest($faktur){
        $hapus = $this->db->delete('sdr_request_sundries', array('faktur'=>$faktur));
        if ($hapus) {
            $hapusdetail = $this->db->delete('sdr_request_sundries_detail', array('faktur'=>$faktur));
        }
    }

    public function cekbarangkeranjang($idbarang, $iduser){
        return $this->db->get_where('sdr_request_sundries_keranjang', array('id_barang'=>$idbarang, 'id_user'=>$iduser));
    }

    public function cekbarangkeranjang2($iduser){
        return $this->db->get_where('sdr_request_sundries_keranjang', array('id_user'=>$iduser));
    }

    public function selectkeranjang($id_user){
         return $this->db->from('sdr_request_sundries_keranjang')
        ->join('sdr_barang','sdr_barang.id_barang=sdr_request_sundries_keranjang.id_barang')
        ->where('sdr_request_sundries_keranjang.id_user',$id_user)
        ->get()
        ->result();
    }

    public function deletekeranjang($id_barang, $id_user){
        $hapus = $this->db->delete('sdr_request_sundries_keranjang', array('id_barang'=>$id_barang, 'id_user'=> $id_user));
        if ($hapus) {
            return 1;
        }
    }
    

    public function update($where,$data){
        $this->db->where($where);
        $this->db->update($this->table,$data);
    }

    public function ulangrequest($data,$where){
        $this->db->where($where);
        $this->db->update($this->table,$data);
    }

    public function prosesrequest($data,$where){
        $this->db->where($where);
        $this->db->update($this->table,$data);
    }

    public function finishrequest($data,$where){
        $this->db->where($where);
        $this->db->update($this->table,$data);
    }

    public function readyrequest($data,$where){
        $this->db->where($where);
        $this->db->update($this->table,$data);
    }

    public function savetolak($data){
        $this->db->insert($this->tabletolak, $data);
    }

    public function ubahstkeranjang($where,$data){
        $this->db->where($where);
        $this->db->update($this->table2,$data);
    }

    public function generatefaktur(){

        $this->db->select('RIGHT(faktur,4) as faktur', false);
        $this->db->order_by("faktur", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('sdr_request_sundries');

        
        if($query->num_rows() <> 0)
        {
            $data       = $query->row(); 
            $faktur  = intval($data->faktur) + 1; 
        }else{
            $faktur  = 1; 
        }

        $lastKode = str_pad($faktur, 4, "0", STR_PAD_LEFT);
        $tahun    = date("y");
        $bulan  = date("m");
        $rs      = "RS";

        $newfaktur  = $rs."".$tahun."".$bulan.".".$lastKode;

        return $newfaktur; 
    }

    

    /*
    public function findbarangbyid($id){
        return $this->db->from('sdr_barang')
        //->join('sdr_jenis','sdr_jenis.id_jenis=sdr_barang.id_jenis')
        //->join('sdr_kategori','sdr_kategori.id_kategori=sdr_jenis.id_kategori')
        ->where('id_barang',$id)
        ->get()
        ->result();
    }

    public function save($data, $iduser, $faktur){
        $simpan = $this->db->insert('sdr_request_sundries',$data);
        if ($simpan) {
            $carikeranjang = $this->db->get_where('sdr_request_sundries_keranjang', array('id_user'=>$iduser));
            foreach ($carikeranjang->result() as $tempel){
                $detail = array(
                    'faktur'=>$faktur,
                    'id_barang'=>$tempel->id_barang,
                    'jumlah'=>$tempel->jumlah
                );
                $cekstok = $this->db->get_where('sdr_barang', array('id_barang'=>$tempel->id_barang));
                foreach($cekstok->result() as $cs){
                    if ($cs->stok < $tempel->jumlah) {
                        $this->db->delete('sdr_request_sundries', array('faktur'=>$faktur));   
                    }else{
                        $this->db->insert('sdr_request_sundries_detail', $detail);   
                    }       
                }
            }
            $this->db->delete('sdr_request_sundries_keranjang', array('id_user'=>$iduser));
        }
    }
    */
}