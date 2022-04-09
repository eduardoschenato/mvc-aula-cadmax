<?php

namespace Controller;

use Model\UsuarioModel;
use Model\VO\UsuarioVO;

final class LoginController extends Controller {

    public function __construct() {
        parent::__construct(false);
    }

    public function login() {
        $this->loadView("login");
    }

    public function fazerLogin() {
        $vo = new UsuarioVO(0, "", $_POST["login"], $_POST["senha"]);
        $model = new UsuarioModel();

        $voLogado = $model->selectLogin($vo);

        if(isset($voLogado)) {
            session_start();
            $_SESSION["usuario"] = $voLogado;

            $this->redirect("jogadores.php");
        } else {
            $this->redirect("login.php");
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        $this->redirect("login.php");
    }

}