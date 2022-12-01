<?php
require_once('../controller/conexao.php');
    class ReservaDAO{
        private $pdo;

        function __construct($pdo){
            $this->pdo = $pdo;
        }

        function createReserva($reserva){
            //revisar banco de reserva e fazer o código do sql e seus binds
            $sql = '';
            $stmt = $this->$pdo->prepare($sql);

            return Sstmt->execute();
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