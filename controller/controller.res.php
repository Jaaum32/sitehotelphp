<?php
    require_once('conexao.php');
    require_once('../models/res.dao.php');
    @session_start();

    //$view = '../view_adm/list_reservas.php';
    $reservaDAO = new ReservaDAO($pdo);
    $action = @$_REQUEST['action'];
    $var = @$_REQUEST['tela'];

    if($action == "delete"){
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

        $view = '../view_adm/list_reservas.php';

        header('location:'.$view);
    }else if($action == "reservar"){
        if(empty($_SESSION)){
            $view = "../view_user/login.php";
            //echo "n tá logado ainda";
            require_once($view);
        }else{
            print_r($_POST);
            print_r($_REQUEST);
            $id_tarifa = $_POST['id_tarifa'];
            require_once('../controller/controller.tar.php');
            $tarifa = $tarifaDAO->getTarifaById($id_tarifa);

            $id_user = $_SESSION['id'];
            $qtd_hospedes = intval($_REQUEST['qtd_adultos']) + intval($_REQUEST['qtd_criancas']);

            $preco = $tarifa->preco + $tarifa->precoA * (intval($_REQUEST['qtd_adultos']) - 1) +  $tarifa->precoC * intval($_REQUEST['qtd_criancas']);

            $entrada = @$_REQUEST['entrada'];
            $saida = @$_REQUEST['saida'];

            echo $entrada;
            echo $saida;

            $reservaDAO->createReserva(@$_POST, $id_user, $qtd_hospedes, $preco, $entrada, $saida);

            
            $view = "../view_user/";
            header('location: ' . $view);
        }
    }

    //if($view == '../view_adm/list_reservas.php'){
        $reservas = $reservaDAO->getAll();
    //}

    //require_once($view);

    //echo "";
?>