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
        $tabelaHTML = '';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $descricao = $row['descricao'];

            $tabelaHTML .= "
                <tr>
                    <td>$descricao</td>
                    <td>
                        <button class='editar' onclick='editarLinha(this)'><i class='fas fa-edit'></i></button>
                        <button class='excluir' onclick='excluirLinha(this)'><i class='fas fa-trash-alt'></i></button>
                    </td>
                </tr>
            ";
        }

        $tabelaHTML = "
            <table>
                <thead>
                    <tr>
                        <th>Setores</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    $tabelaHTML
                </tbody>
            </table>
        ";

        return $tabelaHTML;
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
