<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_konsumsistok extends CI_Model
{
    protected $table = 'sdr_consumptionstok';
    protected $primaryKey = 'id_consumptionstok';

    public function getKonsumsistok()
    {
        return $this->db->from('sdr_consumptionstok')
            ->join('tbl_user','tbl_user.id_user=sdr_consumptionstok.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumptionstok.id_user', $this->session->userdata('id_user'))
            ->order_by('id_consumptionstok', 'DESC')
            ->get()
            ->result();
    }

    public function getBarangByFaktur($faktur)
    {
        return $this->db->from('sdr_estimasi_detail')
            ->join('sdr_barang','sdr_estimasi_detail.id_barang=sdr_barang.id_barang')
            ->where('faktur',$faktur)
            ->get()
            ->result();
    }

    public function getKonsumsistokAll()
    {
        return $this->db->from('sdr_consumptionstok')
            ->join('tbl_user','tbl_user.id_user=sdr_consumptionstok.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->order_by('id_consumptionstok', 'DESC')
            ->get()
            ->result();
    }

    public function getEstimasi()
    {
        return $this->db->from('sdr_estimasi')
            ->where('sdr_estimasi.id_user', $this->session->userdata('id_user'))
            ->order_by('id_estimasi', 'DESC')
            ->limit(1)
            ->get()
            ->result();        
    }

    public function forKepalaBagian()
    {
        return $this->db->from('sdr_consumptionstok')
            ->join('tbl_user','tbl_user.id_user=sdr_consumptionstok.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by('id_consumptionstok', 'DESC')
            ->get()
            ->result();
    }

    public function cekKeranjang($idbarang, $iduser)
    {
        return $this->db->get_where('sdr_consumptionstok_keranjang', array('id_barang'=>$idbarang, 'id_user'=>$iduser));
    }

    public function saveKeranjang($data)
    {
        $this->db->insert('sdr_consumptionstok_keranjang', $data);
    }

    public function getKeranjang($id_user)
    {
        $this->db->select('sdr_consumptionstok_keranjang. id_barang, barang, jumlah, id_user');
        $this->db->from('sdr_consumptionstok_keranjang');
        $this->db->join('sdr_barang','sdr_barang.id_barang=sdr_consumptionstok_keranjang.id_barang');
        $this->db->where('id_user',$id_user);
        return $this->db->get();
    }   

    public function deleteKeranjang($id_barang, $id_user)
    {
        $hapus = $this->db->delete('sdr_consumptionstok_keranjang', array('id_barang'=>$id_barang, 'id_user'=> $id_user));
        if ($hapus) {
            return 1;
        }
    }

    public function save($data, $iduser, $faktur, $fakest)
    {
        $simpan = $this->db->insert('sdr_consumptionstok',$data);
        if ($simpan) {
            $carikeranjang = $this->db->get_where('sdr_consumptionstok_keranjang', array('id_user'=>$iduser));
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
                        $this->db->delete('sdr_consumptionstok', array('faktur'=>$faktur));   
                    }else{
                        $this->db->insert('sdr_consumptionstok_detail', $detail);    
                    }       
                }
            }
            $this->db->delete('sdr_consumptionstok_keranjang', array('id_user'=>$iduser));
        }
    }

    public function deleteKonsumsistok($faktur)
    {
        $hapus = $this->db->delete('sdr_consumptionstok', array('faktur'=>$faktur));
        if ($hapus) {
            $hapusdetail = $this->db->delete('sdr_consumptionstok_detail', array('faktur'=>$faktur));
            if ($hapusdetail) {
                redirect('Sundries/Transaksi/c_konsumsistok/index');
            }
        }
    }

    public function getKonsumsistokById($id)
    {
        return $this->db->from('sdr_consumptionstok')
            ->join('tbl_user','tbl_user.id_user=sdr_consumptionstok.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumptionstok.faktur', $id)
            ->get()
            ->result();
    }

    public function getKonsumsistokDetail($id)
    {
        return $this->db->from('sdr_consumptionstok_detail')
            ->join('sdr_consumptionstok','sdr_consumptionstok.faktur=sdr_consumptionstok_detail.faktur')
            ->join('sdr_barang','sdr_barang.id_barang=sdr_consumptionstok_detail.id_barang')
            ->join('tbl_user','tbl_user.id_user=sdr_consumptionstok.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumptionstok_detail.faktur',$id)
            ->get()
            ->result();   
    }

    public function getIdPdf($id)
    {
        $query = $this->db->from('sdr_consumptionstok')
            ->join('tbl_user','tbl_user.id_user=sdr_consumptionstok.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_consumptionstok.faktur', $id)
            ->get();

        return $query->result_array();
    }

    public function forApprove()
    {
        return $this->db->from('sdr_consumptionstok')
            ->join('tbl_user','tbl_user.id_user=sdr_consumptionstok.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('status','Request')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by('id_consumptionstok', 'DESC')
            ->get()
            ->result();
    }

    public function update($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->table,$data);
    }
}
?>