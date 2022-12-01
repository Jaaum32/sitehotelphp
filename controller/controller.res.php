<?php
    require_once('conexao.php');
    require_once('../models/res.dao.php');
    @session_start();

    //$view = '../view_adm/list_reservas.php';
    $reservaDAO = new ReservaDAO($pdo);
    $action = @$_REQUEST['action'];

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
            $id_tarifa = $_POST['id_tarifa'];
            require_once('../controller/controller.tar.php');
            $tarifa = $tarifaDAO->getTarifaById($id_tarifa);

            $id_user = $_SESSION['id'];
            $qtd_hospedes = $_REQUEST['qtd_adultos'] + $_REQUEST['qtd_criancas'];

            $preco = $tarifa->preco + $tarifa->precoA * ($_REQUEST['qtd_adultos'] - 1) +  $tarifa->precoC * $_REQUEST['qtd_criancas'];

            $reservaDAO->createReserva(@$_POST, $id_user, $qtd_hospedes, $preco);

            
            //$view = "";
        }
    }

    //if($view == '../view_adm/list_reservas.php'){
        $reservas = $reservaDAO->getAll();
    //}

    //require_once($view);

    //echo "sexxxx";
?>