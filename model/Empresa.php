<?php

class Empresa
{
    private $pdo;

    private $id;

    public function __construct($db)
    {
        $this->pdo = $db;
    }

    public function Cadastrar($razao_social, $nome_fantasia, $cnpj)
    {
        $query = "INSERT INTO empresa (razao_social, nome_fantasia, cnpj) VALUES (:razao_social, :nome_fantasia, :cnpj)";

        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(":razao_social", $razao_social);
        $stmt->bindParam(":nome_fantasia", $nome_fantasia);
        $stmt->bindParam(":cnpj", $cnpj);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function ConsultarTodas()
    {
        $query = "SELECT id, razao_social, nome_fantasia, cnpj FROM empresa";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function Excluir($id)
    {
        $query = "DELETE FROM emmpresa WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


    public function Atualizar($id, $razao_social, $nome_fantasia, $cnpj)
    {
        $query = "UPDATE empresa SET razao_social = :razao_social, nome_fantasia = :nome_fantasia, cnpj = :cnpj WHERE id = :id";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':razao_social', $razao_social);
        $stmt->bindParam(':nome_fantasia', $nome_fantasia);
        $stmt->bindParam(':cnpj', $cnpj);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>