<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://sandbox.api.memed.com.br/v1/sinapse-prescricao/usuarios?api-key=iJGiB4kjDGOLeDFPWMG3no9VnN7Abpqe3w1jEFm6olkhkZD6oSfSmYCm&secret-key=Xe8M5GvBGCr4FStKfxXKisRo3SfYKI7KrTMkJpCAstzu2yXVN4av5nmL",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n        \"data\": {\n         \"type\": \"usuarios\",\n          \"attributes\": {\n              \"external_id\": \"159852\",\n              \"nome\": \"José\",\n              \"sobrenome\": \"da Silva\",\n              \"data_nascimento\": \"01/01/1985\",\n              \"cpf\": \"084.327.694-01\",\n              \"email\": \"meu@email.com.br\",\n              \"uf\": \"SP\",\n              \"sexo\": \"M\",\n              \"crm\": \"54321\"\n          },\n          \"relationships\": {\n           \"cidade\": {\n              \"data\": { \"type\": \"cidades\", \"id\": \"5213\" }\n            },\n           \"especialidade\": {\n              \"data\": { \"type\": \"especialidades\", \"id\": \"50\" }\n            }\n          }\n        }\n }",
  CURLOPT_HTTPHEADER => array(
    "Accept: application/vnd.api+json",
    "Cache-Control: no-cache",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
