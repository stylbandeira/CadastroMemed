<?php
class Cadastro{
	private $estado;
	private $cidade;
	private $especialidade;
	private $estados = array();
	private $cidades = array();
	private $especialidades = array();

	public function getCidade(){
		return $this->cidade;
	}

	public function setCidade($cidade){
		$this->cidade = $cidade;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public static function teste(){
		
	}

	public static function populaEstados(){
		$url = "https://servicodados.ibge.gov.br/api/v1/localidades/estados";
		$json = file_get_contents($url);
		$resultado = json_decode($json, 1);

		return $resultado;
	}

	public function populaEspecialidades(){
		$url = "https://api.memed.com.br/v1/especialidades";
		$json = file_get_contents($url);
		$especialidades = json_decode($json, 1);

		foreach ($especialidades['data'] as $key => $value) {
			$arrayEspecialidades['sigla'] = "esp-0".$value['id'];
			$arrayEspecialidades['nome'] = $value['attributes']['nome'];
			

			array_push($this->especialidades, $arrayEspecialidades);
		}
		$resultado = $this->especialidades;

		return $resultado;
	}

	public function populaCidades($estado){
		
		$url = "http://api.memed.com.br/v1/cidades?filter[uf]=".$estado."&page[limit]=1000&page[offset]=5";
		$json = file_get_contents($url);
		$resultado = json_decode($json, 1);

		foreach ($resultado['data'] as $key => $value) {
			//$result = json_encode($value['attributes']['nome']);
			$arrayCidades['nome'] = $value['attributes']['nome'];
			$arrayCidades['sigla'] = $value['attributes']['uf'];
			
			array_push($this->cidades, $arrayCidades);
			//echo "<option id=".$value['attributes']['uf'].">".$value['attributes']['nome']."</option>";
		}
		return $this->cidades;
		//var_dump(json_encode($this->cidades, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
		//return $result;
	}


}
 ?>
