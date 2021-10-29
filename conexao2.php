<?php

define('HOST', 'br238.hostgator.com.br');
define('USUARIO', 'syste104_root');
define('SENHA','Pericles123*');
define('DB', 'syste104_benevidesentregadorja');

$conexao2 = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');