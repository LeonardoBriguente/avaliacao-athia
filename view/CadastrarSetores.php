<?php
session_start();

require_once '../controller/SetorController.php';

$controller = new SetorController();
// $controller->verificarAcao();

$tabela = $controller->listarSetores();
?>

<!DOCTYPE html>
<html lang="tp-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Gestão, empresa, setor">
    <meta name="author" content="Leonardo Briguente">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/cadastrarSetores.css">
    <script type="text/javascript" src="assets/js/cadastroSetores.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>SmartGestão</title>
</head>

<body>
    <header class="cabecalho">
        <div class="itens-logo">
            <img class="logo" src="assets/images/logo.png">
            <h1 class="nome-sistema"><a class="titulo" href="../index.php">SmartGestão</a></h1>
        </div>

        <div class="caminhos">
            <a class="link" href="view/cadastrarEmpresa.php">Empresas</a>
            <a class="link link-meio" href="view/cadastrarSetores.php">Setores</a>
            <a class="link" href="view/relatorios.php">Relatórios</a>
        </div>
    </header>

    <main>
        <h1 class="titulo-page">Cadastro de setores</h1>
        <form action="../controller/setorController.php" method="post">
            <input type="hidden" name="acao" value="cadastrar">
            <label for="descricao">Setor:</label>
            <input type="text" id="descricao" name="descricao" placeholder="Ex: Recursos Humanos" required>

            <button type="submit" class="btn-cadastrar">Cadastrar setor</button>
        </form>
    </main>



    <hr>

    <section class="tabela">
        <h2>Empresas e Setores</h2>
        <?php
            if (isset($_SESSION['mensagem'])) {
                echo "<script type='text/javascript'>alert('{$_SESSION['mensagem']}');</script>";
                unset($_SESSION['mensagem']);
            }

            echo $tabela;
        ?>
    </section>

    <section class="modal" id="modal-edicao">
        <div class="modal-conteudo">
            <span class="fechar" onclick="fecharModal()">&times;</span>
            <h2 class="title-form">Editar Setor</h2>
            <form id="form-edicao" method="post" action="../controller/SetorController.php">
                <input type="hidden" name="acao" value="editar">
                <input type="hidden" id="id-setor-edicao" name="id">

                <label for="descricao-edicao">Descrição do Setor</label>
                <input type="text" id="descricao-edicao" name="descricao" required>

                <button type="submit" class="btn-salvar">Salvar Alterações</button>
            </form>
        </div>
    </section>

    <script>
        function abrirModalEdicao(id, descricao) {
            document.getElementById('id-setor-edicao').value = id;
            document.getElementById('descricao-edicao').value = descricao;
            document.getElementById('modal-edicao').style.display = 'block';
        }

        function fecharModal() {
            document.getElementById('modal-edicao').style.display = 'none';
        }
    </script>

</body>

</html>