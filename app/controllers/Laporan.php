<?php

class Laporan extends Controller{
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
            'title' => "Dashboard | Laporan",
            'section' => "laporan",
            'laporan' => $this->model("Transaksi_model")->getAllTransaksi(),
        ];
        $this->view("templates/header");
        $this->view("admin/laporan/index", $data, $this->setfixedData());
        $this->view("templates/footer");
    }
}