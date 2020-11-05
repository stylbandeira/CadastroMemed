<?php 
require_once "Classes/Cadastro.php";

if (isset($_POST['identificador'], $_POST['nome'], $_POST['sobrenome'])) {
	try {
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
		
	} catch (Exception $e) {
		throw new Exception("Não conseguiu", 1);
		
	}
	

	$cadastro = new Cadastro();
	$gravados = $cadastro->gravaDados($id, $nome, $sobrenome, $estado, $cidade, $dataNasc, $cpf, $email, $sexo, $crm, $especialidade);
	//PODE SER UTIL? $class_vars = get_class_vars(get_class($cadastro));


}


 ?>