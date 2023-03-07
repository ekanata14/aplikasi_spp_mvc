<?php

class Entri extends Controller{
    protected $fixedData;
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
            'title' => "Dashboard | Entri",
            'section' => "entri",
            'kelas' => $this->model("Kelas_model")->getAllKelas(),
        ];
        $this->view("templates/header");
        $this->view("admin/entri/index", $data, $this->setfixeddata());
        $this->view("templates/footer");
    }

    public function detailKelas($id){
        $data = [
            'title' => "Dashboard | Entri",
            'section' => "entri",
            'siswa' => $this->model("User_model")->getSiswaByKelasId($id),
        ];
        $this->view("templates/header");
        $this->view("admin/entri/detailKelas", $data, $this->setfixedData());
        $this->view("templates/footer");
    }

    public function detailSiswa($id){
        $data = [
            'title' => "Dashboard | Entri",
            'section' => "entri",
            'transaksi' => $this->model("Transaksi_model")->getTransaksiBySiswaId($id),
            'siswa' => $this->model("User_model")->getSiswaById($id),
            'bulan' => ["Juli", "Agustus", "September", "Oktober", "November", "Desember", "Januari", "Februari", "Maret", "April", "Mei", "Juni"],
            'created' => false,
            'petugas' => $this->model("User_model")->getPetugasBySessionId($_SESSION['user']['id']),
        ];
        $this->view("templates/header");
        $this->view("admin/entri/detailSiswa", $data, $this->setfixeddata());
        $this->view("templates/footer");
    }

    public function transaksiAct(){
        if($this->model("Transaksi_model")->transaksi($_POST) > 0){
            Flasher::setFlash("Transaksi Berhasil", "success");
            Redirect::to("/entri/detailSiswa/{$_POST['siswa_id']}");
        } else{
            Flasher::setFlash("Transaksi Gagal", "danger");
            Redirect::to("/entri/detailSiswa/{$_POST['siswa_id']}");
        }
    }
}