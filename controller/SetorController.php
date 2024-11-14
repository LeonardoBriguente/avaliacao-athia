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

    // Método para cadastrar um setor
    public function createSetor($descricao)
    {
        if ($this->setor->Cadastrar($descricao)) {
            // Exibe mensagem de sucesso
            echo "<script type='text/javascript'>alert('Cadastro realizado com sucesso.');</script>";
            echo "<script type='text/javascript'>window.location.href = '../view/cadastrarSetores.php';</script>";
            exit();
        } else {
            // Exibe mensagem de erro
            echo "<script type='text/javascript'>alert('Falha ao cadastrar.');</script>";
            echo "<script type='text/javascript'>window.location.href = '../view/cadastrarSetores.php';</script>";
            exit();
        }
    }

    // Método para listar setores
    public function listarSetores()
    {
        $stmt = $this->setor->ConsultarTodos();
        $tabelaHTML = '';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $descricao = $row['descricao'];

            // Criação dos botões de ações, incluindo o botão de excluir
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

        // Montagem da tabela completa
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

    // Método para excluir um setor
    public function excluirSetor($id)
    {
        if ($this->setor->Excluir($id)) {
            // Exibe mensagem de sucesso na exclusão
            echo "<script type='text/javascript'>alert('Setor excluído com sucesso.');</script>";
            echo "<script type='text/javascript'>window.location.href = '../view/cadastrarSetores.php';</script>";
            exit();
        } else {
            // Exibe mensagem de erro na exclusão
            echo "<script type='text/javascript'>alert('Falha ao excluir o setor.');</script>";
            echo "<script type='text/javascript'>window.location.href = '../view/cadastrarSetores.php';</script>";
            exit();
        }
    }

    // Método para verificar as ações recebidas
    public function verificarAcao()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
            $acao = $_POST['acao'];

            switch ($acao) {
                case 'cadastrar':
                    $descricao = $_POST['descricao'];
                    $this->createSetor($descricao);
                    break;
                // Adicione outros casos conforme necessário
            }
        }

        if (isset($_GET['acao']) && $_GET['acao'] === 'excluir' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->excluirSetor($id);
        }
    }
}
?>
