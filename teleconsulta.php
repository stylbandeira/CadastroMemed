<?php  

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<meta charset="utf-8">
	<title></title>
		<script src="js/jquery.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap-select.min.css">
        <script src="js/bootstrap-select.min.js"></script>

        <link rel="stylesheet" type="text/css" href="css/telelconsulta.css"/>
<nav class="menu">
	<ul>
		<li><a href="index.php">Cadastro</a></li>
		<li><a href="consulta.php">Consulta</a></li>
		<li><a href="teleconsulta.php">Teleconsulta</a></li>
	</ul>
</nav>
<body>
	<div class="container">
  <div class="row">
    <div class="col-sm-4" id="tc-consulta">
      <h2 align="center">Dados do Médico</h2>
      <div class="row" align="center">
      	<button>Botão</button>
      	<button id="botaoShowPrescricao" name="botaoShowPrescricao">Botão</button>
      	<button onclick="Mudarestado('tc-receita')">Gerar Receita</button>
      </div>
    </div>
    <div class="col-sm-4" id="tc-tela">
      One of three columns
    </div>
    <div class="col-sm-4" id="memedContainer" name="memedContainer" style="">
	    <script
	    	type="text/javascript"
	    	src="https://sandbox.memed.com.br/modulos/plataforma.sinapse-prescricao/build/sinapse-prescricao.min.js"
	    	data-token="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WzMxNzU4LCJiOWJkN2FjZWQ1NmIwYmI5NzNjZWMxYTM2YmRjYjBmMCIsIjIwMjAtMTEtMTkiLCJzaW5hcHNlLnByZXNjcmljYW8iLCJwYXJ0bmVyLjMuMjcxNjAiXQ.ZeSU8PPjpPQv4YQYh1DglK9EqlcPTb7i7mNF4t7zsoo"
	    	data-color="#576cff"
	    	data-container="memedContainer">
	    </script>
    </div>
  </div>
</div>

<script>
	MdSinapsePrescricao.event.add('core:moduleInit', function moduleInitHandler(module) {

  // O módulo da prescrição foi iniciado
  if (module.name === 'plataforma.prescricao') {

    // Registrando o evento de click no elemento
    document.getElementById("botaoShowPrescricao").addEventListener("click", function () {
      MdHub.command.send('plataforma.prescricao', 'setPaciente', {
        // Nome do paciente (obrigatório)
        nome: 'José da Silva',

        // Endereço do paciente (opcional)
        endereco: 'Rua da Saúde, 123',

        // Cidade do paciente (opcional)
        cidade: 'São Paulo',

        // Telefone celular (obrigatório, DDD + digitos, somente números. NÃO ENVIAR PREFIXO "+55")
        telefone: '64651684',

        idExterno: '46561'
      }).then(function() {
        
        // Mostra o módulo de prescrição
        MdHub.module.show('plataforma.prescricao');
      });
    });
  }
});
</script>

</body>
</html>