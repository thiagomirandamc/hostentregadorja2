<?php
include('../conexao2.php');
session_cache_expire(18000);
session_start();
include ('../login/verifica_login.php');






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
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Inicial
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="">Teste</a>
          
        </div>
      </li>
      
      
     
      
        
     
      <div class="container">
      <li class="nav-item">
      <a href="../login/logout.php">Sair</a>
      </li>
      </div>
    </ul>
  </div>
</nav>
        

    <div class="hero is-info welcome is-small">
                        <div class="hero-body">
                            
                            <div class="container">
                                <h1 class="title">
                                    Entregas
                                </h1>
                              
                            </div>
                        </div> 
        </div>      
        
        <br>
        <br>

        <div class="column is-4 is-offset-4">

            <form action="aceiteentregador.php" method="GET">
                <label class="label">ID da entrega</label>
                <div class="field has-addons">
                    <div class="control">
                        <input class="input is-info" type="search"  name="identrega"  list="identrega" >
                        <datalist id="identrega"> 
                            <option></option> 
                        </datalist>
                    </div>
                    <div class="control">
                        <button type="submit" class="button is-link is-rounded">Consultar</button>
                    </div>
                </div> 
            </form>
              
            
           
               
            <?php
            if (isset($_GET['identrega'])) {
               
                $sql13 = "select * FROM entregas WHERE identrega = '$_GET[identrega]'";
                $execut3 = mysqli_query($conexao2, $sql13);
                
               
                
                
                
                
                
                    while ($rs3 = mysqli_fetch_assoc($execut3)) {
                    $identrega = $rs3['identrega'];
                    $status = $rs3['status'];
                    $idestabelecimento = $rs3['idestabelecimento'];
                        $resuesta = "SELECT * FROM usuario WHERE usuario_id = '$idestabelecimento'";
                        $resuleta = mysqli_query($conexao2, $resuesta);
                        $row_oporest = mysqli_fetch_assoc($resuleta);
                        $nomeestabelecimento = $row_oporest['nome'];
                        
                        $nomesessao = $_SESSION['nome'];
                            $resasv = "SELECT * FROM usuario WHERE nome = '$nomesessao'";
                            $rjkjk = mysqli_query($conexao2, $resasv);
                            $row_ovbhgt = mysqli_fetch_assoc($rjkjk);
                            $permissaouser = $row_ovbhgt['permissao'];
                            
                    
                        

                            $resuas = "SELECT * FROM permissao WHERE idpermissao = '$permissaouser'";
                            $resuasfg = mysqli_query($conexao2, $resuas);
                            $row_opfxc = mysqli_fetch_assoc($resuasfg);
                            $permissaoestab = $row_opfxc['estabelecimento'];
                            $permissaomaster = $row_opfxc['master'];
                            $permissaocooperado = $row_opfxc['cooperado'];
                            $permissaoentregador = $row_opfxc['entregador'];


                    $logradouro = $rs3['logradouro'];
                    $idbairro = $rs3['idbairro'];
                        $result_clioport2 = "SELECT * FROM bairros WHERE idbairro = '$idbairro'";
                        $resultado_oport2 = mysqli_query($conexao2, $result_clioport2);
                        $row_oportusuario2 = mysqli_fetch_assoc($resultado_oport2);
                        $nomebairro = $row_oportusuario2['nome'];
                        $valorsugerido = $row_oportusuario2['valor'];
                    
                    $referencia = $rs3['referencia'];
                    $dataehorapedida = $rs3['dataehorapedida'];
                       
                     } ?>

                  
             <div class="container">
                                      <div class="hero-body">
            <div id="oportunidade">
                
            <a class="title has-text-link">Entrega</a>
            <a class="title has-text-link">#<?php echo $identrega ?></a>
            </div>
                                      <br>
                                      <br>
                                    
                                      <div class="content">
                                      <?php if ($status == 'Aberta') { ?>
                               <span class="tag is-primary"><?php echo $status ?> </a>   </span>      
                                <?php } elseif ($status == 'Fechada' ) { ?>
                                <span class="tag is-info"><?php echo $status ?> </a>   </span> 
                                <?php } elseif ($status == 'Cancelada' ) { ?>
                                <span class="tag is-danger"><?php echo $status ?> </a>   </span>
                                <?php } ?>  </div>

                                <div class="content">
                                    <div class="title is-5 has-text-weight-bold">Estabelecimento: </div> <div  class="title is-6 has-text-weight-light" ><?php echo $nomeestabelecimento ?></div>  
                                </div>

                                <div class="content">
                                    <div class="title is-5 has-text-weight-bold">Endereço da entrega: </div> <div  class="title is-6 has-text-weight-light" ><?php echo $logradouro ?> - <?php echo $nomebairro ?> </div>  
                                </div>
                                <div class="content">
                                    <div class="title is-5 has-text-weight-bold">Referência: </div> <div  class="title is-6 has-text-weight-light" ><?php echo $referencia ?> </div>  
                                </div>

                                <div class="content">
                                    <div class="title is-5 has-text-weight-bold">Valor Sugerido: </div> <div  class="title is-6 has-text-weight-light" >R$<?php echo $valorsugerido ?> </div>  
                                </div>
                                
                                <?php if ($status == 'Aberta' && $permissaoestab == 's' ) { ?>
                                    <div class="content">
                                    <div class="title is-5 has-text-weight-bold">Para cancelar a entrega: </div> 
                                    <?php echo "<a class='button is-danger' href='fechaimplantacao.php?id=" . $id1 . "'>Cancelar entrega</a>";?>
                                </div>
                                
                                 <?php } if ($status == 'Aberta' && $permissaoentregador == 's' ) { ?>
                                    <div class="content">
                        <div class="title is-5 has-text-weight-bold">Para aceitar clique abaixo: </div> 
                                 </div>
                              <!-- Button trigger modal -->
<button type="button" class="button is-success" data-toggle="modal" data-target="#exampleModal">Aceitar Entrega</button>
<br>
<br>
<br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action="entregadoraceitou/aceitandoentrega.php" method="POST">
          <input name="identrega" class="input" type="hidden" value="<?php echo $identrega ;?>">
          
          
          <label class="label">Confirma o aceite da entrega ID <?php echo $identrega; ?> ? </label>                    
                                        
                        
                    
      
           
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
               <button  type="submit" class="button is-success" >Confirmar</button>
            </form>
      </div>
  
 
</div>
<?php } } ?>
    </div>
  </div>
    
</div>
                        
                        <br>
                    
                     
                        </div>
                  
                  </div>
            
                
            
        
    </body>
</html>