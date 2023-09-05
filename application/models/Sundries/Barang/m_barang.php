<?php

class m_barang extends CI_Model
{
    protected $table = 'sdr_barang';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['id_barang', 'barang', 'id_jenis','stok'];

    public function getBarangAll()
    {
    	return $this->db->from('sdr_barang')
            ->join('sdr_jenis', 'sdr_jenis.id_jenis=sdr_barang.id_jenis')
            ->join('sdr_kategori', 'sdr_kategori.id_kategori=sdr_jenis.id_kategori')
            ->order_by('id_barang','ASC')
            ->get()
            ->result();
    }

    public function saveBarang($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function updateBarang($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->table,$data);
    }

    public function deleteBarang($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('sdr_barang');
    }
}
?>