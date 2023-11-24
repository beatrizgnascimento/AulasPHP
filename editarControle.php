<?php

namespace App;

require_once "Banco.php";
require_once "Prova.php";
$id = $_POST['idprovas'];

$nomeAluno = $_POST['nomeAluno'];
$materia = $_POST['materia'];
$dataDeAviso = $_POST['dataDeAviso'];
$dataDaProva = $_POST['dataDaProva'];
$telefone = $_POST['telefone'];

$banco = new Banco();
$prova = new Prova($nomeAluno,$materia,$dataDaProva,$dataDeAviso,$telefone);
$banco->atualizaProva($id, $prova);
header('Location: index.php');