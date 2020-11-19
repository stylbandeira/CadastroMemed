<?php 
require_once "Classes/Cadastro.php";
session_start();
$cadastro = new Cadastro();
if (isset($_POST["tipo"])) {
	if ($_POST["tipo"] == "especialidade") {
		echo json_encode($cadastro->populaEspecialidades());
	}
	else if ($_POST["tipo"] == "estados") {
		echo json_encode(Cadastro::populaEstados());
	} else {
		$cat_id = $_POST["cat_id"];
		echo json_encode($cadastro->populaCidades($cat_id));
	}
}

if (isset($_POST['codigo'])) {
		$id_medico = $_POST['codigo'];
		$token = $cadastro->getTokenUsuario($id_medico);
        $_SESSION['Token'] = $token;
    }
 ?>