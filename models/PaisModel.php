<?php

namespace Model;

use Model\Vo\PaisVO;
use Util\Database;

final class PaisModel extends Model {

    public function selectAll() {
        $db = new Database();
        $query = "SELECT * FROM paises";
        $data = $db->select($query);

        $arrPaises = [];

        foreach($data as $row) {
            array_push($arrPaises, new PaisVO($row["id"], $row["nome"], $row["continente"]));
        }

        return $arrPaises;
    }

    public function selectOne($id) {
        $db = new Database();
        $query = "SELECT * FROM paises WHERE id = :id";
        $binds = [":id" => $id];
        $data = $db->select($query, $binds);

        if(count($data) == 0) {
            return null;
        }

        $pais = new PaisVO($data[0]["id"], $data[0]["nome"], $data[0]["continente"]);
        return $pais;
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO paises (nome, continente) VALUES (:nome, :continente)";
        $binds = [
            ":nome" => $vo->getNome(), 
            ":continente" => $vo->getContinente()
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
        $query = "UPDATE paises SET nome = :nome, continente = :continente WHERE id = :id";
        $binds = [
            ":nome" => $vo->getNome(),  
            ":continente" => $vo->getContinente(), 
            ":id" => $vo->getId()
        ];

        return $db->execute($query, $binds);
    }

    public function delete($id) {
        $db = new Database();
        $query = "DELETE FROM paises WHERE id = :id";
        $binds = [":id" => $id];

        return $db->execute($query, $binds);
    }

}