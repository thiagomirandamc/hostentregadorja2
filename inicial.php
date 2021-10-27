<?php
include("conexao2.php");
session_start();
?>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tela Inicial</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
 
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                   <?php 
                   $usuario = $_SESSION['nome'];
                   
                    
$cult = "SELECT * FROM usuario WHERE nome ='$usuario'";
                $execult = mysqli_query($conexao2, $cult);
              if ($execult) {
                    while ($rspl = mysqli_fetch_assoc($execult)) { 
             $permissao = $rspl['permissao']; } }    ?>                
                    
                    <?php
                    if ($permissao == '1' || $setor == '4') { ?>
                    <div class="content">
                        <a href="../solicitaentrega.php" type="button" class="button is-block is-link is-rounded is-large is-fullwidth">Solicitar Entrega</a>
                    </div> 
                    <div class="content">
                        <a href="../solicitaentrega.php" type="button" class="button is-block is-link is-rounded is-large is-fullwidth">Cancelar entrega</a>
                    </div>
                    
                   <?php } ?> 
                    <div class="content">
                        <a href="meupainel.php" type="button" class="button is-block is-link is-rounded is-large is-fullwidth">Ver entregas</a>
                    </div>
                    <div class="content">
                        <a href="painelativimplist.php" type="button" class="button is-block is-link is-rounded is-large is-fullwidth">Implantação</a>
                    </div>
                    <div class="content">
                        <a href="painelatividades.php" type="button" class="button is-block is-link is-rounded is-large is-fullwidth">Vendas</a>
                    </div>
                    <div class="content">
                        <a href="carteira/showcarteira.php" type="button" class="button is-block is-link is-rounded is-large is-fullwidth">Carteira</a>
                    </div>
                    <?php
                    if ($setor == 'Financeiro' || $setor == 'Administrador') { ?>
                    <div class="content">
                        <a href="cadastrosgerais/escolhecadgerais.php" type="button" class="button is-block is-link is-rounded is-large is-fullwidth">Cadastros Gerais</a>
                    </div>
                      <?php } ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>