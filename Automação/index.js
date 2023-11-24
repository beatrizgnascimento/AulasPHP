const venom = require('venom-bot');
const mysql = require('mysql2');
venom
  .create({
    session: 'provas' //name of session
  })
  .then((client) => start(client))
  .catch((erro) => {
    console.log(erro);
  });

function start(client) {
  //chama a função envia mensagem de 5 em 5 segundos
  setInterval(() => {
    enviarMensagem(client);
  }, 50000);

}

function enviarMensagem(client) {
  const connection = mysql.createConnection({
    host: '34.95.178.55',
    user: 'root',
    password: '',
    database: 'provas'
  });

  connection.connect(function (err) {
    console.log("Connected!");
  });
  connection.query(
    'SELECT * FROM provas WHERE dataDeAviso = CURDATE()',
    function (err, results, fields) {
      console.log(results); // results contains rows returned by server
      //manda mensagem para cada resultado
      if(results.length > 0){
      results.forEach(result => {
        var data = result.dataDaProva;
        var dia = data.getDate();
        var mes = data.getMonth() + 1;
        var ano = data.getFullYear();
        var dataFormatada = dia + '/' + mes + '/' + ano;
        if (result.avisado == 0 || result.avisado == null) {
          client
            .sendText(result.telefone + '@c.us', '' + result.nomeAluno + ', você tem uma prova  no dia ' + dataFormatada + ' da materia '+ result.materia + ' vai estudar CASOSBAHIO' )
            .then((result) => {
              console.log('Result: ', result); //retorna o resultado
            })
            .catch((erro) => {
              console.error('Error when sending: ', erro); //retorna o erro
            });
          connection.query(
            'UPDATE provas SET avisado = 1 WHERE idprovas = ' + result.idprovas,
            function (err, results, fields) {
              console.log(results); // results contains rows returned by server
              // console.log(fields); // fields contains extra meta data about results, if available
            }
          );
        }
      }
      );
    }
    }
  );
}