<?php

class modeljenis extends CI_Model{
	protected $table = "sdr_jenis";
    protected $primaryKey = "id_jenis";
    protected $allowedFields = ['id_jenis', 'jenis', 'id_kategori'];

    public function findAll(){
    	return $this->db->from('sdr_jenis')
            ->join('sdr_kategori', 'sdr_kategori.id_kategori=sdr_jenis.id_kategori')
            ->get()
            ->result();
    }

    public function save($data){
        return $this->db->insert($this->table, $data);
    }

    public function delete($id){
        return $this->db->delete($this->table, array("id_jenis" => $id));
    }

    function update($where,$data){
        $this->db->where($where);
        $this->db->update($this->table,$data);
    }   

    public function findbyidsundries(){
        return $this->db->from('sdr_jenis')
            ->join('sdr_kategori', 'sdr_kategori.id_kategori=sdr_jenis.id_kategori')
            ->where('sdr_jenis.id_kategori','1')
            ->get()
            ->result();
    }
}