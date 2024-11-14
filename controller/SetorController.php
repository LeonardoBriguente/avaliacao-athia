<?php

require_once '../model/database.php';
require_once '../model/setor.php';

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
            $mensagem = "Cadastro realizado com sucesso.";
            echo "<script type='text/javascript'>alert('$mensagem');</script>";

            echo "<script type='text/javascript'>window.location.href = '../view/cadastrarSetores.php';</script>";
            exit();
        } else {
            $mensagem = "Falha ao cadastrar.";
            echo "<script type='text/javascript'>alert('$mensagem');</script>";

            echo "<script type='text/javascript'>window.location.href = '../view/cadastrarSetores.php';</script>";
            exit();
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
            $descricao = $_POST['descricao'];
            $resultado = $controller->createSetor($descricao);

            if ($resultado == true) {
                // echo $resultado;
            }
            break;


            // Adicione mais casos conforme necessário
        default:
            $resultado = "false";
            break;
    }
    // echo $resultado;
}
