<?php
    require_once('conexao.php');
    require_once('../models/tar.dao.php');

    $view = '../view_adm/list_tarifas.php';
    $tarifaDAO = new TarifaDAO($pdo);
    $action = @$_REQUEST['action'];

    if($action == "cadastrar"){
        $teste = $tarifaDAO->createTarifa(@$_POST);
        $view = '../view_adm/list_tarifas.php';

        header('location:'.$view);
    }else if($action == "delete"){
        $id = @$_REQUEST['id'];

        $ra = $tarifaDAO->delete($id);

        // print_r($id);
        // print_r($ra);

        // if($ra > 0){
        //     //ações após excluir um usuário;
        //     print_r("removeu");
        // }else{
        //     print_r("n removeu");
        //     //tratar quando ngm for excluido
        // }
    }

    if($view == '../view_adm/list_tarifas.php'){
        $tarifas = $tarifaDAO->getAll();
    }

    require_once($view);
?>