<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_jenis extends CI_Model
{
    protected $table = 'sdr_jenis';
    protected $primaryKey = 'id_jenis';
    protected $allowedFields = ['id_jenis', 'jenis', 'id_kategori'];

    public function getJenisAll()
    {
    	return $this->db->from('sdr_jenis')
            ->join('sdr_kategori', 'sdr_kategori.id_kategori=sdr_jenis.id_kategori')
            ->order_by('id_jenis','ASC')
            ->get()
            ->result();
    }

     public function getJenisById()
    {
        return $this->db->from('sdr_jenis')
            ->join('sdr_kategori', 'sdr_kategori.id_kategori=sdr_jenis.id_kategori')
            ->where('sdr_jenis.id_kategori','1')
            ->get()
            ->result();  
    }

    public function saveJenis($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function updateJenis($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->table,$data);
    }

    public function deleteJenis($id)
    {
        $this->db->where('id_jenis', $id);
        return $this->db->delete($this->table);
    }
}
?>