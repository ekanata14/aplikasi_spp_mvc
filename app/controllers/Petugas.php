<?php

class Petugas extends Controller{
    protected $fixedData = [];
    public function __construct(){
        Middleware::auth();
    }

    public function setFixedData(){
        $this->fixedData = [
        'totalSiswa' => $this->model("User_Model")->countAllSiswa(),
        'totalPetugas' => $this->model("User_model")->countAllPetugas(),
        'totalKelas' => $this->model("Kelas_model")->countAllKelas(),
        'totalTransaksi' => $this->model("Transaksi_model")->countAllTransaksi()
        ];

        return $this->fixedData;
    }
    
    public function index(){
        $data = [
            'title' => "Dashboard | Petugas",
            'section' => "petugas",
            'petugas' => $this->model("User_model")->getAllPetugas(),
        ];
        $this->view("templates/header");
        $this->view("admin/petugas/index", $data, $this->setfixedData());
        $this->view("templates/footer");
    }

    public function tambah($table){
        $this->model($table . "_model")->store();
    }
    
    public function tambahPetugas(){
        $data = [
            'title' => "Dashboard | Petugas",
            'section' => "petugas",
        ];
        $this->view("templates/header");
        $this->view("admin/petugas/tambah", $data, $this->setfixedData());
        $this->view("templates/footer");
    }

    public function editPetugas($id){
        $data = [
            'title' => "Dashboard | Petugas",
            'section' => "petugas",
            'petugas' => $this->model("User_model")->getPetugasById($id),
        ];
        $this->view("templates/header");
        $this->view("admin/petugas/edit", $data, $this->setfixedData());
        $this->view("templates/footer");
    }

    public function tambahPetugasAct(){
        if($this->model("User_model")->tambahPengguna($_POST) > 0){
            $id_pengguna = $this->model("User_model")->getLastInsertedId();
            if($this->model("User_model")->tambahPetugas($_POST, $id_pengguna) > 0){
                Flasher::setFlash("Data Berhasil Ditambahkan", "success");
                Redirect::to("/petugas");
            } else{
                Flasher::setFlash("Data Gagal Ditambahkan", "danger");
                Redirect::to("/petugas");
            }
        } else{
            Flasher::setFlash("Data Gagal Ditambahkan", "danger");
            Redirect::to("/petugas");
        }
    }

    public function editPetugasAct(){
        if($this->model("User_model")->editPetugas($_POST)){
            if($this->model("User_model")->editPengguna($_POST)){
                Flasher::setFlash("Data Berhasil Diedit", "success");
                Redirect::to("/petugas");
            } else{
                Flasher::setFlash("Data Gagal Diedit", "danger");
                Redirect::to("/petugas");
            }
        } else{
            Flasher::setFlash("Data Gagal Diedit", "danger");
            Redirect::to("/petugas");
        }
    }

    public function deletePetugasAct(){
        if($this->model("User_model")->deletePetugas($_POST)){
            if($this->model("User_model")->deletePengguna($_POST)){
                Flasher::setFlash("Data Berhasil Dihapus", "success");
                Redirect::to("/petugas");
            } else{
                Flasher::setFlash("Data Gagal Dihapus", "danger");
                Redirect::to("/petugas");
            }
        } else{
            Flasher::setFlash("Data Gagal Dihapus", "danger");
            Redirect::to("/petugas");
        }
    }
}