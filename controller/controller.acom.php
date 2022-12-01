<?php
    require_once('conexao.php');
    require_once('../models/acom.dao.php');
    
    $view = '../view_adm/list_acom.php';//view padrão
    $acomDAO = new AcomDAO($pdo);
    $action = @$_REQUEST['action'];

    if($action == "cadastrar"){
        if(!$_REQUEST['id']){//insert
            $acomDAO->createAcom(@$_POST);
        }else{//update
            echo "editar";
            $acomDAO->update(@$_POST);
        }
        
        $view = '../view_adm/list_acom.php';

        header('location:'.$view);

    }else if($action == "delete"){
        $id = @$_REQUEST['id'];

        $ra = $acomDAO->delete($id);

        //print_r($id);
        //print_r($ra);

        //if($ra > 0){
            //ações após excluir um usuário;
        //    print_r("removeu");
        //}else{
        //    print_r("n removeu");
            //tratar quando ngm for excluido
        //}
        
        $view = '../view_adm/list_acom.php';

        header('location:'.$view);

    }else if($action == "update"){
        if(@$_REQUEST['id']){
            $view = "../view_adm/form_acom.php";
            $acomodacao = $acomDAO->getAcomByID($_REQUEST['id']);
            require_once($view);
        }
    }else if($action == "procurar"){

        require_once("../controller/controller.res.php");
        $acoms = $acomDAO->getAcomByAllInfo(@$_POST);

        $dataEntrada = $_POST['data_entrada'];
        $dataSaida = $_POST['data_saida'];


        foreach($acoms as $index=> $acom){

            $reservas = $reservaDAO->getAllDatas($acom->id);

            foreach($reservas as $index2=> $reserva){
                echo $reserva->data_in;
                if($dataEntrada >= $reserva->data_in && $dataEntrada < $reserva->data_out){
                    unset($acoms[$index]);
                }
    
                if($dataSaida > $reserva->data_in && $dataSaida <= $reserva->data_out){
                    unset($acoms[$index]);
            }


            
            }

            //print_r($reservas);
            //echo sizeof($reservas);
        }



        $view = "../view_user/reserva.php";
        require_once($view);
    }

    if($view == '../view_adm/list_acom.php'){
        $acoms = $acomDAO->getAll();
    }

    //require_once($view);

?>