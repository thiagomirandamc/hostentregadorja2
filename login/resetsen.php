<?php
include("../conexao2.php");
session_start();
?>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro CRM</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

<?php include '../menu.php';?>
    
                   
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    
                    <h3 class="title has-text-grey"><a  target="_blank">Entregador já</a></h3>
                    <?php
                    if($_SESSION['status_cadastro']):
                    ?>
                    <div class="notification is-success">
                      <p>Alteração efetuada!</p>
                      <p>Faça login informando o seu usuário e senha <a href="login.php">aqui</a></p>
                    </div>
                    <?php
                    endif;
                   
                    ?>
                    <?php
                   
                   
                    ?>
                    <div class="box">
                        <form action="resetarsen.php" method="POST">
                            
                        <label id="cpfoucnpj" class="label">CPF ou CNPJ</label>


<input class="input is-info" type="text"  name="cpfoucnpj" required>

</div>

<div class="box">
<div class="field">  

<label id="senha" class="label">Senha</label>


<input class="input is-info" type="text"  name="senha" required>

</div>
                </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Alterar senha</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
                   
</body>

</html>