<?php
require_once('conexao.php');
require_once('../models/res.dao.php');
@session_start();

$reservaDAO = new ReservaDAO($pdo);
$action = @$_REQUEST['action'];
$var = @$_REQUEST['tela'];

if ($action == "delete") {
    $id = @$_REQUEST['id'];

    $reservaDAO->delete($id);

    $view = '../view_adm/list_reservas.php';

    header('location:' . $view);
} else if ($action == "reservar") {
    if (empty($_SESSION)) {
        $view = "../view_user/login.php";
        require_once($view);
    } else {
        $id_tarifa = $_POST['id_tarifa'];
        require_once('../controller/controller.tar.php');
        $tarifa = $tarifaDAO->getTarifaById($id_tarifa);

        $id_user = $_SESSION['id'];
        $qtd_hospedes = intval($_REQUEST['qtd_adultos']) + intval($_REQUEST['qtd_criancas']);

        $preco = $tarifa->preco + $tarifa->precoA * (intval($_REQUEST['qtd_adultos']) - 1) + $tarifa->precoC * intval($_REQUEST['qtd_criancas']);

        $entrada = @$_REQUEST['entrada'];
        $saida = @$_REQUEST['saida'];

        $reservaDAO->createReserva(@$_POST, $id_user, $qtd_hospedes, $preco, $entrada, $saida);


        $view = "../view_user/";
        header('location: ' . $view);
    }
}

$reservas = $reservaDAO->getAll();

?>