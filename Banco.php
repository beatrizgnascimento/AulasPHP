<?php

namespace App;

class Banco
{
    private $host = "localhost"; #IP
    private $usuario = "root";
    private $senha = "";
    private $banco = "provas";
    private $conexao;

    public function __construct()
    {
        $this->conexao = mysqli_connect($this->host, $this->usuario, $this->senha, $this->banco);

        if (!$this->conexao) {
            throw new \Exception("Erro ao conectar ao banco de dados");
        }
    }

    public function getConexao()
    {
        return $this->conexao;
    }

    public function salvaProva($prova)
    {
        $nomeAluno = $prova->getNomeAluno();
        $materia = $prova->getMateria();
        $dataDaProva = $prova->getDataDaProva();
        $dataDeAviso = $prova->getDataDeAviso();
        $telefone = $prova->getTelefone();

        //var_dump($prova);
        $query = "INSERT INTO provas (nomeAluno, materia, dataDaProva, dataDeAviso, telefone, avisado) 
                  VALUES ('$nomeAluno', '$materia', '$dataDaProva', '$dataDeAviso', '$telefone', 0)";

        $resultado = mysqli_query($this->getConexao(), $query);


        if (!$resultado) {
            throw new \Exception("Erro ao salvar prova no banco de dados");
        }

        return $resultado;
    }

    public function deletaProva($idprovas)
    {
        $query = "DELETE FROM provas WHERE idprovas = '$idprovas'";
        $resultado = mysqli_query($this->getConexao(), $query);

        if (!$resultado) {
            throw new \Exception("Erro ao deletar prova no banco de dados");
        }

        return $resultado;
    }

    public function atualizaProva($idprovas, $provaAtualizada)
    {
        $nomeAluno = mysqli_real_escape_string($this->getConexao(), $provaAtualizada->getNomeAluno());
        $materia = mysqli_real_escape_string($this->getConexao(), $provaAtualizada->getMateria());
        $dataDaProva = mysqli_real_escape_string($this->getConexao(), $provaAtualizada->getDataDaProva());
        $dataDeAviso = mysqli_real_escape_string($this->getConexao(), $provaAtualizada->getDataDeAviso());
        $telefone = mysqli_real_escape_string($this->getConexao(), $provaAtualizada->getTelefone());

        $query = "UPDATE provas 
                  SET nomeAluno = '$nomeAluno', materia = '$materia', dataDaProva = '$dataDaProva', 
                  dataDeAviso = '$dataDeAviso', telefone = '$telefone' 
                  WHERE idprovas = '$idprovas'";

        $resultado = mysqli_query($this->getConexao(), $query);

        if (!$resultado) {
            throw new \Exception("Erro ao atualizar prova no banco de dados");
        }

        return $resultado;
    }

    public function listarProvas()
{
    $query = "SELECT * FROM provas";
    $resultado = mysqli_query($this->getConexao(), $query);

    if (!$resultado) {
        throw new \Exception("Erro ao listar provas no banco de dados");
    }

    return $resultado;
}


    public function pegaProva($idprovas)
    {
        $query = "SELECT * FROM provas WHERE idprovas = '$idprovas'";
        $resultado = mysqli_query($this->getConexao(), $query);

        if (!$resultado) {
            throw new \Exception("Erro ao buscar prova no banco de dados");
        }

        $prova = mysqli_fetch_assoc($resultado);

        return $prova;
    }

    public function fecharConexao()
    {
        mysqli_close($this->getConexao());
    }
}
