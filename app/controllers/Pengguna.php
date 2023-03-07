<?php

class Pengguna extends Controller{
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
            'title' => "Dashboard | Pengguna",
            'section' => "pengguna",
            'pengguna' => $this->model("User_model")->getAllUsers(),
        ];
        $this->view("templates/header");
        $this->view("admin/pengguna/index", $data, $this->setfixedData());
        $this->view("templates/footer");
    }
}