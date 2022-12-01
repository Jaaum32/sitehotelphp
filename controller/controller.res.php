<?php
    require_once('conexao.php');
    require_once('../models/res.dao.php');

    $view = '../view_adm/list_reservas.php';
    $reservaDAO = new ReservaDAO($pdo);
    $action = @$_REQUEST['action'];

    if($action == "cadastrar"){
        $reservaDAO->createReserva(@$_POST);
        $view = '../view_adm/list_reservas.php';
        header('location:'.$view);
    }else if($action == "delete"){
        $id = @$_REQUEST['id'];

        $ra = $reservaDAO->delete($id);

        // print_r($id);
        // print_r($ra);

        // if($ra > 0){
        //     //ações após excluir um usuário;
        //     print_r("removeu");
        // }else{
        //     print_r("n removeu");
        //     //tratar quando ngm for excluido
        // }

        $view = '../view_adm/list_tarifas.php';

        header('location:'.$view);
    }

    if($view == '../view_adm/list_reservas.php'){
        $reservas = $reservaDAO->getAll();
    }

    require_once($view);
?>