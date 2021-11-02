<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Entregador Já</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="inicial.php">Inicial</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <li class="nav-item dropdown">
    <?php
            $result_clioport1sj = "SELECT * FROM usuario WHERE nome = '$usuario'";
            $resultado_oport1sj = mysqli_query($conexao2, $result_clioport1sj);
            while ($row_nomeclioport1sj = mysqli_fetch_assoc($resultado_oport1sj)){
            $linkfotoj = $row_nomeclioport1sj['linkfoto'];
                                               } ?> 
                   <figure class="image is-24x24">
                  <img class="is-rounded" src="<?php echo $linkfotoj ?>">
                  </figure>
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $usuario ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Conta</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="login/logout.php">Sair</a>
        </div>
      </li>
    </form>
  </div>
</nav>