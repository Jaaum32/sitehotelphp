<?php

    $user;

    if(empty($user)){
        exit;
    }else{
        if(!isset($_SESSION)){
            session_start();
        }else{
            echo "vc já estava logado";
        }
    
    
        $_SESSION['user'] = $user->$nome;
    
        echo "sessão criada para o usuário" .$user->$nome;
    }

    if(!@$user){
        echo "usuário n existe";
        
    }

    
?>