<?php

namespace Controller;

use Model\JogadorModel;
use Model\TimeModel;
use Model\PaisModel;
use Model\VO\JogadorVO;

final class JogadorController extends Controller {

    public function selectAll() {
        $model = new JogadorModel();
        $data = $model->selectAll();

        $this->loadView("listaJogadores", [
            "jogadores" => $data
        ]);
    }

    public function selectOne() {
        $id = $_GET["id"] ?? 0;

        if(empty($id)) {
            $vo = new JogadorVO();
        } else {
            $model = new JogadorModel();
            $vo = $model->selectOne($id);
        }

        if(!isset($vo)) {
            die("Registro não existe!");
        }

        $paisModel = new PaisModel();
        $paises = $paisModel->selectAll();

        $timeModel = new TimeModel();
        $times = $timeModel->selectAll();

        $this->loadView("formJogador", [
            "jogador" => $vo,
            "paises" => $paises,
            "times" => $times
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new JogadorModel();
        $vo = new JogadorVO($_POST["id"], $_POST["nome"], $_POST["posicao"], $_POST["overall"], $_POST["idPais"], $_POST["idTime"]);

        if(empty($id)) {
            $return = $model->insert($vo);
        } else {
            $return = $model->update($vo);
        }

        $this->redirect("jogadores.php");
    }

    public function delete() {
        if(empty($_GET["id"])) {
            die("Necessário passar o ID!");
        } 

        $model = new JogadorModel();
        $return = $model->delete($_GET["id"]);

        $this->redirect("jogadores.php");
    }

}