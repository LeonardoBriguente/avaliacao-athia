<?php

class Setor
{
    private $pdo;


    private $id;

    public function __construct($db)
    {
        $this->pdo = $db;
    }

    public function Cadastrar($descricao)
    {
        $query = "INSERT INTO setor (descricao) VALUES (:descricao)";

        $stmt = $this->pdo->prepare($query);


        $stmt->bindParam(":descricao", $descricao);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function ConsultarTodos()
    {
        $query = "SELECT id, descricao FROM setor";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function Excluir($id)
    {
        $query = "DELETE FROM setor WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function Atualizar($id, $descricao)
    {
        $query = "UPDATE setor SET descricao = :descricao WHERE id = :id";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
