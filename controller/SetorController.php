<?php

require_once 'Database.php';
require_once 'Setor.php';

class SetorController
{
    private $setor;

    public function __construct()
    {
        $database = new Database('localhost', 'smartgestao', 'root', '');
        $db = $database->Connect();
        $this->setor = new Setor($db);
    }

    public function createSetor($descricao)
    {
        if ($this->setor->Cadastrar($descricao)) {
            echo "Setor cadastrado com sucesso!";
        } else {
            echo "Falha ao cadastrar o setor.";
        }
    }

    public function listarSetores()
    {
        $stmt = $this->setor->ConsultarTodos();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            echo "ID: $id | Descrição: $descricao<br>";
        }
    }
}
?>
