<?php

namespace Model;

use Model\Vo\UsuarioVO;
use Util\Database;

final class UsuarioModel extends Model {

    public function selectAll() {
        $db = new Database();
        $query = "SELECT * FROM usuarios";
        $data = $db->select($query);

        $arrUsuarios = [];

        foreach($data as $row) {
            array_push($arrUsuarios, new UsuarioVO($row["id"], 
            $row["nome"], $row["login"], $row["senha"]));
        }

        return $arrUsuarios;
    }

    public function selectOne($id) {
        $db = new Database();
        $query = "SELECT * FROM usuarios WHERE id = :id";
        $binds = [":id" => $id];
        $data = $db->select($query, $binds);

        if(count($data) == 0) {
            return null;
        }

        $usuario = new UsuarioVO($data[0]["id"], $data[0]["nome"], 
        $data[0]["login"], $data[0]["senha"]);
        return $usuario;
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO usuarios (nome, login, senha) 
        VALUES (:nome, :login, :senha)";
        $binds = [
            ":nome" => $vo->getNome(), 
            ":login" => $vo->getLogin(), 
            ":senha" => sha1($vo->getSenha())
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
        $binds = [
            ":nome" => $vo->getNome(),  
            ":login" => $vo->getLogin(), 
            ":id" => $vo->getId()
        ];

        if(empty($vo->getSenha())) {
            $query = "UPDATE usuarios SET nome = :nome, 
            login = :login WHERE id = :id";
        } else {
            $query = "UPDATE usuarios SET nome = :nome, 
            login = :login, senha = :senha WHERE id = :id";
            $binds[":senha"] = sha1($vo->getSenha());
        }

        return $db->execute($query, $binds);
    }

    public function delete($id) {
        $db = new Database();
        $query = "DELETE FROM usuarios WHERE id = :id";
        $binds = [":id" => $id];

        return $db->execute($query, $binds);
    }

    public function selectLogin($vo) {
        $db = new Database();
        $query = "SELECT * FROM usuarios WHERE login = :login 
        AND senha = :senha";

        $binds = [
            ":login" => $vo->getLogin(),
            ":senha" => sha1($vo->getSenha())
        ];

        $data = $db->select($query, $binds);

        if(count($data) == 0) {
            return null;
        }

        $usuario = new UsuarioVO($data[0]["id"], $data[0]["nome"], 
        $data[0]["login"], $data[0]["senha"]);

        return $usuario;
    }

}