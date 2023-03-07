<?php

class Pembayaran_model{
    private $pembayaran = 'pembayaran';
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    // Pengguna Model Functions
    public function getAllPembayaran(){
        $this->db->query("SELECT * FROM $this->pembayaran");
        return $this->db->resultAll();
    }

    public function getPembayaranById($id){
        $this->db->query("SELECT * FROM $this->pembayaran WHERE id_pembayaran = :id_pembayaran");
        $this->db->bind("id_pembayaran", $id);
        return $this->db->result();
    }

    public function tambahPembayaran($data){
        $this->db->query("INSERT INTO $this->pembayaran VALUES(NULL, :tahun_ajaran, :nominal)");
        $this->db->bind("tahun_ajaran", $data['tahun_ajaran']);
        $this->db->bind("nominal", $data['nominal']);
        return $this->db->rowCount();
    }

    public function editPembayaran($data){
        $this->db->query("UPDATE $this->pembayaran SET tahun_ajaran = :tahun_ajaran, nominal = :nominal WHERE id_pembayaran = :id_pembayaran");
        $this->db->bind("tahun_ajaran", $data['tahun_ajaran']);
        $this->db->bind("nominal", $data['nominal']);
        $this->db->bind("id_pembayaran", $data['id_pembayaran']);
        return $this->db->rowCount();
    }

    public function deletePembayaran($data){
        $this->db->query("DELETE FROM $this->pembayaran WHERE id_pembayaran = :id_pembayaran");
        $this->db->bind("id_pembayaran", $data['id_pembayaran']);
        return $this->db->rowCount();
    }
    


}