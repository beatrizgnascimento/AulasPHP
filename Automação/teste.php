<?php
class Database {

    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Erro na conexão: " . $this->connection->connect_error);
        }
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function close() {
        $this->connection->close();
    }
}

// Uso da classe
$host = "192.168.1.106";
$username = "alunos";
$password = "alunos";
$database = "provas";

$db = new Database($host, $username, $password, $database);
$db->connect();

// Exemplo de consulta
$query = "SELECT * FROM sua_tabela";
$result = $db->query($query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        // Processar os dados
    }
} else {
    echo "Erro na consulta: " . $db->connection->error;
}

$db->close();
