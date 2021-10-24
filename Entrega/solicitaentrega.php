<?php
include('../conexao2.php');
?>
<html>
    <head>    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Solicitar Entrega</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="../../css/bulma.min.css" />
        <link rel="stylesheet" type="text/css" href="../../css/login.css">
        <script type="text/javascript" src="../../jquery.min.js"></script>
        <script type="text/javascript" src="../../smoothscroll.js"></script>
        <script type="text/javascript" src="../../popper.min.js"></script>
        <link rel="stylesheet" href="../../css/bootstrap-4.4.1-dist/css/bootstrap.min.css">
   
    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../personalizado.js"></script>
        
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        
    </head>

    <body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <a class="navbar-brand" href="#">
       <img src="../../img/logo-systemway-transp.png" width="112" height="28" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Painéis de Vendas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="painelatividades.php" >Principal de Vendas</a>
            <a class="dropdown-item" href="painelprospects.php">Prospects</a>
          <a class="dropdown-item" href="gerenciadortarefasvendas.php#atual">Calendário</a>
          <a class="dropdown-item" href="paineloportunidades.php">B.I Vendas</a>
          </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cadastros
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="cadastrocliente.php">Cadastro de Leads</a>
          <a class="dropdown-item" href="cadastrosistema.php">Cadastro de  Sistemas</a>
          
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Oportunidade
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="cadastrooportunidade.php">Gerar Oportunidade</a>
            <a class="dropdown-item" href="cadastroatividade.php">Gerar Atividade</a>
            <a class="dropdown-item" href="showoportunidade.php">Consulta Oportunidade</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Orçamentos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="navbar-item">Gerar Orçamento</a>
        </div>
      </li>
     <div class="container">
      <li class="nav-item">
           <a href="telainicial.php">Módulos</a>
      </li>
      </div>
      <div class="container">
      <li class="nav-item">
      <a href="logout.php">Sair</a>
      </li>
      </div>
    </ul>
  </div>
</nav>
        <section class="hero is-success is-fullheight">
            <form action="solicitarentrega.php" method="POST">
                <div class="hero-body">

                    <div class="container has-text-centered">
                        <div class="column is-4 is-offset-4">
                            <h3 class="title has-text-grey">Solicite sua entrega</h3>    
                            </br>
                           
                            

                           <div class="field">  

                                <label id="nomeoportunidade" class="label">Nome Cliente</label>
                                

                                    <input class="input is-info" type="text"  name="nomecliente">
                                
                            </div>
                            
                            <div class="field">  

                                <label id="contato" class="label">Contato dele:</label>
                                

                                    <input class="input is-info" type="text"  name="contato">
                                
                            </div>
                            <div class="field">
                                <a class="has-text-link" href="cadastrocliente.php">Já tem cadastro? Clique aqui.</a>
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

                                <label id="endereco" class="label">Logradouro:</label>
                                

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

                                <label id="referencia" class="label">Referencia:</label>
                                

                                    <input class="input is-info" type="text"  name="referencia">
                                
                            </div>
                        
                        <br>
                        <br>
                        <div class="field">
                            <input  type="submit" class="button is-link is-outlined is-rounded has-text-link" target="_blank" value=" Gerar PDF">

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