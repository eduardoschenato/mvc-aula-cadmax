<?php

namespace Controller;

use Model\UsuarioModel;
use Model\VO\UsuarioVO;

final class UsuarioController extends Controller {

    public function selectAll() {
        $model = new UsuarioModel();
        $data = $model->selectAll();

        $this->loadView("listaUsuarios", [
            "usuarios" => $data
        ]);
    }

    public function selectOne() {
        $id = $_GET["id"] ?? 0;

        if(empty($id)) {
            $vo = new UsuarioVO();
        } else {
            $model = new UsuarioModel();
            $vo = $model->selectOne($id);
        }

        if(!isset($vo)) {
            die("Registro não existe!");
        }

        $this->loadView("formUsuario", [
            "usuario" => $vo
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $senha = (!empty($_POST["senha"])) ? $_POST["senha"] : "";

        $model = new UsuarioModel();
        $vo = new UsuarioVO($_POST["id"], $_POST["nome"], 
        $_POST["login"], $senha);

        if(empty($id)) {
            $return = $model->insert($vo);
        } else {
            $return = $model->update($vo);
        }

        $this->redirect("usuarios.php");
    }

    public function delete() {
        if(empty($_GET["id"])) {
            die("Necessário parrar o ID!");
        } 

        $model = new UsuarioModel();
        $return = $model->delete($_GET["id"]);

        $this->redirect("usuarios.php");
    }

}