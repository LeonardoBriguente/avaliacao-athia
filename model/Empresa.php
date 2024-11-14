<?php

class Empresa
{
    private $pdo;

    private $id;

    public function __construct($db)
    {
        $this->pdo = $db;
    }

    public function Cadastrar($razao_social, $nome_fantasia, $cnpj, $setores)
    {
        $query = "INSERT INTO empresa (razao_social, nome_fantasia, cnpj) VALUES (:razao_social, :nome_fantasia, :cnpj)";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':razao_social', $razao_social);
        $stmt->bindParam(':nome_fantasia', $nome_fantasia);
        $stmt->bindParam(':cnpj', $cnpj);

        if ($stmt->execute()) {
            $empresaId = $this->pdo->lastInsertId();
            foreach ($setores as $setor) {
                $this->AssociarSetorAEmpresa($empresaId, $setor);
            }
            return true;
        }

        return false;
    }

    private function AssociarSetorAEmpresa($empresaId, $setor)
    {
        $query = "INSERT INTO empresa_setor (empresa_id, setor_id) VALUES (:empresa_id, :setor_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':empresa_id', $empresaId);
        $stmt->bindParam(':setor_id', $setor);
        $stmt->execute();
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
    
    public function ConsultarSetoresPorEmpresa($empresaId)
    {
        $query = "SELECT descricao FROM setores WHERE empresa_id = :empresa_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':empresa_id', $empresaId);
        $stmt->execute();
        return $stmt;
    }
}
?>