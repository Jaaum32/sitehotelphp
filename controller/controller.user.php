<?php
    require_once('conexao.php');
    require_once('../../models/user.dao.php');

    $view = '../view/view_adm/list_users';//view padrão
    $pessoaDAO = new PessoaDAO($pdo);




    if(@$_POST['action'] == "cadastrar"){
        
        $pessoaDAO->createUser(@$_POST);
        $view = '../view/view_user/index.php';

        header('location: '.$view);
        //require_once($view);
    }

    if($view == '../view/view_adm/list_users'){
        $users = $pessoaDAO->getAll();
    }
    

?>