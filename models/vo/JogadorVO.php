<?php

namespace Model\VO;

final class JogadorVO extends VO {

    private $nome;
    private $posicao;
    private $overall;
    private $idPais;
    private $idTime;
    private $nomePais;
    private $nomeTime;

    public function __construct($id = 0, $nome = "", $posicao = "", $overall = 0, $idPais = null, $idTime = null, $nomePais = "", $nomeTime = "") {
        parent::__construct($id);
        $this->nome = $nome;
        $this->posicao = $posicao;
        $this->overall = $overall;
        $this->idPais = $idPais;
        $this->idTime = $idTime;
        $this->nomePais = $nomePais;
        $this->nomeTime = $nomeTime;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getPosicao() {
        return $this->posicao;
    }

    public function setPosicao($posicao) {
        $this->posicao = $posicao;
    }

    public function getOverall() {
        return $this->overall;
    }

    public function setOverall($overall) {
        $this->overall = $overall;
    }

    public function getIdPais() {
        return $this->idPais;
    }

    public function setIdPais($idPais) {
        $this->idPais = $idPais;
    }

    public function getIdTime() {
        return $this->idTime;
    }

    public function setIdTime($idTime) {
        $this->idTime = $idTime;
    }

    public function getNomePais() {
        return $this->nomePais;
    }

    public function setNomePais($nomePais) {
        $this->nomePais = $nomePais;
    }

    public function getNomeTime() {
        return $this->nomeTime;
    }

    public function setNomeTime($nomeTime) {
        $this->nomeTime = $nomeTime;
    }

}