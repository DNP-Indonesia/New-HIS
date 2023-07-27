<?php

class modelbarang extends CI_Model{
	protected $table = "sdr_barang";
    protected $primaryKey = "id_barang";
    protected $allowedFields = ['id_barang', 'barang', 'id_jenis','stok'];

    public function findAll(){
    	return $this->db->from('sdr_barang')
            ->join('sdr_jenis', 'sdr_jenis.id_jenis=sdr_barang.id_jenis')
            ->join('sdr_kategori', 'sdr_kategori.id_kategori=sdr_jenis.id_kategori')
            ->order_by('id_barang','DESC')
            ->get()
            ->result();
    }

    public function save($data){
        return $this->db->insert($this->table, $data);
    }

    public function delete($id){
        return $this->db->delete($this->table, array("id_barang" => $id));
    }

    function update($where,$data){
        $this->db->where($where);
        $this->db->update($this->table,$data);
    } 

}