<?php
session_start();//sessão é uma maneira de armazenar informações (em variáveis) para ser usado em várias páginas.
session_destroy();
header("Location: Login.php");//Redirecionar a para pagina login.php
?>