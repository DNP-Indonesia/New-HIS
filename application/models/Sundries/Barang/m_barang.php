<?php

class m_barang extends CI_Model
{
    protected $table = 'sdr_barang';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['id_barang', 'barang', 'id_jenis','stok'];

    public function getBarangAll()
    {
        $this->db->select('sdr_barang.*, sdr_jenis.jenis, sdr_kategori.kategori');
        $this->db->from('sdr_barang');
        $this->db->join('sdr_jenis', 'sdr_barang.id_jenis = sdr_jenis.id_jenis');
        $this->db->join('sdr_kategori', 'sdr_jenis.id_kategori = sdr_kategori.id_kategori');
        $this->db->order_by('sdr_barang.id_barang', 'DESC');
        return $this->db->get()->result();
    }


    public function saveBarang($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function updateBarang($where, $data)
    {
        $this->db->where('id_barang', $id);
        $this->db->update('sdr_barang', $data);
    }

    public function deleteBarang($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('sdr_barang');
    }
}
