<?php

class Pembayaran extends Controller{
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
            'title' => "Dashboard | Pembayaran",
            'section' => "pembayaran",
            'pembayaran' => $this->model("Pembayaran_model")->getAllPembayaran(),
        ];
        $this->view("templates/header");
        $this->view("admin/pembayaran/index", $data, $this->setfixedData());
        $this->view("templates/footer");
    }

    public function tambahPembayaran(){
        $data = [
            'title' => "Dashboard | Pembayaran",
            'section' => "pembayaran",
        ];
        $this->view("templates/header");
        $this->view("admin/pembayaran/tambah", $data, $this->setfixedData());
        $this->view("templates/footer");
    }

    public function editPembayaran($id){
        $data = [
            'title' => "Dashboard | Pembayaran",
            'section' => "pembayaran",
            'pembayaran' => $this->model("Pembayaran_model")->getPembayaranById($id),
        ];
        $this->view("templates/header");
        $this->view("admin/pembayaran/edit", $data, $this->setfixedData());
        $this->view("templates/footer");
    }

    public function tambahpembayaranAct(){
        if($this->model("Pembayaran_model")->tambahPembayaran($_POST) > 0){
            Flasher::setFlash("Data Berhasil Ditambahkan", "success");
            Redirect::to("/pembayaran");
        } else{
            Flasher::setFlash("Data Gagal Ditambahkan", "danger");
            Redirect::to("/pembayaran");
        }
    }

    public function editPembayaranAct(){
        if($this->model("Pembayaran_model")->editPembayaran($_POST) > 0){
            Flasher::setFlash("Data Berhasil Diedit", "success");
            Redirect::to("/pembayaran");
        } else{
            Flasher::setFlash("Data Gagal Diedit", "danger");
            Redirect::to("/pembayaran");
        }
    }

    public function deletePembayaranAct(){
        if($this->model("Pembayaran_model")->deletePembayaran($_POST) > 0){
            Flasher::setFlash("Data Berhasil Dihapus", "success");
            Redirect::to("/pembayaran");
        } else{
            Flasher::setFlash("Data Gagal Dihapus", "danger");
            Redirect::to("/pembayaran");
        }
    }
}