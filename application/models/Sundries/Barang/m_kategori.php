<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_kategori extends CI_Model
{
    protected $table = 'sdr_kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['id_kategori', 'kategori'];

    public function getKategoriAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function saveKategori($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function updateKategori($id, $data)
    {
        $this->db->where($id);
        return $this->db->update($this->table, $data);
    }

    public function deleteKategori($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->delete($this->table);
    }
}
?>