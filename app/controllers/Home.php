<?php

class Home extends Controller{
    public function __construct(){
        Middleware::auth();
    }
    public function index(){
        $siswa = $this->model("User_model")->getSiswaBySessionId($_SESSION['user']['id']);
        $data = [
            'history' => $this->model("Transaksi_model")->getTransaksiBySiswaId($siswa['id_siswa']),
        ];
        $this->view("templates/header");
        $this->view("home/index", $data);
        $this->view("templates/footer");
    }
}