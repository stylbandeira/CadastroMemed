<?php 
require_once "Classes/Cadastro.php";
session_start();

function getTokenMedico(){
	echo "AAAA";
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
		<script src="js/jquery.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap-select.min.css">
        <script src="js/bootstrap-select.min.js"></script>
<body>
	<nav class="menu">
		<ul>
			<li><a href="index.php">Cadastro</a></li>
			<li><a href="consulta.php">Consulta</a></li>
		</ul>
	</nav>


		<label>Código do Médico</label>
		<input type="number" name="id_medico" id="id_medico">
		<button>VERIFICAR</button>
	<div id="codigo">
		
	</div>

</body>

<script>
	$(document).ready(function(){
		$("button").click(function(){
			var id_medico = $("input").val();
			$.post("carrega_dados.php", {
				codigo: id_medico
			}, function(data, status){
				$("#codigo").html(data);
			});
		});
	});
</script>

</html>