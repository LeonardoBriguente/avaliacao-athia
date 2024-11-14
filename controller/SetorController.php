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
            $_SESSION['mensagem'] = "Cadastro realizado com sucesso.";
        } else {
            $_SESSION['mensagem'] = "Falha ao cadastrar.";
        }

        header('Location: ../view/cadastrarSetores.php');  // Redireciona para a página de setores
        exit();
    }

    public function listarSetores()
    {
        $stmt = $this->setor->ConsultarTodos();
        $tabelaHTML = '';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $descricao = $row['descricao'];


            $excluirLink = "<a class='icon-trash' href='?excluir=$id' onclick='return confirm(\"Você tem certeza que deseja excluir?\")'>
                                <i class='fas fa-trash-alt'></i>
                             </a>";

            $tabelaHTML .= "
                <tr>
                    <td>$descricao</td>
                    <td>
                        <button class='editar' onclick='editarLinha(this)'><i class='fas fa-edit'></i></button>
                        $excluirLink
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


    public function excluirSetor($id)
    {
        if ($this->setor->Excluir($id)) {
            $_SESSION['mensagem'] = "Setor excluído com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Falha ao excluir o setor.";
        }
        
        header('Location: ../view/cadastrarSetores.php');  // Redireciona para a página de setores
        exit();
    }

    public function verificarAcao()
    {
        if (isset($_GET['excluir'])) {
            $id = $_GET['excluir'];
            $this->excluirSetor($id); 
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
