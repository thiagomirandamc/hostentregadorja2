<?php

include ('../conexao2.php');

/*$idcliente = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_clioport = "SELECT * FROM clientecarteira WHERE idclientecarteira = '$idcliente'";
$resultado_oport = mysqli_query($conexao, $result_clioport);
$row_oportusuario = mysqli_fetch_assoc($resultado_oport);
 $numerofinanceiro = $row_oportusuario['numerofinanceiro'];
 $nomecliente = $row_oportusuario['nomeclientecarteira'];*/

 $nomecliente = $_POST['nomecliente'];
$contato = $_POST['contato'];
$logradouro = $_POST['logradouro'];
$referencia = $_POST['referencia'];

$bairro = $_POST['bairro'];
$result_clioport2 = "SELECT * FROM bairros WHERE nome = '$bairro'";
$resultado_oport2 = mysqli_query($conexao2, $result_clioport2);
$row_oportusuario2 = mysqli_fetch_assoc($resultado_oport2);
 $idbairro = $row_oportusuario2['idbairro'];
 $valorbairro = $row_oportusuario2['valor'];

$sql2 = "INSERT INTO clientes (nome, contato, logradouro, idbairro, referencia)  VALUES ('$nomecliente', '$contato', '$logradouro', '$idbairro', '$referencia')";
$resultados = mysqli_query($conexao2, $sql2);

$result = "SELECT * FROM clientes WHERE nome = '$nomecliente'";
$resultado = mysqli_query($conexao2, $result);
$row = mysqli_fetch_assoc($resultado);
 $idcliente = $row['idcliente'];

$status = "Aberta";
$sql = "INSERT INTO entregas (status, idcliente, logradouro, idbairro, referencia, dataehorapedida)  VALUES ('$status', '$idcliente', '$logradouro', '$idbairro', '$referencia', NOW())";
$resul = mysqli_query($conexao2, $sql);
                

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://systemwayautomacao-api.mandeumzap.com.br/v1/messages",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "{\n\t\"number\": \"559191950996\",\n\t\"userId\": \"7fd6c52c-28af-4185-98d7-2c4287507476\",\n\t\"serviceId\": \"2a9c5a20-58ba-4432-97c7-9ec65e486aea\",\n\t\"text\": \"*Entrega:* 1 *Estabelecimento:* Top Mix \\n*Endereço:* $logradouro \\n*Bairro:* $bairro \\n*Ponto de Referência*: $referencia \\n*Valor*: R$$valorbairro \\n.\\O Entregador que queira por favor acessar o link: \\nwww.linkdeexemplo.com.br/aceitar    \"\n\t\n}",
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer f04b8e839f764532ffee75fd05ebeaa59bf6b0c1",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


header('Location: solicitaentrega.php');


$conexao->close(); 


exit;

 ?>