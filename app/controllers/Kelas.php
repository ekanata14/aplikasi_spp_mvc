<?php

class Kelas extends Controller{
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
            'title' => "Dashboard | Kelas",
            'section' => "kelas",
            'kelas' => $this->model("Kelas_model")->getAllKelas(),
        ];
        $this->view("templates/header");
        $this->view("admin/kelas/index", $data, $this->setfixedData());
        $this->view("templates/footer");
    }

    public function tambahKelas(){
        $data = [
            'title' => "Dashboard | Kelas",
            'section' => "kelas",
            'komka' => ['RPL', 'TKJ', 'MM', 'TPTU', 'TKRO', 'DPIB', 'BKP', 'TBSM', 'AV'],
        ];
        $this->view("templates/header");
        $this->view("admin/kelas/tambah", $data, $this->setfixedData());
        $this->view("templates/footer");
    }

    public function editKelas($id){
        $data = [
            'title' => "Dashboard | Kelas",
            'section' => "kelas",
            'kelas' => $this->model("Kelas_model")->getKelasById($id),
            'komka' => ['RPL', 'TKJ', 'MM', 'TPTU', 'TKRO', 'DPIB', 'BKP', 'TBSM', 'AV'],
        ];
        $this->view("templates/header");
        $this->view("admin/kelas/edit", $data, $this->setfixedData());
        $this->view("templates/footer");
    }

    public function tambahkelasAct(){
        if($this->model("Kelas_model")->tambahKelas($_POST) > 0){
            Flasher::setFlash("Data Berhasil Ditambahkan", "success");
            Redirect::to("/kelas");
        } else{
            Flasher::setFlash("Data Gagal Ditambahkan", "danger");
            Redirect::to("/kelas");
        }
    }

    public function editKelasAct(){
        if($this->model("Kelas_model")->editKelas($_POST) > 0){
            Flasher::setFlash("Data Berhasil Diedit", "success");
            Redirect::to("/kelas");
        } else{
            Flasher::setFlash("Data Gagal Diedit", "danger");
            Redirect::to("/kelas");
        }
    }

    public function deleteKelasAct(){
        if($this->model("Kelas_model")->deleteKelas($_POST) > 0){
            Flasher::setFlash("Data Berhasil Dihapus", "success");
            Redirect::to("/kelas");
        } else{
            Flasher::setFlash("Data Gagal Dihapus", "danger");
            Redirect::to("/kelas");
        }
    }
}