//instancia de conexão com o banco de dados

const mysql = require('mysql2');

const connection = mysql.createConnection({
    host: '192.168.1.106',
    user: 'alunos',
    password: 'alunos',
    database: 'provas'
  });

connection.connect(function(err) {
    console.log("Connected!");
});


//função para pegar as provas do banco de dados
function getProvas(){
    connection.query(
        'SELECT * FROM provas',
        function(err, results, fields) {
            console.log(results); // results contains rows returned by server
            // console.log(fields); // fields contains extra meta data about results, if available
        }
    );
}

const provas = getProvas();

console.log(provas);
