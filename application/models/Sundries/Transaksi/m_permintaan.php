<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_permintaan extends CI_Model
{
    protected $table = "sdr_request_sundries";
    protected $primaryKey = "id_request_sundries";
    protected $tabletolak = "sdr_tolak_sundries";
    protected $table2 = "sdr_request_sundries_detail";

    public function getPermintaan()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_request_sundries.id_user', $this->session->userdata('id_user'))
            ->where('status','Request')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function getSetuju1()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_request_sundries.id_user', $this->session->userdata('id_user'))
            ->where('status','Disetujui1')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function getSetuju2()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_request_sundries.id_user', $this->session->userdata('id_user'))
            ->where('status','Disetujui2')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function getTolak()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_request_sundries.id_user', $this->session->userdata('id_user'))
            ->where('status','Ditolak')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function getProses()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_request_sundries.id_user', $this->session->userdata('id_user'))
            ->where('status','Diproses')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function getSelesai()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_request_sundries.id_user', $this->session->userdata('id_user'))
            ->where('status','Selesai')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function byPermintaan()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->order_by('id_request_sundries', 'DESC')
            ->where('status','Request')
            ->get()
            ->result();
    }

    public function bySetuju2()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->order_by('id_request_sundries', 'DESC')
            ->where('status','Disetujui2')
            ->get()
            ->result();
    }

    public function byTolak()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->order_by('id_request_sundries', 'DESC')
            ->where('status','Ditolak')
            ->get()
            ->result();
    }

    public function byProses()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->order_by('id_request_sundries', 'DESC')
            ->where('status','Diproses')
            ->get()
            ->result();
    }

    public function bySelesai()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->order_by('id_request_sundries', 'DESC')
            ->where('status','Selesai')
            ->get()
            ->result();   
    }

    public function forAdminGudang()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('status','Disetujui2')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function forKepalaGudang()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('status','Disetujui1')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function forApprove()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('status','Request')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function forKepalaBagianPermintaan()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->where('status','Request')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function forKepalaBagianSetuju()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->where('status','Disetujui')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function forKepalaBagianTolak()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->where('status','Ditolak')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function forKepalaBagianProses()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->where('status','Diproses')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function forKepalaBagianSelesai()
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('tbl_user.id_section', $this->session->userdata('section'))
            ->where('status','Selesai')
            ->order_by('id_request_sundries', 'DESC')
            ->get()
            ->result();
    }

    public function getIdPdf($id)
    {
        $query = $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_request_sundries.faktur', $id)
            ->get();

        return $query->result_array();
    }

    public function getPermintaanById($id)
    {
        return $this->db->from('sdr_request_sundries')
            ->join('tbl_user','tbl_user.id_user=sdr_request_sundries.id_user')
            ->join('his_section','his_section.id_section=tbl_user.id_section')
            ->where('sdr_request_sundries.faktur', $id)
            ->get()
            ->result();
    }

    public function getBarang()
    {
        return $this->db->from('sdr_barang')
            ->join('sdr_jenis','sdr_jenis.id_jenis=sdr_barang.id_jenis')
            ->join('sdr_kategori','sdr_kategori.id_kategori=sdr_jenis.id_kategori')
            ->where('sdr_jenis.id_kategori','1')
            ->get()
            ->result();
    }

    public function getTolakById($id)
    {
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
     
    public function delete($faktur)
    {
        $hapus = $this->db->delete('sdr_request_sundries', array('faktur'=>$faktur));
        if ($hapus) {
            $hapusdetail = $this->db->delete('sdr_request_sundries_detail', array('faktur'=>$faktur));
        }
    }

    public function cekKeranjang($idbarang, $iduser)
    {
        return $this->db->get_where('sdr_request_sundries_keranjang', array('id_barang'=>$idbarang, 'id_user'=>$iduser));
    }

    public function cekKeranjang2($iduser)
    {
        return $this->db->get_where('sdr_request_sundries_keranjang', array('id_user'=>$iduser));
    }

    public function selectKeranjang($id_user)
    {
        return $this->db->from('sdr_request_sundries_keranjang')
            ->join('sdr_barang','sdr_barang.id_barang=sdr_request_sundries_keranjang.id_barang')
            ->where('id_user', $id_user)
            ->get()
            ->result();   
    }

    public function deleteKeranjang($id_barang, $id_user)
    {
        $hapus = $this->db->delete('sdr_request_sundries_keranjang', array('id_barang'=>$id_barang, 'id_user'=> $id_user));
        if ($hapus) {
            return 1;
        }
    }

    public function update($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->table, $data);
    }

    public function saveTolak($data)
    {
        $this->db->insert($this->tabletolak, $data);
    }

    public function updateKeranjang($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->table2, $data);
    }

    public function generateFaktur()
    {
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
}
?>