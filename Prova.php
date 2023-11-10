<?php
namespace App;
class Prova {
    private $nomeAluno;
    private $materia;
    private $dataDaProva;
    private $dataDeAviso;
    private $telefone;

    public function __construct($nomeAluno, $materia, $dataDaProva, $dataDeAviso, $telefone) {
        $this->nomeAluno = $nomeAluno;
        $this->materia = $materia;
        $this->dataDaProva = $dataDaProva;
        $this->dataDeAviso = $dataDeAviso;
        $this->telefone = $telefone;
    }

    public function getNomeAluno() {
        return $this->nomeAluno;
    }

    public function getMateria() {
        return $this->materia;
    }

    public function getDataDaProva() {
        return $this->dataDaProva;
    }

    public function getDataDeAviso() {
        return $this->dataDeAviso;
    }

    public function getTelefone() {
        return $this->telefone;
    }
}