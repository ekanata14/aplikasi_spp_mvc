<?php

class Auth extends Controller{
    public function index(){
        $this->view("templates/header");
        $this->view("auth/index");
        $this->view("templates/footer");
    }

    public function loginAct(){
        if($this->model("User_model")->authUser($_POST) > 0){
            $user = $this->model("User_model")->getUserByUsername($_POST['username']);
            $_SESSION['user'] = [
                'id' => $user['id_pengguna'],
                'username' => $user['username'],
                'role' => $user['role'],
                'login' => true
            ];
            if($user['role'] == '0' || $user['role'] == '1'){
                Redirect::to("/admin");
            } else{
                Redirect::to("/home");
            }
        } else{
            Redirect::to("/auth");
        }
    }

    public function logout(){
        session_unset();
        session_destroy();
        Redirect::to("/auth");
    }

}