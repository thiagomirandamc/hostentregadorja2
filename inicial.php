<?php
$dir = '/';
include("conexao2.php");
include ('login/verifica_login.php');
session_start();
$usuario = $_SESSION['nome'];
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
        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="smoothscroll.js"></script>
        <script type="text/javascript" src="popper.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap-4.4.1-dist/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="personalizado.js"></script>
        
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script async type="text/javascript" src="css/bulma.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="personalizado.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

<?php include 'menu.php';?>
 
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                   <?php 
                   
                   
                    
$cult = "SELECT * FROM usuario WHERE nome ='$usuario'";
                $execult = mysqli_query($conexao2, $cult);
              if ($execult) {
                    while ($rspl = mysqli_fetch_assoc($execult)) { 
             $permissao = $rspl['permissao']; } }    ?>                
                    
                    <?php
                    if ($permissao == '1' || $setor == '4') { ?>
                    <div class="content">
                        <a href="../Entrega/solicitaentrega.php" type="button" class="button is-block is-link is-rounded is-large is-fullwidth">Solicitar Entrega</a>
                    </div> 
                    <div class="content">
                        <a href="../solicitaentrega.php" type="button" class="button is-block is-link is-rounded is-large is-fullwidth">Cancelar entrega</a>
                    </div>
                    
                   <?php } ?> 
                    <div class="content">
                        <a href="Entrega/aceiteentregador.php" type="button" class="button is-block is-link is-rounded is-large is-fullwidth">Ver entregas</a>
                    </div>
                    <div class="content">
                        <a href="Relatorios/inicialrelatorios.php" type="button" class="button is-block is-link is-rounded is-large is-fullwidth">Relatórios</a>
                    </div>
                    <?php
                    if ($permissao == '1' || $permissao == '2') { ?>
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