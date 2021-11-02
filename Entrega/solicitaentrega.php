<?php
$dir = '../';
include('../conexao2.php');
session_start();
include ('../login/verifica_login.php');
$nomesessao = $_SESSION['nome'];
$resuesta = "SELECT * FROM usuario WHERE nome = '$nomesessao'";
$resuleta = mysqli_query($conexao2, $resuesta);
$row_oporest = mysqli_fetch_assoc($resuleta);
 $permissaouser = $row_oporest['permissao'];

 
$resuas = "SELECT * FROM permissao WHERE idpermissao = '$permissaouser'";
$resuasfg = mysqli_query($conexao2, $resuas);
$row_opfxc = mysqli_fetch_assoc($resuasfg);
 $permissaoestab = $row_opfxc['estabelecimento'];

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
  <script async type="text/javascript" src="../css/bulma.js"></script>
<script type="text/javascript" src="../jquery.min.js"></script>
<script type="text/javascript" src="../personalizado.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

<?php include '../menu.php';?>
        <section class="hero is-success is-fullheight">
            <form action="solicitarentrega.php" method="POST">
                <div class="hero-body">

                <?php if ($permissaoestab == 's') { ?>
                              

                    <div class="container has-text-centered">
                        <div class="column is-4 is-offset-4">
                            <h3 class="title has-text-grey">Solicite sua entrega</h3>    
                            </br>
                            <?php
                            $idestabelecimento = $_SESSION['usuario_id'];
                            ?>
                           <div class="field">  

<label id="endereco" class="label">Logradouro</label>


    <input class="input is-info" type="text"  name="logradouro" required>

</div>

<div class="field">  

<label id="numero" class="label">Número</label>


    <input class="input is-info" type="text"  name="numero" required>

</div>
<div class="field">  

<label id="complemento" class="label">Complemento</label>


    <input class="input is-info" type="text"  name="complemento" required>

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


    <input class="input is-info" type="text"  name="referencia" required>

</div>

<div class="field">  

<label id="observacoes" class="label">Você deseja avisar o entregador de algo? *até 150 caracteres</label>


    <input class="input is-info" type="text"  name="observacoes">

</div>

<br>
<br>
<div class="field">
<input  type="submit" class="button is-link is-outlined is-rounded has-text-link" target="_blank" value=" Gerar entrega!">

<?php }  elseif ($permissaoestab == 'n') { ?>

    <label id="referencia" class="label">Você não tem permissão para essa página.</label>
    <?php } ?>
</form>
</div>  

                           
                        
      
                    </div>
                </div>         
        </section>
        
</body>

</html>