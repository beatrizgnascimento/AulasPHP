<?php

namespace App;

include "Banco.php";

$banco = new Banco();
$id = $_GET['idprovas'];

$banco->deletaProva($id);
header('Location: index.php');