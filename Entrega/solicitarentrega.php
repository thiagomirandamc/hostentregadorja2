<?php

include ('../conexao2.php');
session_start();
include ('../login/verifica_login.php');

$saberlink = "SELECT * FROM link";
$relink = mysqli_query($conexao2, $saberlink );
$rolinksaber = mysqli_fetch_assoc($relink);
 $link = $rolinksaber['nome'];

/*$idcliente = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_clioport = "SELECT * FROM clientecarteira WHERE idclientecarteira = '$idcliente'";
$resultado_oport = mysqli_query($conexao, $result_clioport);
$row_oportusuario = mysqli_fetch_assoc($resultado_oport);
 $numerofinanceiro = $row_oportusuario['numerofinanceiro'];
 $nomecliente = $row_oportusuario['nomeclientecarteira'];*/

 $nomecliente = $_POST['nomecliente'];
$contato = $_POST['contato'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$observacoes = $_POST['observacoes'];
$referencia = $_POST['referencia'];
$nomeestabelecimento = $_SESSION['nome'];

if (isset($logradouro) && ($numero))  { 
  


$resuesta = "SELECT * FROM usuario WHERE nome = '$nomeestabelecimento'";
$resuleta = mysqli_query($conexao2, $resuesta);
$row_oporest = mysqli_fetch_assoc($resuleta);
 $idestabelecimento = $row_oporest['usuario_id'];
 $wppestabelecimento = $row_oporest['whatsapp'];


$bairro = $_POST['bairro'];
$result_clioport2 = "SELECT * FROM bairros WHERE nome = '$bairro'";
$resultado_oport2 = mysqli_query($conexao2, $result_clioport2);
$row_oportusuario2 = mysqli_fetch_assoc($resultado_oport2);
 $idbairro = $row_oportusuario2['idbairro'];
 $valorbairro = $row_oportusuario2['valor'];

$status = "Aberta";
$sql = "INSERT INTO entregas (status, logradouro, idbairro, idestabelecimento, referencia, dataehorapedida, valor, numero, complemento, observacoes)  VALUES ('$status', '$logradouro', '$idbairro', '$idestabelecimento', '$referencia', NOW(), '$valorbairro', '$numero', '$complemento', '$observacoes')";
$resul = mysqli_query($conexao2, $sql);
       
$sql22 = "Select * from entregas Order by identrega DESC";
$exc = mysqli_query($conexao2, $sql22);
$resultado = mysqli_fetch_array($exc);
$entrega_atual = $resultado['identrega'];

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://systemwayautomacao-api.mandeumzap.com.br/v1/messages",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "{\n\t\"serviceId\": \"4d0dc0d0-1f41-4ce6-ae1a-4a30bc213ddd\",\n\t\"contactId\": \"2f0864f1-80f8-454a-a83f-230314c3936b\",\n\t\"text\": \"*Entregador Já* \\n*Nova entrega!* \\n*Entrega ID:* $entrega_atual \\n*Estabelecimento:* $nomeestabelecimento \\n*Endereço:* $logradouro , $numero \\n*Complemento:* $complemento \\n*Bairro:* $bairro \\n*Ponto de Referência*: $referencia \\n*Valor*: R$$valorbairro \\n*Observações:* $observacoes \\n. \\nEntregadores para aceitar, acessar o link abaixo \\nhttps://$link.entregadorja.com.br/Entrega/aceiteentregador.php?identrega=$entrega_atual  \"\n\t\n}",
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
  CURLOPT_POSTFIELDS => "{\n\t\"number\": \"55$wppestabelecimento\",\n\t\"userId\": \"dd38ff04-d20b-4e09-b023-b65b4f84301a\",\n\t\"serviceId\": \"4d0dc0d0-1f41-4ce6-ae1a-4a30bc213ddd\","
    . "\n\t\"text\": \"*Entregador Já* \\n*Solicitação de entrega!* \\n*Entrega ID:* $entrega_atual \\n*Estabelecimento:* $nomeestabelecimento \\n*Endereço:* $logradouro , $numero \\n*Complemento:* $complemento \\n*Bairro:* $bairro \\n*Ponto de Referência*: $referencia \\n*Valor*: R$$valorbairro \\n*Observações:* $observacoes \\n. \\nSe você precisar consultar ou cancelar a entrega, acesse abaixo: \\nhttps://$link.entregadorja.com.br/Entrega/aceiteentregador.php?identrega=$entrega_atual  \"\n\t\n}",
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer f04b8e839f764532ffee75fd05ebeaa59bf6b0c1",
    "Content-Type: application/json"
  ],
]);

$responses = curl_exec($curls);
$errs = curl_error($curls);

curl_close($curls);


header('Location: sucessoentrega.php');


$conexao->close(); 
exit;


} else {
  header('Location: entregaseminformacoes.php');
}

 ?>