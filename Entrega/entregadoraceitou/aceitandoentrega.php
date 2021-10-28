<?php

include ('../../conexao2.php');
session_start();
include ('../../login/verifica_login.php');

/*$idcliente = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_clioport = "SELECT * FROM clientecarteira WHERE idclientecarteira = '$idcliente'";
$resultado_oport = mysqli_query($conexao, $result_clioport);
$row_oportusuario = mysqli_fetch_assoc($resultado_oport);
 $numerofinanceiro = $row_oportusuario['numerofinanceiro'];
 $nomecliente = $row_oportusuario['nomeclientecarteira'];*/

 $nomesessao = $_SESSION['nome'];
$resuesta = "SELECT * FROM usuario WHERE nome = '$nomesessao'";
$resuleta = mysqli_query($conexao2, $resuesta);
$row_oporest = mysqli_fetch_assoc($resuleta);
 $identregador = $row_oporest['usuario_id'];
 $wppentregador = $row_oporest['whatsapp'];

 


 $identrega = $_POST['identrega'];
  $resent = "SELECT * FROM entregas WHERE identrega = '$identrega'";
  $reentr = mysqli_query($conexao2, $reentr);
  $row_opentreg = mysqli_fetch_assoc($resuleta);
  $idestabelecimento = $row_opentreg['idestabelecimento'];
    $reestb = "SELECT * FROM usuario WHERE usuario_id = '$idestabelecimento'";
    $resuestbc = mysqli_query($conexao2, $reestb);
    $row_estd = mysqli_fetch_assoc($resuestbc);
    $wppestabelecimento = $row_estd['whatsapp'];

 $sql20 = "UPDATE entregas  SET identregador = '$identregador', dataehoraaceite = NOW() WHERE identrega = '$identrega'";

 $exec = mysqli_query($conexao2, $sql20);



$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://systemwayautomacao-api.mandeumzap.com.br/v1/messages",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n\t\"number\": \"55$wppentregador\",\n\t\"userId\": \"7fd6c52c-28af-4185-98d7-2c4287507476\",\n\t\"serviceId\": \"2a9c5a20-58ba-4432-97c7-9ec65e486aea\","
    . "\n\t\"text\": \"*Confirmação de entrega* \\n*Entrega ID:* $identrega \\n*Estabelecimento:* $nomeestabelecimento \\n*Endereço:* $logradouro , $numero \\n*Complemento:* $complemento \\n*Bairro:* $bairro \\n*Ponto de Referência*: $referencia \\n*Valor*: R$$valorbairro \\n*Observações:* $observacoes \\n. \\nSe você precisar consultar a entrega, acesse abaixo: \\ndev.systemwayautomacao.com.br/Entrega/aceiteentregador.php?identrega=$entrega_atual  \"\n\t\n}",
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer f04b8e839f764532ffee75fd05ebeaa59bf6b0c1",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$curls = curl_init();

curl_setopt_array($curls, [
  CURLOPT_URL => "https://systemwayautomacao-api.mandeumzap.com.br/v1/messages",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n\t\"number\": \"55$wppestabelecimento\",\n\t\"userId\": \"7fd6c52c-28af-4185-98d7-2c4287507476\",\n\t\"serviceId\": \"2a9c5a20-58ba-4432-97c7-9ec65e486aea\","
    . "\n\t\"text\": \"*O Entregado Tal aceitou sua entrega* \\n*Entrega ID:* $identrega \\n*Estabelecimento:* $nomeestabelecimento \\n*Endereço:* $logradouro , $numero \\n*Complemento:* $complemento \\n*Bairro:* $bairro \\n*Ponto de Referência*: $referencia \\n*Valor*: R$$valorbairro \\n*Observações:* $observacoes \\n. \\nSe você precisar consultar ou cancelar a entrega, acesse abaixo: \\ndev.systemwayautomacao.com.br/Entrega/aceiteentregador.php?identrega=$entrega_atual  \"\n\t\n}",
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer f04b8e839f764532ffee75fd05ebeaa59bf6b0c1",
    "Content-Type: application/json"
  ],
]);

$responses = curl_exec($curls);
$errs = curl_error($curls);

curl_close($curls);


header('Location: ../../inicial.php');


$conexao->close(); 


exit;

 ?>