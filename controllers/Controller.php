<?php

namespace Controller;

abstract class Controller {

    public function __construct($obrigaLogin = true) {
        session_start();

        if($obrigaLogin) {
            if(!isset($_SESSION["usuario"])) {
                $this->redirect("login.php");
            }
        }
    }

    public function redirect($url) {
        header("Location: " . $url);
    }

    public function loadView($view, $data = []) {
        extract($data);
        include("views/" . $view . ".php");
    }

}