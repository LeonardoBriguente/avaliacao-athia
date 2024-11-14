<?php

require_once '../model/database.php';
require_once '../model/Empresa.php';

class EmpresaController
{
    private $empresa;

    public function __construct()
    {
        $database = new Database('localhost', 'smartgestao', 'root', '');
        $db = $database->Connect();
        $this->empresa = new Empresa($db);
    }

    public function createEmpresa($razao_social, $nome_fantasia, $cnpj, $setores)
    {
        if ($this->empresa->Cadastrar($razao_social, $nome_fantasia, $cnpj, $setores)) {
            echo "<script type='text/javascript'>alert('Cadastro realizado com sucesso.');</script>";
            echo "<script type='text/javascript'>window.location.href = '../view/cadastrarEmpresa.php';</script>";
            exit();
        } else {
            echo "<script type='text/javascript'>alert('Falha ao cadastrar.');</script>";
            echo "<script type='text/javascript'>window.location.href = '../view/cadastrarEmpresa.php';</script>";
            exit();
        }
    }

    public function listarEmpresas()
    {
        $stmt = $this->empresa->ConsultarTodas();
        $tabelaHTML = '';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $razao_social = $row['razao_social'];
            $nome_fantasia = $row['nome_fantasia'];
            $cnpj = $row['cnpj'];

            $editarLink = "<button class='editar' onclick=\"abrirModalEdicaoEmpresa('$id', '$razao_social', '$nome_fantasia', '$cnpj')\"><i class='fas fa-edit'></i></button>";

            $excluirLink = "<a class='icon-trash' href='?acao=excluir&id=$id' onclick='return confirm(\"Você tem certeza que deseja excluir?\")'>
                                <i class='fas fa-trash-alt'></i>
                            </a>";

            $tabelaHTML .= "
                <tr>
                    <td>$razao_social</td>
                    <td>$nome_fantasia</td>
                    <td>$cnpj</td>
                    <td>
                        $editarLink
                        $excluirLink
                    </td>
                </tr>
            ";
        }

        $tabelaHTML = "
            <table>
                <thead>
                    <tr>
                        <th>Razão Social</th>
                        <th>Nome Fantasia</th>
                        <th>CNPJ</th>
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

    

    public function excluirEmpresa($id)
    {
        if ($this->empresa->Excluir($id)) {
            echo "<script type='text/javascript'>alert('Exclusão realizada com sucesso.');</script>";
            echo "<script type='text/javascript'>window.location.href = '../view/cadastrarEmpresas.php';</script>";
            exit();
        } else {
            echo "<script type='text/javascript'>alert('Falha ao excluir.');</script>";
            echo "<script type='text/javascript'>window.location.href = '../view/cadastrarEmpresas.php';</script>";
            exit();
        }
    }

    public function atualizarEmpresa($id, $razao_social, $nome_fantasia, $cnpj)
    {
        if ($this->empresa->Atualizar($id, $razao_social, $nome_fantasia, $cnpj)) {
            echo "<script type='text/javascript'>alert('Atualização realizada com sucesso.');</script>";
            echo "<script type='text/javascript'>window.location.href = '../view/cadastrarEmpresas.php';</script>";
            exit();
        } else {
            echo "<script type='text/javascript'>alert('Falha ao atualizar.');</script>";
            echo "<script type='text/javascript'>window.location.href = '../view/cadastrarEmpresas.php';</script>";
            exit();
        }
    }

    public function verificarAcao()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
            $acao = $_POST['acao'];

            switch ($acao) {
                case 'cadastrar':
                    $razao_social = $_POST['razao-social'];
                    $nome_fantasia = $_POST['nome-fantasia'];
                    $cnpj = $_POST['cnpj'];
                    $setores = isset($_POST['setores']) ? implode(',', $_POST['setores']) : '';

                    $this->createEmpresa($razao_social, $nome_fantasia, $cnpj, $setores);
                    break;

                case 'editar':
                    $id = $_POST['id'];
                    $razao_social = $_POST['razao_social'];
                    $nome_fantasia = $_POST['nome_fantasia'];
                    $cnpj = $_POST['cnpj'];
                    $this->atualizarEmpresa($id, $razao_social, $nome_fantasia, $cnpj);
                    break;
            }
        }

        if (isset($_GET['acao']) && $_GET['acao'] === 'excluir' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->excluirEmpresa($id);
        }
    }
}

$controller = new EmpresaController();
$controller->verificarAcao();
