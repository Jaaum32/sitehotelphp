<?php
require_once('../controller/conexao.php');
    class AcomDAO{
        private $pdo;

        function __construct($pdo){
            $this->pdo = $pdo;
        }

        function createAcom($acom){
            $sql = 'INSERT INTO tb_acomodacao (
                qtd_casal, qtd_solt, capacidade, tipo, subtipo, id_tarifa)
                VALUES (:qtd_casal, :qta_solt, :capacidade, :tipo, :subtipo, :id_tarifa);';

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':qtd_casal', $acom['qtd_casal']);
            $stmt->bindValue(':qtd_solt', $acom['qtd_solt']);
            $stmt->bindValue(':capacidade', ($acom['qtd_casal'] * 2 + $acom['qtd_solt']));
            $stmt->bindValue(':tipo', $acom['tipo']);
            $stmt->bindValue(':subtipo', $acom['subtipo']);
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
    }
?>