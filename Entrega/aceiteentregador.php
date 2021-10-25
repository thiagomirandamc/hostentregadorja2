<?php
include('../conexao2.php');
session_cache_expire(18000);
session_start();
include ('../login/verifica_login.php');
$identrega = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_clioport = "SELECT * FROM entregas WHERE identrega = '$identrega'";
$resultado_oport = mysqli_query($conexao2, $result_clioport);
$row_oportusuario = mysqli_fetch_assoc($resultado_oport);

$idcliente = $row_oportusuario['idcliente'];
$status = $row_oportusuario['status'];
$idestabelecimento = $row_oportusuario['idestabelecimento'];
$dataehorapedida = $row_oportusuario['dataehorapedida'];

$resuesta = "SELECT * FROM usuarios WHERE usuario_id = '$idestabelecimento'";
$resuleta = mysqli_query($conexao2, $resuesta);
$row_oporest = mysqli_fetch_assoc($resuleta);
$nomeestabelecimento = $row_oporest['nome'];

$resu = "SELECT * FROM clientes WHERE idcliente = '$idcliente'";
$resulta = mysqli_query($conexao2, $resu);
$row_oportusu = mysqli_fetch_assoc($resulta);
$nomecliente = $row_oportusu['nome'];
$contatocliente = $row_oportusu['contato'];
$logradourocliente = $row_oportusu['logradouro'];
$idbairrocliente = $row_oportusu['idbairro'];
$referenciacliente = $row_oportusu['referencia'];

$resbairro = "SELECT * FROM bairros WHERE idbairro = '$idbairro'";
$resultabairro = mysqli_query($conexao2, $resbairro);
$row_obairro = mysqli_fetch_assoc($resultabairro);
$nomebairro =$row_obairro['nome'];
$valorbairro =$row_obairro['valor'];


?>
<html>
    <head>    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Aceite Entregador</title>
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

        <section class="hero is-success is-fullheight">
            <form action="solicitarentrega.php" method="POST">
                <div class="hero-body">

                    <div class="container has-text-centered">
                        <div class="column is-4 is-offset-4">
                            <h3 class="title has-text-grey">Aceite de Entregador</h3>    
                            </br>
                           
            <form action="aceiteentregador.php#" method="GET">
                <label class="label">Id Entrega</label>
                <div class="field has-addons">
                    <div class="control">
                        <input class="input is-info" type="search"  name="identrega"  list="identrega" >
                        <datalist id="identrega"> 
                            <option></option> 
                            <?php
                            $res_nomecliente = "SELECT * FROM entregas";
                            $resultado_nomecliente = mysqli_query($conexao, $res_nomecliente);
                            while ($row_nomecliente = mysqli_fetch_assoc($resultado_nomecliente)) {
                                ?>
                                <option value="<?php echo $row_nomecliente['identrega']; ?>"><?php echo $row_nomecliente['identrega']; ?>                               
                                </option> <?php
                            }
                            ?>
                        </datalist>
                    </div>
                    <div class="control">
                        <button type="submit" class="button is-link is-rounded">Consultar entrega</button>
                    </div>
                </div> 
            </form>
            <?php
            if (isset($_GET['identrega'])) { 
                        ?>
                            <div class="content"> 
                                    <div class="title is-5 has-text-weight-bold" >Entrega nº:<?php echo $identrega ?></div>  
                                </div>
                                      <div class="content">
                                      <?php if ($prioridade2 == 'Aberta') { ?>
                               <span class="tag is-success"><?php echo $status ?> </a>   </span>      
                                <?php } elseif ($prioridade2 == 'Fechada' ) { ?>
                                <span class="tag is-info"><?php echo $status ?> </a>   </span> 
                                <?php } elseif ($prioridade2 == 'Cancelada' ) { ?>
                                <span class="tag is-danger"><?php echo $status ?> </a>   </span>
                                <?php } ?>  </div>
                                     <div class="content">
                                    <div class="title is-5 has-text-weight-bold"> Estabelecimento:</div>  
                                    <div class="title is-6 has-text-weight-light" ><?php echo $nomeestabelecimento ?> </div>  
                                </div>
      
                    </div>
                </div>         
        </section>
        <div id="sistemanumberone" class="container" > 
        <section class="hero is-success is-fullheight">              
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-4 is-offset-4">
                       
                      
                        
                        <br>
                        <br>
                        <div class="field">
                            <input  type="submit" class="button is-link is-outlined is-rounded has-text-link" target="_blank" value="Aceitar corrida">

                            </form>
                        </div>

                    </div>
                </div>
            </div>
<?php } ?>
        </div>
    </div>
</div>                        
</section>

</body>

</html>