<?php
$dir = '../';
session_start();
include('../conexao2.php');

/*vincular os campos do formulario com o banco*/
$cpfoucnpj = mysqli_real_escape_string($conexao2, trim($_POST['cpfoucnpj']));
$senha = mysqli_real_escape_string($conexao2, trim(md5($_POST['senha'])));




/* verificar se não já tem o usuario que quer cadastrar e bloquear*/
$sql = "select count(*) as total from usuario where cpfoucnpj = '$cpfoucnpj'";
$result = mysqli_query($conexao2, $sql);
$row = mysqli_fetch_assoc($result);

/*se o banco retornar com 1 linha afetada, redireciona ai faz a alteracao */
if($row['total'] == 1) {

	$sql20 = "UPDATE usuario  SET senha = '$senha' WHERE cpfoucnpj = '$cpfoucnpj'";

$exec = mysqli_query($conexao2, $sql20);
	
}



if($conexao2->query($exec) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao2->close();

header('Location: ../index.php');
exit;
?>