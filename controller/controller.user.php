<?php
    require_once('conexao.php');
    require_once('../models/user.dao.php');
    @session_start();

    $view;//view padrão
    $pessoaDAO = new PessoaDAO($pdo);
    $action = @$_REQUEST['action'];
    $var =  @$_REQUEST['tela'];

    if(@$action == "cadastrar"){
        if(@$_POST['senha'] == @$_POST['confirmar_senha']){
            $userE = $pessoaDAO->getUserByEmail(@$_POST['email']);
            if(empty($userE)){
                $pessoaDAO->createUser(@$_POST);
                $view = '../view_user/index.php';

                $id = $pessoaDAO->getUserByEmail(@$_POST['email'])->id;
                $_SESSION['id'] = $id;
                $_SESSION['nome'] = @$_POST['nome'];

                header('location: '.$view);
            }else{ 
                $message = "Esse email já está cadastrado";
                $view = "../view_user/signup.php";
                include_once($view);
            }
        }else{
            $message = "As duas senhas devem ser iguais";
            $view = "../view_user/signup.php";
        require_once($view);
        }
        
        
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
        echo $var;
        $email = @$_POST['email'];
        $user = $pessoaDAO->getUserByEmail($email);

        if(empty($user)){
            $message = "Digite um email válido";
            $view = "../view_user/login.php";
            require_once($view);
        }else{
            if(@$_POST['pass'] == $user->senha){
                //iniciar a sessão
                $_SESSION['id'] = $user->id;
                $_SESSION['nome'] = $user->nome;
                //$view = @$url;
                
                echo $var;
                header("location: ../view_user/".$var.".php");
            }else{
                $message = "Senha incorreta";
                $view = "../view_user/login.php";
                require_once($view);
                //exibir que o usuário digitou uma senha errada
            }
        }
        
    }else if($action == "logout"){
        session_destroy();
        header('location: ../view_user/index.php');
    }

    if(@$view == '../view_adm/list_users.php'){
        $users = $pessoaDAO->getAll();
    }

    if(empty($view)){
        $view = "../view_user/login.php";
        require_once($view);
    }
    
    //require_once($view);

?>