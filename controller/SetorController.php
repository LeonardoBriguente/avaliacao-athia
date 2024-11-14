<?php

require_once './model/database.php';
require_once './model/setor.php';

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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
    $controller = new SetorController();

    switch ($_POST['acao']) {
        case 'cadastrar':
            $resultado = $controller->createSetor($_POST);

            if ($resultado == true) {
                echo $resultado;
            }
            break;


            // Adicione mais casos conforme necessário
        default:
            $resultado = "false";
            break;
    }
    echo $resultado;
}
