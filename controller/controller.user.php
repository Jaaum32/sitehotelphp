<?php
    require_once('conexao.php');
    require_once('../models/user.dao.php');
    session_start();

    $view = '../view_adm/list_users.php';//view padrão
    $pessoaDAO = new PessoaDAO($pdo);
    $action = @$_REQUEST['action'];
    echo @$action;

    //echo $action;

    if(@$action == "cadastrar"){
        
        $teste = $pessoaDAO->createUser(@$_POST);
        $view = '../view_user/index.php';

        $id = $pessoaDAO->getUserByEmail(@$_POST['email'])->id;
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = @$_POST['nome'];

        header('location: '.$view);
        //require_once($view);
    }else if(@$action == "delete"){
        $id = @$_REQUEST['id'];


        $ra = $pessoaDAO->delete($id);//ra == rows affect

        print_r($id);
        print_r($ra);

        if($ra > 0){
            //ações após excluir um usuário;
            print_r("removeu");
        }else{
            print_r("n removeu");
            //tratar quando ngm for excluido
        }


    }else if($action == "login"){
        $email = @$_POST['email'];
        //echo @$_POST['pass'];

        $user = $pessoaDAO->getUserByEmail($email);

        if(empty($user)){
            echo "vazia";
            //tratar quando o usuário digita um email inválido
        }else{
            if(@$_POST['pass'] == $user->senha){
                //iniciar a sessão
                $_SESSION['id'] = $user->id;
                $_SESSION['nome'] = $user->nome;
                //$view = @$url;
                header('location: ../view_user/reserva.php');
            }else{
                //exibir que o usuário digitou uma senha errada
            }
        }
        
    }else if($action == "logout"){
        session_destroy();
        header('location: ../view_user/index.php');
    }

    if($view == '../view_adm/list_users.php'){
        $users = $pessoaDAO->getAll();
    }
    
    //require_once($view);

?>