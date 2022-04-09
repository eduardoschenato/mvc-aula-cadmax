<?php

namespace Model;

use Model\Vo\TimeVO;
use Util\Database;

final class TimeModel extends Model {

    public function selectAll() {
        $db = new Database();
        $query = "SELECT t.*, p.nome AS nomePais FROM times t LEFT JOIN paises p ON p.id = t.idPais";
        $data = $db->select($query);

        $arrTimes = [];

        foreach($data as $row) {
            array_push($arrTimes, new TimeVO($row["id"], $row["nome"], $row["idPais"], $row["nomePais"]));
        }

        return $arrTimes;
    }

    public function selectOne($id) {
        $db = new Database();
        $query = "SELECT t.*, p.nome AS nomePais FROM times t LEFT JOIN paises p ON p.id = t.idPais WHERE t.id = :id";
        $binds = [":id" => $id];
        $data = $db->select($query, $binds);

        if(count($data) == 0) {
            return null;
        }

        $time = new TimeVO($data[0]["id"], $data[0]["nome"], $data[0]["idPais"], $data[0]["nomePais"]);
        return $time;
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO times (nome, idPais) VALUES (:nome, :idPais)";
        $binds = [
            ":nome" => $vo->getNome(), 
            ":idPais" => $vo->getIdPais()
        ];

        $success = $db->execute($query, $binds);

        if($success) {
            return $db->getLastInsertedId();
        } else {
            return null;
        }
    }

    public function update($vo) {
        $db = new Database();
        $query = "UPDATE times SET nome = :nome, idPais = :idPais WHERE id = :id";
        $binds = [
            ":nome" => $vo->getNome(),  
            ":idPais" => $vo->getIdPais(), 
            ":id" => $vo->getId()
        ];

        return $db->execute($query, $binds);
    }

    public function delete($id) {
        $db = new Database();
        $query = "DELETE FROM times WHERE id = :id";
        $binds = [":id" => $id];

        return $db->execute($query, $binds);
    }

}