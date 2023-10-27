<?php
namespace App;

?>

<html>

    <form action="salvarControle.php" method="post">
        <label for="nomeAluno">Nome do aluno</label>
        <input type="text" name="nomeAluno" id="nomeAluno">
        <label for="materia">Materia</label>
        <input type="text" name="materia" id="materia">
        <label for="dataDeAviso">Data de aviso</label>
        <input type="date" name="dataDeAviso" id="dataDeAviso">
        <label for="dataDaProva">Data da Prova</label>
        <input type="date" name="dataDaProva" id="dataDaProva">
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone">
        <input type ="submit" value="Enviar">



    </form>
</html>