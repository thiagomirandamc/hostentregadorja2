<?php
include('../conexao2.php');
session_start();
include ('../login/verifica_login.php');

$estabelecimentopesq = filter_input(INPUT_GET, 'estabelecimento', FILTER_SANITIZE_STRING); 
$statuspesq = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_STRING);
$depesq = filter_input(INPUT_GET, 'data', FILTER_SANITIZE_STRING);
$parapesq = filter_input(INPUT_GET, 'data2', FILTER_SANITIZE_STRING);
  

?>
<html>
    <head>    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Entregas por estabelecimento</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="../css/bulma.min.css" >
        <link rel="stylesheet" type="text/css" href="../css/login.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        
       
        <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="personalizado.js"></script>
        
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
                                    Relatório: Entregas do dia por estabelecimento
                                </h1>
                              
                            </div>
                        </div> 
        </div>      
        
        <br>
        <br>

        <div class="column is-4 is-offset-4">

            <form action="entregasporestabelecimento.php" method="GET">
                <label class="label">Estabelecimento</label>
                <div class="field has-addons">
                    <div class="control">
                        <input class="input is-info" type="search"  name="estabelecimento"  list="estabelecimento" >
                        <datalist id="estabelecimento"> 
                            <option><?php echo $estabelecimentopesq ?></option> 
                            <?php
                            $res_estab = "SELECT * FROM usuario WHERE permissao = 4";
                            $resultadestab = mysqli_query($conexao2, $res_estab);
                            while ($row_estabsas = mysqli_fetch_assoc($resultadestab)) {
                                ?>
                                <option value="<?php echo $row_estabsas['nome']; ?>"><?php echo $row_estabsas['nome']; ?>                               
                                </option> <?php
                            }
                            ?>
                        </datalist>
                   &nbsp 
                  <label class="label">Status:</label>
                          <div class="select is-info">
                          <select name="status">
                              <option><?php echo $statuspesq ?></option>
                              <option>Aberta</option>
                              <option>Cancelada</option>
                              <option>Fechada</option>
                                  </select>
                              </div> 
                          </div>     
                          </div> 
                    <label class="label">De:</label>
                    <div class="input-group date data_formato" data-date-format="dd/mm/yyyy HH:ii:ss">
							<input type="text" class="form-control" name="data" value="<?php echo $depesq ?>" >
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</span>
                  </div>
                  <label class="label">Até:</label>
                    <div class="input-group date data_formato" data-date-format="dd/mm/yyyy HH:ii:ss">
							<input type="text" class="form-control" name="data2" value="<?php echo $parapesq ?>" >
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</span>
                  </div>
                       
                       
                          </br>
                    <div class="control">
                        <button type="submit" class="button is-link is-rounded">Consultar</button>
                    </div>
                </div> 
            </form>
              
            
           
               
            <?php
            if (isset($_GET['estabelecimento']) && ($_GET['status'])) {

              $nomeestabelecimento = $_GET['estabelecimento'];
              $de = $_GET['data'];
              
                  $de = explode(" ", $de);
                  list($date1, $hora1) = $de;
                  $data_sem_barra1 = array_reverse(explode("/", $date1));
                  $data_sem_barra1 = implode("-", $data_sem_barra1);
                  $data_sem_barra1 = $data_sem_barra1 . " " . $hora1;

              $para = $_GET['data2'];

                  $para = explode(" ", $para);
                  list($date2, $hora2) = $para;
                  $data_sem_barra2 = array_reverse(explode("/", $date2));
                  $data_sem_barra2 = implode("-", $data_sem_barra2);
                  $data_sem_barra2 = $data_sem_barra2 . " " . $hora2;

              $resuesta = "SELECT * FROM usuario WHERE nome = '$nomeestabelecimento'";
              $resuleta = mysqli_query($conexao2, $resuesta);
              $row_oporest = mysqli_fetch_assoc($resuleta);
              $idestabelecimento = $row_oporest['usuario_id'];
               
            ?>   <div class="columns is-desktop">
                              
               <div class="column">
                   
                   <div class="container">
                       <div class="hero-body">
                       <td><a class="has-text-black">Relatório de <?php echo $data_sem_barra1 ?> a <?php echo $data_sem_barra2 ?> </a></td> 
                       <table class="table table-responsive is-fullwidth ">  
<br>           
<thead>
<tr>
 <th><abbr title="ID">ID</abbr></th>
 <th><abbr title="Entregador">Ent.</abbr></th>
 <th><abbr title="Logradouro">Logradouro</abbr></th>
 <th><abbr title="Valor">R$</abbr></th>

</tr>
</thead>
<tbody>                 
               <?php
                $sql13 = "select * FROM entregas WHERE idestabelecimento = '$idestabelecimento' AND dataehorapedida BETWEEN '$data_sem_barra1' and '$data_sem_barra2' ";
                $execut3 = mysqli_query($conexao2, $sql13);
                
                    while ($rs3 = mysqli_fetch_assoc($execut3)) {
                    $identrega = $rs3['identrega'];
                    $logradouro = $rs3['logradouro'];
                    $numero = $rs3['numero'];
                    $identregador = $rs3['identregador'];
                    $valor = $rs3['valor'];
                   ?>
                   
                 <?php  $sql45j = "SELECT COUNT(valor)as total450 FROM entregas WHERE dataehorapedida = '$data_sem_barra1' AND dataehorapedida = '$data_sem_barra2'";
                                    $exc45j = mysqli_query($conexao, $sql45j);
                                    $row45j = mysqli_fetch_assoc($exc45j);
                                    $valorperiodo = $row45j['total450'];     
                  
                                    ?>             
                                                  
                       <tr>     
                    
                                               <td><a class="has-text-black">ID <?php echo $identrega ?></a></td>          
                                                <?php
                                                
 $result_clioport1sj = "SELECT * FROM usuario WHERE usuario_id = '$identregador'";
$resultado_oport1sj = mysqli_query($conexao2, $result_clioport1sj);
while ($row_nomeclioport1sj = mysqli_fetch_assoc($resultado_oport1sj)){
    $linkfotoj = $row_nomeclioport1sj['linkfoto'];
    $nomeentregador =  $row_nomeclioport1sj['nome'];
} ?>
                                                   <td>
  <figure class="image is-24x24">
  <img class="is-rounded" title="<?php echo $nomeentregador ?>" src="<?php echo $linkfotoj ?>">
  </figure></td>
                                                 
                                                 <td><a class="has-text-black"><?php echo $logradouro ?></a></td>
</td>                                             <td><a class="has-text-black">R$<?php echo $valor ?></a></td>
                                              <?php } ?>
                                                </tbody>
                                            </table>
                                            <?php   } ?>
                                            
    </div>
  </div>
    
</div>
                        
                        <br>
                    
                     
                        </div>
                  
                  </div>
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <script src="../bootstrap.min.js" type="text/javascript"></script>
         <script src="../bootstrap-datetimepicker.min.js" type="text/javascript"></script>
         <script src="../bootstrap-datetimepicker.pt-BR.js" type="text/javascript"></script>
         <script type="text/javascript">
			$('.data_formato').datetimepicker({
				weekStart: 1,
				todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1,
                language: "pt-BR",
                // startDate: '+0d'
			});
		</script>
                
            
        
    </body>
</html>