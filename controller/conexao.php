<?php
    $host = "localhost";
    $user = "root";
    $pass = "2604";
    $db = "db_hotel";
    $port = 3306;
    
    $_conn = mysqli_connect($host, $user, $pass, $db, $port)
        or die("Erro ao estabelecer conexão");
