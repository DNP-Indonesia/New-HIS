<?php

class modelestimasi extends CI_Model{
	protected $table = "sdr_estimasi";
    protected $primaryKey = "id_estimasi";

    public function find(){
        return $this->db->from('sdr_estimasi')
            ->join('tbl_user','tbl_user.id_user=sdr_estimasi.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_estimasi.id_user', $this->session->userdata('id_user'))
            ->order_by('id_estimasi', 'DESC')
            ->get()
            ->result();
    }

    public function findall(){
        return $this->db->from('sdr_estimasi')
            ->join('tbl_user','tbl_user.id_user=sdr_estimasi.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->order_by('id_estimasi', 'DESC')
            ->get()
            ->result();
    }

    public function findbarcons(){
        return $this->db->from('sdr_barang')
        ->join('sdr_jenis','sdr_jenis.id_jenis=sdr_barang.id_jenis')
        ->join('sdr_kategori','sdr_kategori.id_kategori=sdr_jenis.id_kategori')
        ->where('sdr_jenis.id_kategori','2')
        ->get()
        ->result();
    }

    public function findforkepalabagian(){
        return $this->db->from('sdr_estimasi')
            ->join('tbl_user','tbl_user.id_user=sdr_estimasi.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by('id_estimasi', 'DESC')
            ->get()
            ->result();
    }

    public function cekkeranjang($idbarang, $iduser){
        return $this->db->get_where('sdr_estimasi_keranjang', array('id_barang'=>$idbarang, 'id_user'=>$iduser));
    }

    public function savekeranjang($data){
        $this->db->insert('sdr_estimasi_keranjang',$data);
    }

    public function findkeranjang($id_user){
        $this->db->select('sdr_estimasi_keranjang. id_barang, barang, jumlah, id_user');
        $this->db->from('sdr_estimasi_keranjang');
        $this->db->join('sdr_barang','sdr_barang.id_barang=sdr_estimasi_keranjang.id_barang');
        $this->db->where('id_user',$id_user);
        return $this->db->get();
    }

    public function deletekeranjang($id_barang, $id_user){
        $hapus = $this->db->delete('sdr_estimasi_keranjang', array('id_barang'=>$id_barang, 'id_user'=> $id_user));
        if ($hapus) {
            return 1;
        }
    }

    public function save($data, $iduser, $faktur){
        $simpan = $this->db->insert('sdr_estimasi',$data);
        if ($simpan) {
            $carikeranjang = $this->db->get_where('sdr_estimasi_keranjang', array('id_user'=>$iduser));
            foreach ($carikeranjang->result() as $tempel){
                $detail = array(
                    'faktur'=>$faktur,
                    'id_barang'=>$tempel->id_barang,
                    'jumlah'=>$tempel->jumlah
                );
                $this->db->insert('sdr_estimasi_detail', $detail);   
            }
            $this->db->delete('sdr_estimasi_keranjang', array('id_user'=>$iduser));
        }
    }

    public function deleteestimasi($faktur){
        $hapus = $this->db->delete('sdr_estimasi', array('faktur'=>$faktur));
        if ($hapus) {
            $hapusdetail = $this->db->delete('sdr_estimasi_detail', array('faktur'=>$faktur));
            if ($hapusdetail) {
                redirect('Sundries/estimasicontroller/estimasipage');
            }
        }
    }

    public function findestimasibyid($id){
        return $this->db->from('sdr_estimasi')
            ->join('tbl_user','tbl_user.id_user=sdr_estimasi.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_estimasi.faktur', $id)
            ->get()
            ->result();
    }

    public function findestimasidetail($id){
        return $this->db->from('sdr_estimasi_detail')
            ->join('sdr_estimasi','sdr_estimasi.faktur=sdr_estimasi_detail.faktur')
            ->join('sdr_barang','sdr_barang.id_barang=sdr_estimasi_detail.id_barang')
            ->join('tbl_user','tbl_user.id_user=sdr_estimasi.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_estimasi_detail.faktur',$id)
            ->get()
            ->result();
    }

    public function findbyidforpdf($id){
        $query = $this->db->from('sdr_estimasi')
            ->join('tbl_user','tbl_user.id_user=sdr_estimasi.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_estimasi.faktur', $id)
            ->get();

        return $query->result_array();
    }

    public function finddetailforpdf($id){
        $query = $this->db->from('sdr_estimasi_detail')
            ->join('sdr_estimasi','sdr_estimasi.faktur=sdr_estimasi_detail.faktur')
            ->join('sdr_barang','sdr_barang.id_barang=sdr_estimasi_detail.id_barang')
            ->join('tbl_user','tbl_user.id_user=sdr_estimasi.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_estimasi_detail.faktur',$id)
            ->get();

        return $query->result_array();

    }

    public function findforaprove(){
        return $this->db->from('sdr_estimasi')
            ->join('tbl_user','tbl_user.id_user=sdr_estimasi.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('status','Diajukan')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by('id_estimasi', 'DESC')
            ->get()
            ->result();
    }

    public function update($where,$data){
        $this->db->where($where);
        $this->db->update($this->table,$data);
    }
}