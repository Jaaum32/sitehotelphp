<?php
require_once('../controller/conexao.php');
    class AcomDAO{
        private $pdo;

        function __construct($pdo){
            $this->pdo = $pdo;
        }

        function createAcom($acom){
            $tipo = "";
            $subtipo = "";

            if($acom['id_tarifa']>3){
                $tipo = "Luxo";
            }else{
                $tipo = "Standard";
            }

            if($acom['id_tarifa'] % 3 == 0){
                $subtipo = "Familia";
            }else if($acom['id_tarifa'] % 2 == 0){
                $subtipo = "Triplo";
            }else{
                $subtipo = "Duplo";
            }


            $sql = 'INSERT INTO tb_acomodacao (
                qtd_casal, qtd_solt, capacidade, tipo, subtipo, id_tarifa)
                VALUES (:qtd_casal, :qtd_solt, :capacidade, :tipo, :subtipo, :id_tarifa);';

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':qtd_casal', $acom['qtd_casal']);
            $stmt->bindValue(':qtd_solt', $acom['qtd_solt']);
            $stmt->bindValue(':capacidade', ($acom['qtd_casal'] * 2 + $acom['qtd_solt']));
            $stmt->bindValue(':tipo', $tipo);
            $stmt->bindValue(':subtipo', $subtipo);
            $stmt->bindValue(':id_tarifa', $acom['id_tarifa']);


            return $stmt->execute();
        }

        function getAll(){
            $sql = "SELECT * FROM tb_acomodacao";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }

        function delete($id){
            $sql = "DELETE FROM tb_acomodacao WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();

            return $stmt->rowCount();
        }

        function getAcomByID($id){
            $sql = "SELECT * FROM tb_acomodacao WHERE id = ?";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $id);

            $stmt->execute();

            return $stmt->fetchObject();
        }

        function getAcomByAllInfo($acom){

            $tipo = $acom['tipo'];

            $sql = 'SELECT * FROM tb_acomodacao WHERE capacidade >= :capacidade AND tipo = :tipo';

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":capacidade", $acom['num_adultos'] + $acom['num_criancas']);
            $stmt->bindValue(":tipo",$tipo);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }

        function getTodas($acom){

            $sql = 'SELECT * FROM tb_acomodacao WHERE capacidade >= :capacidade';

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":capacidade", $acom['num_adultos'] + $acom['num_criancas']);;

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }

        function update($acom){

            $tipo = "";
            $subtipo = "";

            if($acom['id_tarifa']>3){
                $tipo = "Luxo";
            }else{
                $tipo = "Standard";
            }

            if($acom['id_tarifa'] % 3 == 0){
                $subtipo = "Familia";
            }else if($acom['id_tarifa'] % 2 == 0){
                $subtipo = "Triplo";
            }else{
                $subtipo = "Duplo";
            }

            $sql = "UPDATE tb_acomodacao
                SET qtd_casal = :qtd_casal, qtd_solt = :qtd_solt, capacidade = :capacidade, tipo = :tipo, subtipo = :subtipo, id_tarifa = :id_tarifa
                WHERE id = :id";;

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':qtd_casal', $acom['qtd_casal']);
            $stmt->bindValue(':qtd_solt', $acom['qtd_solt']);
            $stmt->bindValue(':capacidade', ($acom['qtd_casal'] * 2 + $acom['qtd_solt']));
            $stmt->bindValue(':tipo', $tipo);
            $stmt->bindValue(':subtipo', $subtipo);
            $stmt->bindValue(':id_tarifa', $acom['id_tarifa']);
            $stmt->bindValue(':id', $acom['id']);

            return $stmt->execute();
        }
    }
?>