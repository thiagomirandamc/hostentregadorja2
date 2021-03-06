<?php
session_start();
?>
<?php if($_SESSION['nome']) {
    header('Location: inicial.php');
    exit();
}
?>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Entregador Já</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Sistema de Login</h3>
                    <h3 class="title has-text-grey"><a href="https://systemwayautomacao.com.br" target="_blank">Entregador já</a></h3>
                   
                   <?php if($_SESSION['status_cadastro']):
                    ?>
                    <div class="notification is-success">
                      <p>Alteração feita com sucesso!</p>
                      <p>Faça login informando o seu usuário e senha.</a></p>
                    </div>
                    <?php
                    endif;
                     ?>
                    
                    <?php
                    if(isset($_SESSION['nao_autenticado'])):
                        ?>
                    <div class="notification is-danger">
                      <p>Usuário ou senha inválidos.</p>
                    </div>
                    <?php                    
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                    <div class="box">
                        <form action="/login/login.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="usuario" name="text" class="input is-large" placeholder="Seu usuário" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input name="senha" class="input is-large" type="password" placeholder="Sua senha">
                                </div>
                            </div>
                           
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Entrar</button>
                        </form>
                        <div class="field">
                                <a class="has-text-link" href="login/resetsen.php">Esqueci minha senha</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

