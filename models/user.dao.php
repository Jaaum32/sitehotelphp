<?php
require_once('../controller/conexao.php');
    class PessoaDAO{
        private $pdo;
        
        function __construct($pdo){
            $this->pdo = $pdo;
        }


        function createUser($user){
            $sql = 'INSERT INTO tb_usuario (
                nome, email, telefone, perfil, senha)
                VALUES (:nome, :email, :telefone, :login, :senha);';
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':nome', $user['nome']);
            $stmt->bindValue(':email', $user['email']);
            $stmt->bindValue(':telefone', $user['telefone']);
            $stmt->bindValue(':login', $user['login']);
            $stmt->bindValue(':senha', $user['senha']);

            return $stmt->execute();
        }

        function getAll(){
            $sql = "SELECT * FROM tb_usuario";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }

        function delete($id){
            $sql = "DELETE FROM tb_usuario WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();

            return  $stmt->rowCount();
        }
    }
    
    
?>