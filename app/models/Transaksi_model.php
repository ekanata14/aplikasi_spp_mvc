<?php

class Transaksi_model{
    private $transaksi = 'transaksi';
    private $siswa = 'siswa';
    private $petugas = 'petugas';
    private $pembayaran = 'pembayaran';
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    // Pengguna Model Functions
    public function getAllTransaksi(){
        $this->db->query("SELECT * FROM $this->transaksi INNER JOIN $this->siswa ON $this->transaksi.siswa_id = $this->siswa.id_siswa INNER JOIN $this->petugas ON $this->transaksi.petugas_id = $this->petugas.id_petugas INNER JOIN $this->pembayaran ON $this->transaksi.pembayaran_id = $this->pembayaran.id_pembayaran");
        return $this->db->resultAll();
    }

    public function countAllTransaksi(){
        $this->db->query("SELECT * FROM $this->transaksi");
        return $this->db->rowCount();
    }

    public function getTransaksiBySiswaId($id){
        $this->db->query("SELECT * FROM $this->transaksi INNER JOIN $this->siswa ON $this->transaksi.siswa_id = $this->siswa.id_siswa INNER JOIN $this->petugas ON $this->transaksi.petugas_id = $this->petugas.id_petugas INNER JOIN $this->pembayaran ON $this->transaksi.pembayaran_id = $this->pembayaran.id_pembayaran WHERE siswa_id = :siswa_id");
        $this->db->bind("siswa_id", $id);
        return $this->db->resultAll();
    }

    public function transaksi($data){
        $this->db->query("INSERT INTO $this->transaksi VALUES(NULL, NOW(), :bulan_dibayar, :tahun_dibayar, :siswa_id, :petugas_id, :pembayaran_id)");
        $this->db->bind("bulan_dibayar", $data['bulan_dibayar']);
        $this->db->bind("tahun_dibayar", $data['tahun_dibayar']);
        $this->db->bind("siswa_id", $data['siswa_id']);
        $this->db->bind("petugas_id", $data['petugas_id']);
        $this->db->bind("pembayaran_id", $data['pembayaran_id']);
        return $this->db->rowCount();
    }
}