<?php
require_once('../controller/conexao.php');
    class TarifaDAO{
        private $pdo;

        function __construct($pdo){
            $this->pdo = $pdo;
        }

        function createTarifa($tarifa){
            $sql = 'INSERT INTO tb_tarifa (
                preco, precoC, precoA)
                VALUES (:preco, :precoC, :precoA);';
                
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':preco', $tarifa['preco']);
            $stmt->bindValue(':precoC', $tarifa['precoC']);
            $stmt->bindValue(':precoA', $tarifa['precoA']);
            
            return $stmt->execute();
        }

        function getAll(){
            $sql = "SELECT * FROM tb_tarifa";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }

        function delete($id){
            $sql = "DELETE FROM tb_tarifa WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            try {
                $stmt->execute();
            }catch(Exception $e){
                return "esta tarifa esta em uso, portanto, não pode ser excluida";
            }
            return $stmt->rowCount();
        }

        function getTarifaById($id){
            $sql = "SELECT * FROM tb_tarifa WHERE id = ?";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $id);

            $stmt->execute();

            return $stmt->fetchObject();
        }

        function update($tarifa){
            $sql = "UPDATE tb_tarifa
            SET preco = :preco, precoC = :precoC, precoA = :precoA
            WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':preco', $tarifa['preco']);
            $stmt->bindValue(':precoC', $tarifa['precoC']);
            $stmt->bindValue(':precoA', $tarifa['precoA']);
            $stmt->bindValue(':id', $tarifa['id']);

            return $stmt->execute();
        }
    }
?>
