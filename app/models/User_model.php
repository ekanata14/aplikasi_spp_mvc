<?php

class User_model{
    private $pengguna = 'pengguna';
    private $petugas = 'petugas';
    private $siswa = 'siswa';
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getLastInsertedId(){
        return $this->db->getLastInsertedId();
    }

    // Pengguna Model Functions
    public function getAllUsers(){
        $this->db->query("SELECT * FROM $this->pengguna");
        return $this->db->resultAll();
    }

    public function getUserByUsername($username){
        $this->db->query("SELECT * FROM $this->pengguna WHERE username = :username");
        $this->db->bind("username", $username);
        return $this->db->result();
    }

    public function authUser($data){
        $this->db->query("SELECT * FROM $this->pengguna WHERE username = :username AND password = :password");
        $this->db->bind("username", $data['username']);
        $this->db->bind("password", $data['password']);
        return $this->db->rowCount();
    }

    // Pengguna Models
    public function tambahPengguna($data){
        $this->db->query("INSERT INTO $this->pengguna VALUES(NULL, :username, :password, :role)");
        $this->db->bind("username", $data['username']);
        $this->db->bind("password", $data['password']);
        $this->db->bind("role", $data['role']);
        return $this->db->rowCount();
    }

    public function editPengguna($data){
        $this->db->query("UPDATE $this->pengguna SET username = :username, password = :password, role = :role WHERE id_pengguna = :id_pengguna");
        $this->db->bind("username", $data['username']);
        $this->db->bind("password", $data['password']);
        $this->db->bind("role", $data['role']);
        $this->db->bind("id_pengguna", $data['id_pengguna']);
        return $this->db->rowCount();
    }

    public function deletePengguna($data){
        $this->db->query("DELETE FROM $this->pengguna WHERE id_pengguna = :id_pengguna");
        $this->db->bind("id_pengguna", $data['id_pengguna']);
        return $this->db->rowCount();
    }

    // Petugas Models
    public function getAllPetugas(){
        $this->db->query("SELECT * FROM $this->petugas INNER JOIN $this->pengguna ON $this->petugas.pengguna_id = $this->pengguna.id_pengguna");
        return $this->db->resultAll();
    }

    public function getPetugasById($id){
        $this->db->query("SELECT * FROM $this->petugas INNER JOIN $this->pengguna ON $this->petugas.pengguna_id = $this->pengguna.id_pengguna WHERE id_petugas = :id_petugas");
        $this->db->bind("id_petugas", $id);
        return $this->db->result();
    }

    public function getPetugasBySessionId($id){
        $this->db->query("SELECT * FROM $this->petugas WHERE pengguna_id = :pengguna_id");
        $this->db->bind("pengguna_id", $id);
        return $this->db->result();
    }

    public function countAllPetugas(){
        $this->db->query("SELECT * FROM $this->petugas");
        return $this->db->rowCount();
    }

    public function tambahPetugas($data, $id_pengguna){
        $this->db->query("INSERT INTO $this->petugas VALUES(NULL, :nama_petugas, :pengguna_id)");
        $this->db->bind("nama_petugas", $data['username']);
        $this->db->bind("pengguna_id", $id_pengguna);
        return $this->db->rowCount();
    }

    public function editPetugas($data){
        $this->db->query("UPDATE $this->petugas SET nama_petugas = :nama_petugas WHERE id_petugas = :id_petugas");
        $this->db->bind("nama_petugas", $data['username']);
        $this->db->bind("id_petugas", $data['id_petugas']);
        return $this->db->rowCount();
    }

    // Siswa Models
    public function getAllSiswa(){
        $this->db->query("SELECT * FROM $this->siswa");
        return $this->db->resultAll();
    }

    public function getSiswaById($id){
        $this->db->query("SELECT * FROM $this->siswa INNER JOIN $this->pengguna ON $this->siswa.pengguna_id = $this->pengguna.id_pengguna WHERE id_siswa = :id_siswa");
        $this->db->bind("id_siswa", $id);
        return $this->db->result();
    }

    public function getSiswaByKelasId($id){
        $this->db->query("SELECT * FROM $this->siswa WHERE kelas_id = :kelas_id");
        $this->db->bind("kelas_id", $id);
        return $this->db->resultAll();
    }

    public function getSiswaBySessionId($id){
        $this->db->query("SELECT * FROM $this->siswa WHERE pengguna_id = :pengguna_id");
        $this->db->bind("pengguna_id", $id);
        return $this->db->result();
    }

    public function countAllSiswa(){
        $this->db->query("SELECT * FROM $this->siswa");
        return $this->db->rowCount();
    }

    public function tambahSiswa($data, $id_pengguna){
        $this->db->query("INSERT INTO $this->siswa VALUES(NULL, :nisn, :nis, :nama_siswa, :alamat, :telepon, :kelas_id, :pengguna_id, :pembayaran_id)");
        $this->db->bind("nisn", $data['nisn']);
        $this->db->bind("nis", $data['username']);
        $this->db->bind("nama_siswa", $data['nama_siswa']);
        $this->db->bind("alamat", $data['alamat']);
        $this->db->bind("telepon", $data['telepon']);
        $this->db->bind("kelas_id", $data['kelas_id']);
        $this->db->bind("pengguna_id", $id_pengguna);
        $this->db->bind("pembayaran_id", $data['pembayaran_id']);
        return $this->db->rowCount();
    }

    public function editSiswa($data){
        $this->db->query("UPDATE $this->siswa SET nisn = :nisn, nis = :nis, nama_siswa = :nama_siswa, alamat = :alamat, telepon = :telepon, kelas_id = :kelas_id, pengguna_id = :pengguna_id, pembayaran_id = :pembayaran_id WHERE id_siswa = :id_siswa");
        $this->db->bind("nisn", $data['nisn']);
        $this->db->bind("nis", $data['username']);
        $this->db->bind("nama_siswa", $data['nama_siswa']);
        $this->db->bind("alamat", $data['alamat']);
        $this->db->bind("telepon", $data['telepon']);
        $this->db->bind("kelas_id", $data['kelas_id']);
        $this->db->bind("pengguna_id", $data['id_pengguna']);
        $this->db->bind("pembayaran_id", $data['pembayaran_id']);
        $this->db->bind("id_siswa", $data['id_siswa']);
        return $this->db->rowCount();
    }

    public function store(){
        echo "Ditambahkan User";
    }
    


}