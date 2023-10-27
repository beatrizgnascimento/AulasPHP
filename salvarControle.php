<?php

namespace App;

$nomeAluno = $_POST['nomeAluno'];
$materia = $_POST["materia"];
$dataDeAviso = $_POST["dataDeAviso"];
$dataDaProva = $_POST["dataDaProva"];
$telefone = $_POST["telefone"];



$banco = new Banco();
$prova = new Prova($nomeAluno, $materia, $dataDaProva, $dataDeAviso,  $telefone);
$banco->salvaProva($prova);
header("Location: index.php");
?>
