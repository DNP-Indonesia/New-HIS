<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_kategori extends CI_Model
{
    protected $table = 'sdr_kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['id_kategori', 'kategori'];

    public function getKategoriAll()
    {
        $this->db->select('sdr_kategori.*');
        $this->db->from('sdr_kategori');
        $this->db->order_by('sdr_kategori.id_kategori', 'DESC');
        return $this->db->get()->result();
    }

    public function getKategoriById($id)
    {
        $this->db->select('sdr_kategori.*');
        $this->db->from('sdr_kategori');
        $this->db->where('sdr_kategori.id_kategori', $id);
        return $this->db->get()->row();
    }

    public function storeKategori($data)
    {
        $this->db->insert('sdr_kategori', $data);
        return $this->db->insert_id();
    }

    public function updateKategori($id, $data)
    {
        $this->db->where('id_kategori', $id);
        $this->db->update('sdr_kategori', $data);
        // return $this->db->affected_rows();
    }

    public function deleteKategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('sdr_kategori');
        // return $this->db->affected_rows();
    }
}
?>