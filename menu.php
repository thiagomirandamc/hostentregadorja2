<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item">
        Inicial
      </a>

      
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
        <a class="navbar-item">
      <?php  $result_clioport1sj = "SELECT * FROM usuario WHERE nome = '$usuario'";
$resultado_oport1sj = mysqli_query($conexao2, $result_clioport1sj);
while ($row_nomeclioport1sj = mysqli_fetch_assoc($resultado_oport1sj)){
    $linkfotoj = $row_nomeclioport1sj['linkfoto']; }
   ?> <figure class="image is-24x24">
  <img class="is-rounded" src="<?php echo $linkfotoj ?>">
  </figure>
      &nbsp;
    <?php  echo $usuario ?>
      </a>
      <a class="navbar-item" href="Login/logout.php">
         Sair
      </a>
         
        </div>
      </div>
    </div>
  </div>
</nav>