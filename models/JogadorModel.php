<?php

namespace Model;

use Model\Vo\JogadorVO;
use Util\Database;

final class JogadorModel extends Model {

    public function selectAll() {
        $db = new Database();
        $query = "SELECT j.*, p.nome AS nomePais, t.nome AS nomeTime 
        FROM jogadores j 
        LEFT JOIN paises p ON p.id = j.idPais 
        LEFT JOIN times t ON t.id = j.idTime";
        
        $data = $db->select($query);

        $arrJogadores = [];

        foreach($data as $row) {
            array_push($arrJogadores, new JogadorVO($row["id"], $row["nome"], $row["posicao"], $row["overall"], $row["idPais"], $row["idTime"], $row["nomePais"], $row["nomeTime"]));
        }

        return $arrJogadores;
    }

    public function selectOne($id) {
        $db = new Database();
        $query = "SELECT j.*, p.nome AS nomePais, t.nome AS nomeTime  
        FROM jogadores j 
        LEFT JOIN paises p ON p.id = j.idPais 
        LEFT JOIN times t ON t.id = j.idTime 
        WHERE j.id = :id";
        
        $binds = [":id" => $id];
        $data = $db->select($query, $binds);

        if(count($data) == 0) {
            return null;
        }

        $jogador = new JogadorVO($data[0]["id"], $data[0]["nome"], 
        $data[0]["posicao"], $data[0]["overall"], 
        $data[0]["idPais"], $data[0]["idTime"], 
        $data[0]["nomePais"], $data[0]["nomeTime"]);
        
        return $jogador;
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO jogadores (nome, posicao, overall, idPais, idTime) 
        VALUES (:nome, :posicao, :overall, :idPais, :idTime)";
        $binds = [
            ":nome" => $vo->getNome(), 
            ":posicao" => $vo->getPosicao(), 
            ":overall" => $vo->getOverall(), 
            ":idPais" => $vo->getIdPais(), 
            ":idTime" => $vo->getIdTime()
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
        $query = "UPDATE jogadores SET nome = :nome, posicao = :posicao, 
        overall = :overall, idPais = :idPais, idTime = :idTime WHERE id = :id";
        $binds = [
            ":nome" => $vo->getNome(), 
            ":posicao" => $vo->getPosicao(), 
            ":overall" => $vo->getOverall(), 
            ":idPais" => $vo->getIdPais(), 
            ":idTime" => $vo->getIdTime(), 
            ":id" => $vo->getId()
        ];

        return $db->execute($query, $binds);
    }

    public function delete($id) {
        $db = new Database();
        $query = "DELETE FROM jogadores WHERE id = :id";
        $binds = [":id" => $id];

        return $db->execute($query, $binds);
    }

}