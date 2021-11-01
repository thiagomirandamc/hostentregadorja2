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
        <?php echo $usuario ?>
      </a>
      <a class="navbar-item" href="Login/logout.php">
         Sair
      </a>
         
        </div>
      </div>
    </div>
  </div>
</nav>