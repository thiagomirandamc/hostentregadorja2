<?php

define('HOST', 'br238.hostgator.com.br');
define('USUARIO', 'syste104_root');
define('SENHA','12345');
define('DB', 'syste104_devpedidosja');

$conexao2 = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');