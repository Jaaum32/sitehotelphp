<?php
    require_once('conexao.php');
    require_once('../models/acom.dao.php');
    
    $view = '../view_adm/list_acom.php';//view padrão
    $acomDAO = new AcomDAO($pdo);
    $action = @$_REQUEST['action'];

    if($action == "cadastrar"){
        $teste = $acomDAO->createAcom(@$_POST);
        $view = '../view_adm/list_acom.php';

        header('location:'.$view);
    }else if($action == "delete"){
        $id = @$_REQUEST['id'];

        $ra = $acomDAO->delete($id);

        print_r($id);
        print_r($ra);

        if($ra > 0){
            //ações após excluir um usuário;
            print_r("removeu");
        }else{
            print_r("n removeu");
            //tratar quando ngm for excluido
        }
    }

    if($view == '../view_adm/list_acom.php'){
        $acoms = $acomDAO->getAll();
    }

    require_once($view);

?>