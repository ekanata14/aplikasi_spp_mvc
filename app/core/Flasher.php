<?php

class Flasher{
    public static function setFlash($message, $type){
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public static function flash(){
        if(isset($_SESSION['flash'])){
        echo '
        <div class="col-12 d-flex justify-content-start px-0">
            <div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show col-6" role="alert">
                ' . $_SESSION['flash']['message'] . '
                <button class="close" type="button" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>';
        }
        unset($_SESSION['flash']);
    }
}