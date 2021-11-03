<?php
$dir = '../';
include('../conexao2.php');
session_start();
include ('../login/verifica_login.php');

$estabelecimentopesq = filter_input(INPUT_GET, 'estabelecimento', FILTER_SANITIZE_STRING); 
$statuspesq = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_STRING);
$depesq = filter_input(INPUT_GET, 'data', FILTER_SANITIZE_STRING);
$parapesq = filter_input(INPUT_GET, 'data2', FILTER_SANITIZE_STRING);
  
$usuario = $_SESSION['nome'];
$cult = "SELECT * FROM usuario WHERE nome ='$usuario'";
                $execult = mysqli_query($conexao2, $cult);
              if ($execult) {
                    while ($rspl = mysqli_fetch_assoc($execult)) { 
             $permissao = $rspl['permissao']; } }   
             
             if ($permissao == '1' || $permissao == '2' || $permissao == '3' ) { ?>
            


<html>
    <head>    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Entregas do entregador</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="../css/bulma.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/login.css">
      
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        
       
        <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
         
        <script type="text/javascript" src="../personalizado.js"></script>
   
   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         

</head>

<body>

<?php include '../menu.php';?>
        

    <div class="hero is-info welcome is-small">
                        <div class="hero-body">
                            
                            <div class="container">
                                <h1 class="title">
                                    Relatório: Entregas do entregador
                                </h1>
                              
                            </div>
                        </div> 
        </div>      
        
        <br>
        <br>

        <div class="column is-4 is-offset-4">

            <form action="entregasdoentregador.php" method="GET">
                 
                  <label class="label">Status:</label>
                  <div class="field has-addons">
                          <div class="select is-info">
                          <select name="status">
                              <option><?php echo $statuspesq ?></option>
                              <option>Todos</option>
                              <option>Aberta</option>
                              <option>Cancelada</option>
                              <option>Fechada</option>
                                  </select>
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
                     
            </form>
              
            
           
               
            <?php
            if (($_GET['status']) && ($_GET['data']) && ($_GET['data2'])) {

              $nomeentregador = $_SESSION['nome'];
              
              $statusini = ($_GET['status']);
              

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

              $resuesta = "SELECT * FROM usuario WHERE nome = '$nomeentregador'";
              $resuleta = mysqli_query($conexao2, $resuesta);
              $row_oporest = mysqli_fetch_assoc($resuleta);
              $identregador= $row_oporest['usuario_id'];
               
            ?>   <div class="columns is-desktop">
                              
               <div class="column">
                   
                   <div class="container">
                       <div class="hero-body">
                       
                       <table class="table table-responsive is-fullwidth ">  
<br>           
<thead>
<tr>
<th><abbr title="Status">Status</abbr></th>
<th><abbr title="Estabelecimento">Estab.</abbr></th>
 <th><abbr title="ID">ID</abbr></th>
 <th><abbr title="Data e hora pedida">Data e Hora</abbr></th>
 <th><abbr title="Logradouro">Logradouro</abbr></th>
 <th><abbr title="Valor">R$</abbr></th>

</tr>
</thead>
<tbody>                 
               <?php
               if ($statusini == 'Todos') {
                $sql13 = "select * FROM entregas WHERE identregador = '$identregador' AND dataehorapedida BETWEEN '$data_sem_barra1' and '$data_sem_barra2' ";
            } elseif ($statusini != 'Todos')  {
                $sql13 = "select * FROM entregas WHERE identregador = '$identregador' AND status = '$statusini' AND dataehorapedida BETWEEN '$data_sem_barra1' and '$data_sem_barra2' ";
            }
                
                $execut3 = mysqli_query($conexao2, $sql13);
                
                    while ($rs3 = mysqli_fetch_assoc($execut3)) {
                    $identrega = $rs3['identrega'];
                    $idestabelecimento = $rs3['idestabelecimento'];
                    $logradouro = $rs3['logradouro'];
                    $numero = $rs3['numero'];
                    $idbairro = $rs3['idbairro'];
                        $result_clioport2 = "SELECT * FROM bairros WHERE idbairro = '$idbairro'";
                        $resultado_oport2 = mysqli_query($conexao2, $result_clioport2);
                        $row_oportusuario2 = mysqli_fetch_assoc($resultado_oport2);
                        $nomebairro = $row_oportusuario2['nome'];
                        
                    $identregador = $rs3['identregador'];
                    $valor = $rs3['valor'];
                    $status = $rs3['status'];
                    $dataehorapedida = $rs3['dataehorapedida'];
                    $dateehorped = strtotime($dataehorapedida);
                                    

                   ?>
                   
                         
                                                  
                       <tr>     
                    <td> <?php if ($status == 'Aberta') { ?>
                               <span class="tag is-primary"><?php echo $status ?> </a>   </span>      
                                <?php } elseif ($status == 'Fechada' ) { ?>
                                <span class="tag is-info"><?php echo $status ?> </a>   </span> 
                                <?php } elseif ($status == 'Cancelada' ) { ?>
                                <span class="tag is-danger"><?php echo $status ?> </a>   </span>
                                <?php } ?> </td>

                                <?php
                                                
 $result_clioport1sj = "SELECT * FROM usuario WHERE usuario_id = '$idestabelecimento'";
$resultado_oport1sj = mysqli_query($conexao2, $result_clioport1sj);
while ($row_nomeclioport1sj = mysqli_fetch_assoc($resultado_oport1sj)){
    $linkfotoj = $row_nomeclioport1sj['linkfoto'];
    $nomeestab =  $row_nomeclioport1sj['nome'];
} ?>
                                                   <td>
  <figure class="image is-24x24">
  <img class="is-rounded" title="<?php echo $nomeestab ?>" src="<?php echo $linkfotoj ?>">
  </figure></td>
                                               <td><a class="has-text-black">ID <?php echo $identrega ?></a></td>          
                                               <td><a class="has-text-black"><?php echo date('d/m/y H:i', $dateehorped) ?></a></td>  
                                                
                                                 
                                                 <td><a class="has-text-black"><?php echo $logradouro ?>, <?php echo $numero ?> - <?php echo $nomebairro ?> </a></td>
</td>                                             <td><a class="has-text-black">R$<?php echo $valor ?></a></td>
                                              <?php } ?>
                                                </tbody>
                                            </table>

                                            <?php  
                                            if ($statusini == 'Todos') {
                                            $sql45j = "SELECT SUM(valor)as total450 FROM entregas WHERE idestabelecimento = '$idestabelecimento' AND dataehorapedida BETWEEN '$data_sem_barra1' AND '$data_sem_barra2'";
                                        } elseif ($statusini != 'Todos')  {
                                            $sql45j = "SELECT SUM(valor)as total450 FROM entregas WHERE idestabelecimento = '$idestabelecimento' AND status = '$status' AND  dataehorapedida BETWEEN '$data_sem_barra1' AND '$data_sem_barra2'";
                                        }
                                            $exc45j = mysqli_query($conexao2, $sql45j);
                                    $row45j = mysqli_fetch_assoc($exc45j);
                                    $valorperiodo = $row45j['total450'];     

                                    if ($statusini == 'Todos') {
                                      $sql4gh = "SELECT COUNT(valor)as total450 FROM entregas WHERE idestabelecimento = '$idestabelecimento' AND dataehorapedida BETWEEN '$data_sem_barra1' AND '$data_sem_barra2'";
                                    } elseif ($statusini != 'Todos')  {
                                        $sql4gh = "SELECT COUNT(valor)as total450 FROM entregas WHERE idestabelecimento = '$idestabelecimento' AND status = '$status' AND  dataehorapedida BETWEEN '$data_sem_barra1' AND '$data_sem_barra2'";
                                    }
                                      $exsdsd = mysqli_query($conexao2, $sql4gh);
                                    $rodfdf = mysqli_fetch_assoc($exsdsd);
                                    $entregasperiodo = $rodfdf ['total450']; 

                                    $dateinic = strtotime($data_sem_barra1);
                                    $datefin = strtotime($data_sem_barra2);
                                    ?>

                                     
                       
                                    <label class="label">Entregador: <?php echo $nomeentregador ?> </label> 
                                    <label class="label">Período: De <?php echo date('d/m/y H:i', $dateinic) ?> até <?php echo date('d/m/y H:i', $datefin) ?>  </label>    
                                    <label class="label">Total de entregas: <?php echo $entregasperiodo ?> </label>
                                    <label class="label">Valor Total: R$ <?php echo $valorperiodo ?> </label>
                                    
                                            <?php   
  } elseif (empty($_GET['status']) && ($_GET['data']) && ($_GET['data2'])) { ?>


<label class="label">Você colocou parametros errado pro relatório.</label>                             
                                           
                                           
                        <?php                   } ?>
                                            
    </div>
  </div>
    
</div>
                        
                        <br>
                        <?php }  else { ?>

<label id="referencia" class="label">Você não tem permissão para essa página.</label>
<?php } ?>             
                     
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