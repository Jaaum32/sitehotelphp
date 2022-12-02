<?php
require_once('conexao.php');
require_once('../models/tar.dao.php');

$view = '../view_adm/list_tarifas.php';
$tarifaDAO = new TarifaDAO($pdo);
$action = @$_REQUEST['action'];

if ($action == "cadastrar") {
    if (!$_REQUEST['id']) {
        $tarifaDAO->createTarifa(@$_POST);
    } else {
        $tarifaDAO->update(@$_POST);
    }

    $view = '../view_adm/list_tarifas.php';

    header('location:' . $view);
} else if ($action == "delete") {
    $id = @$_REQUEST['id'];

    $var = $tarifaDAO->delete($id);
    if ($var !== 1 && $var !== 0) {
        $message = $var;
    }

    $tarifas = $tarifaDAO->getAll();
    $view = '../view_adm/list_tarifas.php';
    require_once($view);
} else if ($action == "update") {
    if (@$_REQUEST['id']) {
        $view = "../view_adm/form_tarifas.php";
        $tarifa = $tarifaDAO->getTarifaById($_REQUEST['id']);
        require_once($view);
    }
}

if ($view == '../view_adm/list_tarifas.php') {
    $tarifas = $tarifaDAO->getAll();
}

?>