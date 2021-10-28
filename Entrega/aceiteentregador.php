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
                                
                                
                                    <div class="content">
                                    <div class="title is-5 has-text-weight-bold">Para aceitar clique abaixo: </div> 
                                    <?php echo "<a class='button is-success' href='fechaimplantacao.php?id=" . $id1 . "'>Aceitar entrega</a>";?>
                                </div>
                                 <?php } ?>
                              
                                 <?php } if ($status == 'Aberta' && $permissaoentregador == 's' ) { ?>
                              <!-- Button trigger modal -->
<button type="button" class="button is-rounded is-link is-outlined is-small" data-toggle="modal" data-target="#exampleModal">editar</button>
<br>
<br>
<br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aceite de entrega</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action="editaroportunidade.php" method="POST">
          <input name="idoportunidade" class="input" type="hidden" value="<?php echo $id1 ;?>">
          
          
          <label class="label">Confirma o aceite a entrega? </label>                    
                                        
                        
                    
      
           
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button  type="submit" class="button is-link" >Alterar</button>
            </form>
      </div>
  
 
</div>
<?php } ?>
    </div>
  </div>
    
</div>
                        
                        <br>
                    
                     
                        </div>
                  
                  </div>
            
                
            
        
    </body>
</html>