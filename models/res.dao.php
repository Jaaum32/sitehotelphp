<?php
require_once('../controller/conexao.php');
    class ReservaDAO{
        private $pdo;

        function __construct($pdo){
            $this->pdo = $pdo;
        }

        function createReserva($reserva, $user_id, $qtd_hospedes, $preco, $entrada, $saida){
            //revisar banco de reserva e fazer o código do sql e seus binds
            $sql = "INSERT INTO tb_reserva(user_id, acom_id,qtd_hospedes, preco, data_in, data_out)
            VALUES (:user_id, :acom_id, :qtd_hospedes, :preco, :data_in, :data_out)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":user_id", $user_id);
            $stmt->bindValue(":acom_id", $reserva['acom_id']);
            $stmt->bindValue(":qtd_hospedes", $qtd_hospedes);
            $stmt->bindValue(":preco", $preco);
            $stmt->bindValue(":data_in", $entrada);
            $stmt->bindValue(":data_out", $saida);

            return $stmt->execute();
        }

        function getAll(){
            $sql = "SELECT * FROM tb_reserva";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }

        function delete($id){
            $sql = "DELETE FROM tb_reserva WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();

            return $stmt->rowCount();
        }

        function getReservaById($id){
            $sql = "SELECT * FROM tb_reserva WHERE id = ?";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $id);

            $stmt->execute();

            return $stmt->fetchObject();
        }

        function getAllDatas($id_acom){
            $sql = "SELECT acom_id, data_in, data_out FROM tb_reserva
                WHERE acom_id = :id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":id", $id_acom);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }
    }