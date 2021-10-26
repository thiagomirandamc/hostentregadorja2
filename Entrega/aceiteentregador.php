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
                            $resultado_nomecliente = mysqli_query($conexao2, $res_nomecliente);
                            while ($row_nomecliente = mysqli_fetch_assoc($resultado_nomecliente)) {
                                ?>
                                <option value="<?php echo $row_nomecliente['identrega']; ?>"><?php echo $row_nomecliente['identrega']; ?>                               
                                </option> <?php
                            }
                            ?>
                        </datalist>
                    </div>
                    <div class="control">
                        <button type="submit" class="button is-link is-rounded">Consultar</button>
                    </div>
                </div> 
            </form>
            <div class="field">
                <a class="has-text-link" href="escolheimp.php">Quer consultar pelo nome?</a>
                            </div>
        </div>
            <br>                
               
            <?php
            if (isset($_GET['identrega'])) {
                
                $sql13 = "select * FROM entregas WHERE identrega = '$_GET[identrega]'";
                $execut3 = mysqli_query($conexao2, $sql13);
                
                 }
                
                if ($execut3) {
                    while ($rs3 = mysqli_fetch_assoc($execut3)) {
                        $id1 = $rs3['identrega'];
                        
                        $idcli = $rs3['idcliente'];
                          $sql190 = "select * FROM clientes WHERE idcliente = '$idcli'";
                          $execut190 = mysqli_query($conexao2, $sql190);
                          while ($rs34 = mysqli_fetch_assoc($execut190)) {
                          $cli1 = $rs34['nome'];
                          $contato = $rs34['contato'];
                         
                        
                        
                        $status = $rs3['status'];
                        $logradouro = $rs3['logradouro'];
                        $idbairro = $rs3['idbairro'];
                            $sq777 = "select * FROM bairros WHERE idbairro = '$idbairro'";
                            $exe679786 = mysqli_query($conexao2, $sq777);
                            while ($rs1267763 = mysqli_fetch_assoc($exe679786)) {
                            $nomebairro = $rs1267763['nome']; 

                        $referencia = $rs3['referencia'];
                        $idestabelecimento = $rs3['idestabelecimento'];
                            $sql128 = "select * FROM usuario WHERE usuario_id = '$idestabelecimento'";
                            $exec35454 = mysqli_query($conexao2, $sql128);
                            while ($rs12984 = mysqli_fetch_assoc($exec35454)) {
                            $nomeestabelecimento = $rs12984['nome']; 
                           
                        $identregador =$rs3['identregador'];
                            $sql434 = "select * FROM usuario WHERE usuario_id = '$idestabelecimento'";
                            $exec566 = mysqli_query($conexao2, $sql434);
                            while ($rs565 = mysqli_fetch_assoc($exec566)) {
                            $nomeentregador = $rs565['nome']; 
                        
                       
                    
                
                        
                       
                        ?>
              <div class="columns is-desktop">
                              
                              <div class="column">
                                  
                                  <div class="container">
                                      <div class="hero-body">
            <div id="oportunidade">
                
            <a class="title has-text-link">Dados</a>
            </div>
                                      <br>
                                      <br>
                                      <div class="content"> 
                                    <div class="title is-5 has-text-weight-bold" >#<?php echo $id1 ?></div>  
                                </div>
                                      <div class="content">
                                      <?php if ($status == 'Aberta') { ?>
                               <span class="tag is-success"><?php echo $status ?> </a>   </span>      
                                <?php } elseif ($status == 'Fechada' ) { ?>
                                <span class="tag is-info"><?php echo $status ?> </a>   </span> 
                                <?php } elseif ($status == 'Cancelada' ) { ?>
                                <span class="tag is-danger"><?php echo $status ?> </a>   </span>
                                <?php } ?>  </div>
                                     <div class="content">
                                    <div class="title is-5 has-text-weight-bold"> Estabelecimento que quer a entrega: <?php echo $idestabelecimento ?> </div>  
                                    <div class="title is-6 has-text-weight-light" ><?php echo $cli1 ?> </div>  
                                </div>
                    <div class="content">
                    <div class="title is-5 has-text-weight-bold"> Endereço da entrega: </div>  
                <button type="button" class="button is-link is-outlined is-small"><?php echo $logradouro ?> - <?php echo $nomebairro ?> - <?php echo $referencia ?>  </button>
                </div>                 
                
                
                
                 
                                  
          
            

                
                 
                                
                      
                         
            
                            
                        <br>
                        <br>
                     
                        <?php
                    }
                }
            }
        }
    }
}

            
            ?>
                        </div>
                    </div>
                  
              </div>
        
    </body>
</html>