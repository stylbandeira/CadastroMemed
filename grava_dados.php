<?php 
require_once "Classes/Cadastro.php";

if (isset($_POST['identificador'], $_POST['nome'], $_POST['sobrenome'])) {
	$estado = ($_POST['estados']);
	$cidade = ($_POST['cidades']);
	$id = ($_POST['identificador']);
	$nome = ($_POST['nome']);
	$sobrenome = ($_POST['sobrenome']);
	$dataNasc = ($_POST['nascimento']);
	$cpf = ($_POST['cpf']);
	$email = ($_POST['email']);
	$sexo = ($_POST['sexo']);
	$crm = ($_POST['crm']);
	$especialidade = ($_POST['especialidade']);

	$cadastro = new Cadastro();

	
}
 ?>