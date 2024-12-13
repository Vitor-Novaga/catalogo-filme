<?php

require_once __DIR__ . "\..\config\database.php";


// Classe que representa a tabela filme no projeto

class Filme {

    private $tabela = "filme";

    private $pdo;

    // colunas da tabela 

    public $id;
    public $nome;
    public $ano;
    public $descricao;
    public $imagem;

    public function __construct() {

        global $pdo;

        $this->pdo = $pdo;
    }

    public function buscarTodos() {
        $query = "SELECT * FROM $this->tabela ORDER BY id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
    
        return $stmt->fetchAll();
    }

    // Metodo para buscar filme por id
    public function buscarPorId($id){
        $query = "SELECT * FROM $this->tabela WHERE id = :id";

        $stmt= $this->pdo->prepare($query);
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS,__CLASS__);

        return $stmt->fetch();
    }
    public function excluir($id) {
        $query = "DELETE FROM $this->tabela WHERE id= :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function inserir($nome, $ano, $descricao, $imagem) {
        $query = "INSERT INTO $this->tabela (nome, ano, descricao, imagem)
            VALUES (:nome, :ano, :descricao, :imagem)";

            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":ano", $ano);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":imagem", $imagem);
            $stmt->execute();

            return $stmt->rowCount() > 0;  
    }

    public function editar($id, $nome, $ano, $descricao, $imagem) {
        $query = "UPDATE $this->tabela SET nome = :nome, ano = :ano, descricao = :descricao, imagem = :imagem WHERE id = :id";

            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT) ;
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":ano", $ano);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":imagem", $imagem);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        }
    
}

// UPDATE `biblioteca`.`cliente` SET `nome` = 'Ana Silvana', `cpf` = '123.456.789-01', `nascimento` = '1991-01-15' WHERE (`ID` = '1');