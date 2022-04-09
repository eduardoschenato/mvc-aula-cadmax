<?php

namespace Model\VO;

final class TimeVO extends VO {

    private $nome;
    private $idPais;
    private $nomePais;

    public function __construct($id = 0, $nome = "", $idPais = null, $nomePais = "") {
        parent::__construct($id);
        $this->nome = $nome;
        $this->idPais = $idPais;
        $this->nomePais = $nomePais;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getIdPais() {
        return $this->idPais;
    }

    public function setIdPais($idPais) {
        $this->idPais = $idPais;
    }

    public function getNomePais() {
        return $this->nomePais;
    }

    public function setNomePais($nomePais) {
        $this->nomePais = $nomePais;
    }

}