<?php
$dir = '../';
session_start();
include('../conexao2.php');

/*vincular os campos do formulario com o banco*/
$nome = mysqli_real_escape_string($conexao2, trim($_POST['nome']));
$usuario = mysqli_real_escape_string($conexao2, trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao2, trim(md5($_POST['senha'])));
$nomepermissao = mysqli_real_escape_string($conexao2, trim($_POST['permissao']));
$status = "Ativo";
$resuesta = "SELECT * FROM permissao WHERE cargo = '$nomepermissao'";
$resuleta = mysqli_query($conexao2, $resuesta);
$row_oporest = mysqli_fetch_assoc($resuleta);
 $idpermissao = $row_oporest['idpermissao'];

 $nomeusuario = $_SESSION['nome'];
 	$resuesta = "SELECT * FROM usuario WHERE nome = '$nomeusuario'";
	$resuleta = mysqli_query($conexao2, $resuesta);
	$row_oporest = mysqli_fetch_assoc($resuleta);
 	$idusuario = $row_oporest['usuario_id'];
	$idcooperativa = $row_oporest['idcooperativa'];

/* verificar se não já tem o usuario que quer cadastrar e bloquear*/
$sql = "select count(*) as total from usuario where usuario = '$usuario'";
$result = mysqli_query($conexao2, $sql);
$row = mysqli_fetch_assoc($result);

/*se o banco retornar com 1 linha afetada, redireciona pro cliente fazer outro cadastro */
if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastrouser.php');
	exit;
}

$sql = "INSERT INTO usuario (nome, status, usuario, idcooperativa, senha, data_cadastro, permissao, idquemcadastrou) VALUES ('$nome', '$status', '$usuario', '$idcooperativa', '$senha', NOW(), '$idpermissao', '$idusuario')";

if($conexao2->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao2->close();

header('Location: cadastrouser.php');
exit;
?>