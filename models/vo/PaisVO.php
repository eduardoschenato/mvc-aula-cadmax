<?php

namespace Model\VO;

final class PaisVO extends VO {

    private $nome;
    private $continente;

    public function __construct($id = 0, $nome = "", $continente = "") {
        parent::__construct($id);
        $this->nome = $nome;
        $this->continente = $continente;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getContinente() {
        return $this->continente;
    }

    public function setContinente($idPais) {
        $this->continente = $continente;
    }

}