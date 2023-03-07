<?php

class Siswa extends Controller{
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
            'title' => "Dashboard | Siswa",
            'section' => "siswa",
            'siswa' => $this->model("User_model")->getAllSiswa(),
        ];
        $this->view("templates/header");
        $this->view("admin/siswa/index", $data, $this->setfixedData());
        $this->view("templates/footer");
    }

    public function tambahSiswa(){
        $data = [
            'title' => "Dashboard | Siswa",
            'section' => "siswa",
            'kelas' => $this->model("Kelas_model")->getAllKelas(),
            'tahun_ajaran' => $this->model("Pembayaran_model")->getAllPembayaran(),
        ];
        $this->view("templates/header");
        $this->view("admin/siswa/tambah", $data, $this->setfixedData());
        $this->view("templates/footer");
    }

    public function editSiswa($id){
        $data = [
            'title' => "Dashboard | Siswa",
            'section' => "siswa",
            'siswa' => $this->model("User_model")->getSiswaById($id),
            'kelas' => $this->model("Kelas_model")->getAllKelas(),
            'tahun_ajaran' => $this->model("Pembayaran_model")->getAllPembayaran(),
        ];
        $this->view("templates/header");
        $this->view("admin/siswa/edit", $data, $this->setfixedData());
        $this->view("templates/footer");
    }

    public function tambahSiswaAct(){
        if($this->model("User_model")->tambahPengguna($_POST) > 0){
            $id_pengguna = $this->model("User_model")->getLastInsertedId();
            if($this->model("User_model")->tambahSiswa($_POST, $id_pengguna) > 0){
                Flasher::setFlash("Data Berhasil Ditambahkan", "success");
                Redirect::to("/siswa");
            } else{
                Flasher::setFlash("Data Gagal Ditambahkan", "danger");
                Redirect::to("/siswa");
            }
        } else{
            Flasher::setFlash("Data Gagal Ditambahkan", "danger");
            Redirect::to("/siswa");
        }
    }

    public function editSiswaAct(){
        if($this->model("User_model")->editSiswa($_POST) > 0){
            if($this->model("User_model")->editPengguna($_POST) > 0 || $this->model("User_model")->editPengguna($_POST) > -1){
                Flasher::setFlash("Data Berhasil Diedit", "success");
                Redirect::to("/siswa");
            } else{
                Flasher::setFlash("Data Gagal Diedit", "danger");
                Redirect::to("/siswa");
            }
        } else{
            Flasher::setFlash("Data Gagal Diedit", "danger");
            Redirect::to("/siswa");
        }
    }

    public function deleteSiswaAct(){
        if($this->model("User_model")->deletePengguna($_POST)){
            Flasher::setFlash("Data Berhasil Dihapus", "success");
            Redirect::to("/siswa");
        } else{
            Flasher::setFlash("Data Gagal Dihapus", "danger");
            Redirect::to("/siswa");
        }
    }
}