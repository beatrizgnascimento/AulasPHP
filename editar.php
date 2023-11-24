<?php


namespace App;

include 'Banco.php';

$banco = new Banco();
$id = $_GET['idprovas'];
$prova = $banco->pegaProva($id);

?>

<form action="editarControle.php" method="post">
    <label for="nomeAluno">Nome do Aluno</label>
    <input type="text" name="nomeAluno" id="nomeAluno" required value= "<?php echo $prova['nomeAluno'] ?>">
    <label for="materia">Matéria</label>
    <input type="text" name="materia" id="materia" required value= "<?php echo $prova['materia']?>">
    <label for="dataDaProva">Data da Prova</label>
    <input type="date" name="dataDaProva" id="dataDaProva" required value= "<?php echo $prova['dataDaProva']?>">
    <label for="dataDeAviso">Data de Aviso</label>
    <input type="date" name="dataDeAviso" id="dataDeAviso" required value= "<?php echo $prova['dataDeAviso']?>">
    <label for="telefone">Telefone</label>
    <input type="text" name="telefone" id="telefone" required value= "<?php echo $prova['telefone']?>">
    <input type="hidden" name="idprovas" id="idprovas" required value= "<?php echo $prova['idprovas'] ?>">
    <input type="submit" value="Salvar">
</form>