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

            echo "<script type='text/javascript'>alert('Cadastro realizado com sucesso.');</script>";
            echo "<script type='text/javascript'>window.location.href = '../view/cadastrarSetores.php';</script>";
            exit();
        } else {

            echo "<script type='text/javascript'>alert('Falha ao cadastrar.');</script>";
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


            $excluirLink = "<a class='icon-trash' href='../controller/SetorController.php?acao=excluir&id=$id' onclick='return confirm(\"Você tem certeza que deseja excluir?\")'>
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

            echo "<script type='text/javascript'>alert('Setor excluído com sucesso.');</script>";
            echo "<script type='text/javascript'>window.location.href = '../view/cadastrarSetores.php';</script>";
            exit();
        } else {

            echo "<script type='text/javascript'>alert('Falha ao excluir o setor.');</script>";
            echo "<script type='text/javascript'>window.location.href = '../view/cadastrarSetores.php';</script>";
            exit();
        }
    }

    public function verificarAcao()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
            $acao = $_POST['acao'];

            switch ($acao) {
                case 'cadastrar':
                    $descricao = $_POST['descricao'];
                    $this->createSetor($descricao);
                    break;
            }
        }

        if (isset($_GET['acao']) && $_GET['acao'] === 'excluir' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->excluirSetor($id);
        }
    }
}

$controller = new SetorController();
$controller->verificarAcao();
?>
