<?php
class Cadastro{
	private $estado;
	private $cidade;
	private $especialidade;
	private $id;
	private $nome;
	private $sobrenome;
	private $dataNasc;
	private $cpf;
	private $email;
	private $sexo;
	private $uf;
	private $crm;

	private $estados = array();
	private $cidades = array();
	private $especialidades = array();

	public function getCidade(){
		return $this->cidade;
	}

	public function getEspecialidade(){
		return $this->especialidade;
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

	public function gravaDados($id, $nome, $sobrenome, $estado ='', $cidade ='', $dataNasc ='', $cpf, $email ='', $sexo, $crm = '', $especialidade){

		try {
			$this->id = $id;
			$this->nome = $nome;
			$this->sobrenome = $sobrenome;
			$this->estado = $estado;
			$this->cidade = $cidade;
			$this->dataNasc = $dataNasc;
			$this->cpf = $cpf;
			$this->email = $email;
			$this->sexo = $sexo;
			$this->crm = $crm;
			$this->especialidade = $especialidade;	
		} catch (Exception $e) {
			throw new Exception("Não foi possível gravar todas as informações", 1);
			
		}
		$dados = array(
			'external_id'=> $this->id,
			'nome'=> $this->nome,
			'sobrenome'=> $this->sobrenome,
			'data_nascimento'=> DateTime::createFromFormat('Y-m-d', $this->dataNasc)->format('d/m/Y'),
			'cpf'=> $this->cpf,
			'email'=> $this->email,
			'uf'=> $this->estado,
			'sexo'=> $this->sexo,
			'crm'=>$this->crm,
		);
		$result = $dados;//json_encode($dados, 1);
		return $result;
		/*
		FAZER CURL(POST) AQUI
		 	"ID". $this->id.
				"</br>Nome: ".$this->nome.
				"</br>Sobrenome: ".$this->sobrenome.
				"</br>Estado: ".$this->estado.
				"</br>Cidade: ".$this->cidade.
				"</br>Data de Nascimento: ".$this->dataNasc.
				"</br>CRM: ".$this->crm.
				"</br>CPF: ".$this->cpf;
		*/
	}

	public function jsonPostCadastro($dados = array()){
		$attributes = $dados;
		$especialidade = array(
			'data' => array(
				'type'=>'especialidade',
				'id'=>'50'
			)
		);
		$cidade = array(
			'data'=> array(
				'type'=>'cidades',
				'id'=>'5213'
			)
		);
		$relationships = array(
			'cidade'=> $cidade,
			'especialidade'=>$this->getEspecialidade()
		);
		

		$data = array(
			'data'=> array (
				'type'=>'usuarios',
				'attributes'=> $attributes,
				'relationships'=> $relationships,
				'especialidade'=>$especialidade
			),
		);

		return json_encode($data);

		
	}

	public function postJsonMemed($json, $dominio, $apiKey, $secretKey){
		$iniciar = curl_init('https://'.
								$dominio.'/v1/sinapse-prescricao/usuarios?api-key='.
								$apiKey.'&secret-key='.
								$secretKey);

		
		curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($iniciar, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($iniciar, CURLOPT_SSL_VERIFYPEER, 0);

		curl_setopt($iniciar, CURLOPT_POST, true);
		curl_setopt($iniciar, CURLOPT_POSTFIELDS, $json);

		if (curl_exec($iniciar) === false) {
			echo "Curl error: ".curl_error($iniciar);
		} else{
			//echo "Operação concluída";
		}	
		curl_close($iniciar);
	}


}
 ?>
