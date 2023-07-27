<?php

class modelconsumption extends CI_Model{
	protected $table = "sdr_consumption";
    protected $primaryKey = "id_consumption";

    public function find(){
        return $this->db->from('sdr_consumption')
            ->join('tbl_user','tbl_user.id_user=sdr_consumption.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumption.id_user', $this->session->userdata('id_user'))
            ->order_by('id_consumption', 'DESC')
            ->get()
            ->result();
    }

    public function findbarangbyfaktur($faktur){
        return $this->db->from('sdr_estimasi_detail')
            ->join('sdr_barang','sdr_estimasi_detail.id_barang=sdr_barang.id_barang')
            ->where('faktur',$faktur)
            ->get()
            ->result();
    }

    public function findestimasi(){
        return $this->db->from('sdr_estimasi')
            ->where('sdr_estimasi.id_user', $this->session->userdata('id_user'))
            ->order_by('id_estimasi', 'DESC')
            ->limit(1)
            ->get()
            ->result();
    }

    public function findall(){
        return $this->db->from('sdr_consumption')
            ->join('tbl_user','tbl_user.id_user=sdr_consumption.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->order_by('id_consumption', 'DESC')
            ->get()
            ->result();
    }

    public function findforkepalabagian(){
        return $this->db->from('sdr_consumption')
            ->join('tbl_user','tbl_user.id_user=sdr_consumption.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by('id_consumption', 'DESC')
            ->get()
            ->result();
    }

    public function cekkeranjang($idbarang, $iduser){
        return $this->db->get_where('sdr_consumption_keranjang', array('id_barang'=>$idbarang, 'id_user'=>$iduser));
    }

    public function savekeranjang($data){
        $this->db->insert('sdr_consumption_keranjang',$data);
    }

    public function findkeranjang($id_user){
        $this->db->select('sdr_consumption_keranjang. id_barang, barang, jumlah, id_user');
        $this->db->from('sdr_consumption_keranjang');
        $this->db->join('sdr_barang','sdr_barang.id_barang=sdr_consumption_keranjang.id_barang');
        $this->db->where('id_user',$id_user);
        return $this->db->get();
    }

    public function deletekeranjang($id_barang, $id_user){
        $hapus = $this->db->delete('sdr_consumption_keranjang', array('id_barang'=>$id_barang, 'id_user'=> $id_user));
        if ($hapus) {
            return 1;
        }
    }

    public function save($data, $iduser, $faktur, $fakest){
        $simpan = $this->db->insert('sdr_consumption',$data);
        if ($simpan) {
            $carikeranjang = $this->db->get_where('sdr_consumption_keranjang', array('id_user'=>$iduser));
            foreach ($carikeranjang->result() as $tempel){
                $detail = array(
                    'faktur'=>$faktur,
                    'id_barang'=>$tempel->id_barang,
                    'jumlah'=>$tempel->jumlah,
                    'fakest'=>$tempel->fakest
                    );

                $cekstok = $this->db->get_where('sdr_estimasi_detail', array('faktur'=>$fakest,'id_barang'=>$tempel->id_barang));
                foreach($cekstok->result() as $cs){
                    if ($cs->jumlah < $tempel->jumlah) {
                        $this->db->delete('sdr_consumption', array('faktur'=>$faktur));   
                    }else{
                        $this->db->insert('sdr_consumption_detail', $detail);    
                    }       
                }
            }
            $this->db->delete('sdr_consumption_keranjang', array('id_user'=>$iduser));
        }
    }

    public function deleteconsumption($faktur){
        $hapus = $this->db->delete('sdr_consumption', array('faktur'=>$faktur));
        if ($hapus) {
            $hapusdetail = $this->db->delete('sdr_consumption_detail', array('faktur'=>$faktur));
            if ($hapusdetail) {
                redirect('Sundries/consumptioncontroller/consumptionpage');
            }
        }
    }

    public function findconsumptionbyid($id){
        return $this->db->from('sdr_consumption')
            ->join('tbl_user','tbl_user.id_user=sdr_consumption.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumption.faktur', $id)
            ->get()
            ->result();
    }

    public function findconsumptiondetail($id){
        return $this->db->from('sdr_consumption_detail')
            ->join('sdr_consumption','sdr_consumption.faktur=sdr_consumption_detail.faktur')
            ->join('sdr_barang','sdr_barang.id_barang=sdr_consumption_detail.id_barang')
            ->join('tbl_user','tbl_user.id_user=sdr_consumption.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumption_detail.faktur',$id)
            ->get()
            ->result();
    }

    public function findbyidforpdf($id){
        $query = $this->db->from('sdr_consumption')
            ->join('tbl_user','tbl_user.id_user=sdr_consumption.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumption.faktur', $id)
            ->get();

        return $query->result_array();
    }

    public function finddetailforpdf($id){
        $query = $this->db->from('sdr_consumption_detail')
            ->join('sdr_consumption','sdr_consumption.faktur=sdr_consumption_detail.faktur')
            ->join('sdr_barang','sdr_barang.id_barang=sdr_consumption_detail.id_barang')
            ->join('tbl_user','tbl_user.id_user=sdr_consumption.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumption_detail.faktur',$id)
            ->get();

        return $query->result_array();

    }

    public function findforaprove(){
        return $this->db->from('sdr_consumption')
            ->join('tbl_user','tbl_user.id_user=sdr_consumption.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('status','Request')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by('id_consumption', 'DESC')
            ->get()
            ->result();
    }

    public function update($where,$data){
        $this->db->where($where);
        $this->db->update($this->table,$data);
    }

}

