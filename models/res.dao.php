<?php
require_once('../controller/conexao.php');
    class ReservaDAO{
        private $pdo;

        function __construct($pdo){
            $this->pdo = $pdo;
        }

        function createReserva($reserva, $user_id, $qtd_hospedes, $preco){
            //revisar banco de reserva e fazer o código do sql e seus binds
            $sql = "INSERT INTO tb_reserva(user_id, acom_id,qtd_hospedes, preco)
            VALUES (:user_id, :acom_id, :qtd_hospedes, :preco)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":user_id", $user_id);
            $stmt->bindValue(":acom_id", $reserva['acom_id']);
            $stmt->bindValue(":qtd_hospedes", $qtd_hospedes);
            $stmt->bindValue(":preco", $preco);

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
    }