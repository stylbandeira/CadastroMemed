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
	//var_dump($gravados);
	$jsonMemed = $cadastro->jsonPostCadastro($gravados);

	//echo $jsonMemed;

	try {
		$cadastro->postJsonMemed($jsonMemed, "sandbox.api.memed.com.br", "iJGiB4kjDGOLeDFPWMG3no9VnN7Abpqe3w1jEFm6olkhkZD6oSfSmYCm", "Xe8M5GvBGCr4FStKfxXKisRo3SfYKI7KrTMkJpCAstzu2yXVN4av5nmL");

		//$cadastro->postPostman();
		
	} catch (Exception $e) {
		throw new Exception("Não foi para a Memed", 1);
		
		
	}
	
		

}


 ?>