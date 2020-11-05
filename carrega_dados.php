<?php 
require "Classes/Cadastro.php";
$cadastro = new Cadastro();
if (isset($_POST["tipo"])) {
	if ($_POST["tipo"] == "especialidade") {
		echo json_encode($cadastro->populaEspecialidades());
	}
	if ($_POST["tipo"] == "estados") {
		echo json_encode(Cadastro::populaEstados());
	} else {
		$cat_id = $_POST["cat_id"];
		echo json_encode($cadastro->populaCidades($cat_id));
	}
}
 ?>