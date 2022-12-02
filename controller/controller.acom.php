<?php
require_once('conexao.php');
require_once('../models/acom.dao.php');

$view = '../view_adm/list_acom.php'; //view padrão
$acomDAO = new AcomDAO($pdo);
$action = @$_REQUEST['action'];

if ($action == "cadastrar") {
    if (!$_REQUEST['id']) { //insert
        $acomDAO->createAcom(@$_POST);
    } else { //update
        $acomDAO->update(@$_POST);
    }

    $view = '../view_adm/list_acom.php';

    header('location:' . $view);

} else if ($action == "delete") {
    $id = @$_REQUEST['id'];

    $var = $acomDAO->delete($id);
    if ($var !== 1 && $var !== 0) {
        $message = $var;
    }

    $acoms = $acomDAO->getAll();
    $view = '../view_adm/list_acom.php';
    require_once($view);

} else if ($action == "update") {
    if (@$_REQUEST['id']) {
        $view = "../view_adm/form_acom.php";
        $acomodacao = $acomDAO->getAcomByID($_REQUEST['id']);
        require_once($view);
    }
} else if ($action == "procurar") {
    require_once("../controller/controller.res.php");
    if (@$_POST['tipo'] == "Todos") {
        $acoms = $acomDAO->getTodas(@$_POST);
    } else {
        $acoms = $acomDAO->getAcomByAllInfo(@$_POST);
    }


    $dataEntrada = $_POST['data_entrada'];
    $dataSaida = $_POST['data_saida'];


    foreach ($acoms as $index => $acom) {

        $reservas = $reservaDAO->getAllDatas($acom->id);

        foreach ($reservas as $index2 => $reserva) {
            if ($dataEntrada >= $reserva->data_in && $dataEntrada < $reserva->data_out) {
                unset($acoms[$index]);
            }

            if ($dataSaida > $reserva->data_in && $dataSaida <= $reserva->data_out) {
                unset($acoms[$index]);
            }



        }
    }

    $view = "../view_user/reserva.php";
    require_once($view);
} else if ($action == "todas") {
    require_once("../controller/controller.res.php");
    $acoms = $acomDAO->getAll();


    $_POST['num_adultos'] = 1;
    $_POST['num_criancas'] = 0;

    $acoms = $acomDAO->getTodas(@$_POST);


    date_default_timezone_set("America/Sao_Paulo");
    $d = strtotime("tomorrow");
    $amanha = date("Y-m-d", $d);


    $dataEntrada = date('Y-m-d');
    $dataSaida = $amanha;

    foreach ($acoms as $index => $acom) {

        $reservas = $reservaDAO->getAllDatas($acom->id);

        foreach ($reservas as $index2 => $reserva) {
            if ($dataEntrada >= $reserva->data_in && $dataEntrada < $reserva->data_out) {
                unset($acoms[$index]);
            }

            if ($dataSaida > $reserva->data_in && $dataSaida <= $reserva->data_out) {
                unset($acoms[$index]);
            }

        }
    }

    $view = "../view_user/reserva.php";
    require_once($view);
}

if ($view == '../view_adm/list_acom.php') {
    $acoms = $acomDAO->getAll();
}
?>