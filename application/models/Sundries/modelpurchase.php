<?php

class modelpurchase extends CI_Model{
	protected $table = "sdr_purchase";
    protected $primaryKey = "id_purchase";
    protected $tabledetail = "sdr_purchase_detail";
    protected $table2 = "sdr_purchase_keranjang";
    protected $table3 = "sdr_request_sundries_detail";

    public function findpurchase(){
        return $this->db->from('sdr_purchase')
            ->join('tbl_user','tbl_user.id_user=sdr_purchase.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->order_by('id_purchase', 'DESC')
            ->get()
            ->result();
    }

    public function findbarangrequest(){
        return $this->db->from('sdr_request_sundries_detail')
        ->join('sdr_request_sundries','sdr_request_sundries.faktur=sdr_request_sundries_detail.faktur')
        ->join('sdr_barang','sdr_barang.id_barang=sdr_request_sundries_detail.id_barang')
        ->where('sdr_request_sundries.status','Disetujui2')
        ->where('sdr_request_sundries_detail.statuskeranjang','tidak')
        ->get()
        ->result();
    }

    public function findbyid($id){
        return $this->db->from('sdr_purchase')
            ->where('sdr_purchase.faktur', $id)
            ->get()
            ->result();
    }

    public function findbyidforpdf($id){
        $query = $this->db->from('sdr_purchase')
            ->join('tbl_user','tbl_user.id_user=sdr_purchase.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_purchase.faktur', $id)
            ->get();

        return $query->result_array();
    }

    public function finddetailforpdf($id){
        // $query = $this->db->from('sdr_purchase_detail')
        //     ->join('sdr_purchase','sdr_purchase.faktur=sdr_purchase_detail.faktur')
        //     ->join('sdr_barang','sdr_barang.id_barang=sdr_purchase_detail.id_barang')
        //     ->join('tbl_user','tbl_user.id_user=sdr_purchase.id_user')
        //     ->join('his_section','his_section.id_section=tbl_user.id_section')
        //     ->where('sdr_purchase_detail.faktur',$id)
        //     ->get();

        // return $query->result_array();

        $this->db->select('*');
        $this->db->select_sum('jumlah');
        $this->db->from('sdr_purchase_detail');
        $this->db->join('sdr_purchase','sdr_purchase.faktur=sdr_purchase_detail.faktur');
        $this->db->join('sdr_barang','sdr_barang.id_barang=sdr_purchase_detail.id_barang');
        $this->db->join('tbl_user','tbl_user.id_user=sdr_purchase.id_user');
        $this->db->join('his_section','his_section.id_section=tbl_user.id_section');
        $this->db->group_by('sdr_purchase_detail.id_barang');
        $this->db->where('sdr_purchase_detail.faktur',$id);
        $query = $this->db->get();
        return $query->result_array();

    }

    public function findforaprove(){
        return $this->db->from('sdr_purchase')
            ->join('tbl_user','tbl_user.id_user=sdr_purchase.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('status','Request')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by('id_purchase', 'DESC')
            ->get()
            ->result();
    }

    public function finddetail($id){
        // return $this->db->from('sdr_purchase_detail')
        //     ->join('sdr_purchase','sdr_purchase.faktur=sdr_purchase_detail.faktur')
        //     ->join('sdr_barang','sdr_barang.id_barang=sdr_purchase_detail.id_barang')
        //     ->join('tbl_user','tbl_user.id_user=sdr_purchase.id_user')
        //     ->join('his_section','his_section.id_section=tbl_user.id_section')
        //     ->where('sdr_purchase_detail.faktur',$id)
        //     ->get()
        //     ->result();

        $this->db->select('*');
        //$this->db->select_sum('jumlah');
        $this->db->from('sdr_purchase_detail');
        $this->db->join('sdr_request_sundries','sdr_request_sundries.faktur=sdr_purchase_detail.faktursundries');
        $this->db->join('sdr_purchase','sdr_purchase.faktur=sdr_purchase_detail.faktur');
        $this->db->join('sdr_barang','sdr_barang.id_barang=sdr_purchase_detail.id_barang');
        $this->db->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user');
        $this->db->join('his_section','his_section.id_section=tbl_user.id_section');
        //$this->db->group_by('sdr_purchase_detail.id_barang');
        $this->db->where('sdr_purchase_detail.faktur',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function cekkeranjang($faktur){
        return $this->db->get_where('sdr_purchase_keranjang', array('faktur'=>$faktur));
    }

    public function cekkeranjang2($idbarang){
        return $this->db->get_where('sdr_purchase_keranjang', array('id_barang'=>$idbarang));
    }

    public function cekkeranjang3($faktur, $idbarang){
        return $this->db->get_where('sdr_purchase_keranjang', array('id_barang'=>$idbarang), array('faktur'=>$faktur));
    }

    public function cekjumlahbarang($idbarang){
        return $this->db->from('sdr_purchase_keranjang')
            ->where('id_barang',$idbarang)
            ->get()
            ->result();
    }

    public function savekeranjang($data){
        $this->db->insert('sdr_purchase_keranjang',$data);
    }

    public function ubahstkeranjang($data, $where){
        $this->db->where($where);
        $this->db->update($this->table3,$data);
    }

    public function findkeranjang(){
        $this->db->select('*');
        $this->db->select_sum('jumlah');
        $this->db->from('sdr_purchase_keranjang');
        $this->db->join('sdr_barang','sdr_barang.id_barang=sdr_purchase_keranjang.id_barang');
        $this->db->group_by('sdr_purchase_keranjang.id_barang');
        $query = $this->db->get();
        return $query->result();
    }

    public function deletekeranjang($id_barang){
        $hapus = $this->db->delete('sdr_purchase_keranjang', array('id_barang'=>$id_barang));
        if ($hapus) {
            return 1;
        }
    }

    public function save($data, $iduser, $faktur){
        $simpan = $this->db->insert('sdr_purchase',$data);
        if ($simpan) {
            $carikeranjang = $this->db->get('sdr_purchase_keranjang');
            foreach ($carikeranjang->result() as $tempel){
                $detail = array(
                    'faktur'=>$faktur,
                    'id_barang'=>$tempel->id_barang,
                    'jumlah'=>$tempel->jumlah,
                    'keterangan'=>$tempel->keterangan,
                    'faktursundries'=>$tempel->faktursundries   
                    );
                $this->db->insert('sdr_purchase_detail', $detail);   
            }
            $this->db->delete('sdr_purchase_keranjang', array('id_user'=>$iduser));
        }
    }

    public function generatefaktur(){

        $this->db->select('RIGHT(faktur,4) as faktur', false);
        $this->db->order_by("faktur", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('sdr_purchase');

        
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
        $rs      = "PCH";

        $newfaktur  = $rs."".$tahun."".$bulan.".".$lastKode;

        return $newfaktur; 
    }
}