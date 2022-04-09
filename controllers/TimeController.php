<?php

namespace Controller;

use Model\TimeModel;
use Model\PaisModel;
use Model\VO\TimeVO;

final class TimeController extends Controller {

    public function selectAll() {
        $model = new TimeModel();
        $data = $model->selectAll();

        $this->loadView("listaTimes", [
            "times" => $data
        ]);
    }

    public function selectOne() {
        $id = $_GET["id"] ?? 0;

        if(empty($id)) {
            $vo = new TimeVO();
        } else {
            $model = new TimeModel();
            $vo = $model->selectOne($id);
        }

        if(!isset($vo)) {
            die("Registro não existe!");
        }

        $paisModel = new PaisModel();
        $paises = $paisModel->selectAll();

        $this->loadView("formTime", [
            "time" => $vo,
            "paises" => $paises
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new TimeModel();
        $vo = new TimeVO($_POST["id"], $_POST["nome"], $_POST["idPais"]);

        if(empty($id)) {
            $return = $model->insert($vo);
        } else {
            $return = $model->update($vo);
        }

        $this->redirect("times.php");
    }

    public function delete() {
        if(empty($_GET["id"])) {
            die("Necessário parrar o ID!");
        } 

        $model = new TimeModel();
        $return = $model->delete($_GET["id"]);

        $this->redirect("times.php");
    }

}