<?php
include("conexao2.php");
include ('login/verifica_login.php');
session_start();
?>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tela Inicial</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
   
        <link rel="stylesheet" href="../css/bulma.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/login.css">
        <script type="text/javascript" src="../jquery.min.js"></script>
        <script type="text/javascript" src="../smoothscroll.js"></script>
        <script type="text/javascript" src="../popper.min.js"></script>
        <link rel="stylesheet" href="../css/bootstrap-4.4.1-dist/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../personalizado.js"></script>
        
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!--  <a class="navbar-brand" href="#">
       <img src="img/logo-systemway-transp.png" width="112" height="28" alt="">
  </a> --> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
        

      <li class="nav-item dropdown">
      <a class="navbar-item" href="inicial.php">
        Inicial
      </a>
      </li>
      
      
     
      
        
     
      
    <div class="navbar-end">
      <div class="navbar-item">
      <a class="navbar-item" href="../login/logout.php">
        Sair
      </a>
      </div>
    
    </ul>
  </div>
</nav>
 
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