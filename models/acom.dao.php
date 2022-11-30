<?php
require_once('../controller/conexao.php');
    class AcomDAO{
        private $pdo;

        function __construct($pdo){
            $this->pdo = $pdo;
        }

        function createAcom($acom){
            $sql = 'INSERT INTO tb_acomodacao (
                qtd_casal, qtd_solt, qtd_ext, tipo)
                VALUES (:qtd_casal, :qta_solt, :qtd_ext, :tipo);';

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':qtd_casal', $acom['qtd_casal']);
            $stmt->bindValue(':qtd_solt', $acom['qtd_solt']);
            $stmt->bindValue(':qtd_ext', $acom['qtd_ext']);
            $stmt->bindValue(':tipo', $acom['tipo']);

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