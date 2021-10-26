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
        <title>Solicitar Entrega</title>
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
                            <h3 class="title has-text-grey">Solicite sua entrega</h3>    
                            </br>
                            <?php
                            $idestabelecimento = $_SESSION['usuario_id'];
                            ?>
                            

                           <div class="field">  

                                <label id="nomeoportunidade" class="label">Nome Cliente</label>
                                

                                    <input class="input is-info" type="text"  name="nomecliente">
                                
                            </div>
                             <br>
                            <div class="field">  

                                <label id="contato" class="label">Contato dele(WhatsApp):</label>
                                

                                    <input class="input is-info" type="text"  name="contato">
                                
                            </div>
                            <div class="field">
                                <a class="has-text-link" href="cadastrocliente.php">Cliente já tem cadastro? Clique aqui.</a>
                            </div>
                            <br>
                            <br>
                            <br>
                             <a href="#endereco" class="button is-link is-outlined is-rounded has-text-link smoothScroll">Próxima etapa >></a>
                        
                        
      
                    </div>
                </div>         
        </section>
        <div id="sistemanumberone" class="container" > 
        <section class="hero is-success is-fullheight">              
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-4 is-offset-4">
                       
                         <div class="field">  

                                <label id="endereco" class="label">Logradouro, número , se tiver entre ruas:</label>
                                

                                    <input class="input is-info" type="text"  name="logradouro">
                                
                            </div>
                        
                         <div class="field">  
                            <label class="label">Bairro</label>
                            <div class="select is-info">
                                 <select name="bairro">
                                     <option></option>
                                <?php
                                $res_nomesistema3 = "SELECT * FROM bairros";
                                    $resultado_nomesistema3 = mysqli_query($conexao2, $res_nomesistema3);
                                    while ($row_nomesistema3 = mysqli_fetch_assoc($resultado_nomesistema3)) {
                                        ?>
                                       
                                            <option><?php echo $row_nomesistema3['nome'];?></option>
                                    <?php } ?>
                                        </select>
                                    </div>
                        </div>
                       

                        <div class="field">  

                                <label id="referencia" class="label">Referência:</label>
                                

                                    <input class="input is-info" type="text"  name="referencia">
                                
                            </div>
                        
                        <br>
                        <br>
                        <div class="field">
                            <input  type="submit" class="button is-link is-outlined is-rounded has-text-link" target="_blank" value=" Gerar entrega!">

                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>                        
</section>

</body>

</html>