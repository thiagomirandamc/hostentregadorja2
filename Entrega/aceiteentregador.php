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
                                    Implantações
                                </h1>
                              
                            </div>
                        </div> 
        </div>      
        
        <br>
        <br>

        <div class="column is-4 is-offset-4">

            <form action="aceiteentregador.php" method="GET">
                <label class="label">Cliente</label>
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
              
            
           
               
            <?php
            if (isset($_GET['identrega'])) {
               
                $sql13 = "select * FROM entregas WHERE identrega = '$_GET[identrega]'";
                $execut3 = mysqli_query($conexao2, $sql13);
                
               
                
                
                
                
                
                    while ($rs3 = mysqli_fetch_assoc($execut3)) {
                    $identrega = $rs3['identrega'];}
                        
                       
                        ?>
             <div class="container">
                                      <div class="hero-body">
            <div id="oportunidade">
                
            <a class="title has-text-link">Entrega</a>
            </div>
                                      <br>
                                      <br>
         
               <table class="table table-responsive is-fullwidth ">             
                        <tbody>
                            
                            <td> <?php echo "<a class='has-text-black' href='showimplantacao.php?idimplantacao=" . $id1 . "'>" . $id1 . " - " . $_GET[identrega] ." - " . $sistema1 ."</a>";?></td>
                                                                                         
                                                         
            <?php }  ?>                  
                                                        
                                                </tbody>
                                            </table> 
            
                  
                                                        
                                                </tbody>
                                            </table>  
                                </div>
               
                  
                            

                                
                      
                         
            
                            
                        <br>
                        <br>
                     
                     
                        </div>
                    </div>
             
            
    </body>
</html>