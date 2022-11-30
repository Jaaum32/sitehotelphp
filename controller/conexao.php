<?php
    $host = "localhost";
    $user = "root";
    $pass = "260405";
    $db = "db_hotel";
    $port = 3306;
    
    $pdo = new PDO("mysql:host=$host;dbname=$db;port=$port", 
        $user, $pass);
