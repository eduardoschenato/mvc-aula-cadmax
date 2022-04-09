<?php

namespace Controller;

use Model\PaisModel;
use Model\VO\PaisVO;

final class PaisController extends Controller {

    public function selectAll() {
        $model = new PaisModel();
        $data = $model->selectAll();

        $this->loadView("listaPaises", [
            "paises" => $data
        ]);
    }

    public function selectOne() {
        $id = $_GET["id"] ?? 0;

        if(empty($id)) {
            $vo = new PaisVO();
        } else {
            $model = new PaisModel();
            $vo = $model->selectOne($id);
        }

        if(!isset($vo)) {
            die("Registro não existe!");
        }

        $this->loadView("formPais", [
            "pais" => $vo
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new PaisModel();
        $vo = new PaisVO($_POST["id"], $_POST["nome"], $_POST["continente"]);

        if(empty($id)) {
            $return = $model->insert($vo);
        } else {
            $return = $model->update($vo);
        }

        $this->redirect("paises.php");
    }

    public function delete() {
        if(empty($_GET["id"])) {
            die("Necessário parrar o ID!");
        } 

        $model = new PaisModel();
        $return = $model->delete($_GET["id"]);

        $this->redirect("paises.php");
    }

}