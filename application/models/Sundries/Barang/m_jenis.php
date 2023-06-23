<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_jenis extends CI_Model
{
    protected $table = 'sdr_jenis';
    protected $primaryKey = 'id_jenis';
    protected $allowedFields = ['id_jenis', 'jenis', 'id_kategori'];

    public function getJenisAll()
    {
        $this->db->select('sdr_jenis.*, sdr_kategori.kategori');
        $this->db->from('sdr_jenis');
        $this->db->join('sdr_kategori', 'sdr_jenis.id_kategori = sdr_kategori.id_kategori');
        $this->db->order_by('sdr_jenis.id_jenis', 'DESC');
        return $this->db->get()->result();
    }

     public function getJenisById($id)
    {
        $this->db->select('sdr_jenis.*, sdr_kategori.kategori');
        $this->db->from('sdr_jenis');
        $this->db->join('sdr_kategori', 'sdr_jenis.id_kategori = sdr_kategori.id_kategori');
        $this->db->where('sdr_jenis.id_jenis', $id);
        return $this->db->get()->row();   
    }

    public function storeJenis($data)
    {
        $this->db->insert('sdr_jenis', $data);
        return $this->db->insert_id();
    }

    public function updateJenis($id, $data)
    {
        $this->db->where('id_jenis', $id);
        $this->db->update('sdr_jenis', $data);
        // return $this->db->affected_rows();
    }

    public function deleteJenis($id)
    {
        $this->db->where('id_jenis', $id);
        $this->db->delete('sdr_jenis');
        // return $this->db->affected_rows();
    }
}
?>