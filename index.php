<?php
namespace App;

//require_once "salvarControle.php";
require 'Banco.php';
require 'Prova.php';
?>


<html>

<form action="salvarControle.php" method="post">
    <label for="nomeAluno">Nome do Aluno</label>
    <input type="text" name="nomeAluno" id="nomeAluno" required>
    <label for="materia">Matéria</label>
    <input type="text" name="materia" id="materia" required>
    <label for="dataDaProva">Data da Prova</label>
    <input type="date" name="dataDaProva" id="dataDaProva" required>
    <label for="dataDeAviso">Data de Aviso</label>
    <input type="date" name="dataDeAviso" id="dataDeAviso" required>
    <label for="telefone">Telefone</label>
    <input type="text" name="telefone" id="telefone" required>
    <input type="submit" value="Salvar">
</form>


<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Materia</th>
        <th>Data da prova</th>
        <th>Data de aviso</th>
        <th>Telefone</th>
    </tr>

    <?php

  $banco = new Banco();
  $resultado = $banco->listarProvas();
  var_dump($banco);
    while($prova = mysqli_fetch_assoc($resultado)){
        echo "<tr>";
        echo "<td>".$prova['idprovas']."</td>";
        echo "<td>".$prova['nomeAluno']."</td>";
        echo "<td>".$prova['materia']."</td>";
        echo "<td>".$prova['dataDaProva']."</td>";
        echo "<td>".$prova['dataDeAviso']."</td>";
        echo "<td>".$prova['telefone']."</td>";
        echo "</tr>";
    }
?>


</table>

</html>
