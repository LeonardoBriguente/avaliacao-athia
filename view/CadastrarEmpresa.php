<!DOCTYPE html>
<html lang="tp-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Gestão, empresa, setor">
    <meta name="author" content="Leonardo Briguente">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/cadastrarEmpresa.css">
    <script type="text/javascript" src="assets/js/cadastroEmpresa.js" defer></script>

    <title>SmartGestão</title>
</head>

<body>
    <header class="cabecalho">
        <div class="itens-logo">
            <img class="logo" src="assets/images/logo.png">
            <h1 class="nome-sistema"><a class="titulo" href="index.php">SmartGestão</a></h1>
        </div>

        <div class="caminhos">
            <a class="link" href="view/cadastrarEmpresa.php">Empresas</a>
            <a class="link link-meio" href="view/cadastrarSetores.php">Setores</a>
            <a class="link" href="view/relatorios.php">Relatórios</a>
        </div>
    </header>

    <div class="modal" id="modal-cadastro">
        <div class="modal-conteudo">
            <span class="fechar">&times;</span>
            <h2>Cadastrar Empresa</h2>
            <form>
                <label for="razao-social">Razão Social</label>
                <input type="text" id="razao-social" name="razao-social" placeholder="Ex: Fulano LTDA" required>

                <label for="cnpj">CNPJ</label>
                <input type="text" id="cnpj" name="cnpj" placeholder="xx.xxx.xxx/xxxx-xx" required>

                <label for="nome-fantasia">Nome Fantasia</label>
                <input type="text" id="nome-fantasia" name="nome-fantasia" placeholder="Ex: Amazon">

                <label for="setores">Setores</label>
                <div class="setores-container">
                    <div class="setores-selecionados" onclick="toggleSetoresDropdown()">
                        <span id="setores-text">Selecionar setores</span>
                    </div>
                    <div class="setores-dropdown">
                        <label class="dropdown">
                            <input type="checkbox" name="setores" value="administrativo">
                            Administrativo
                        </label>
                        <label class="dropdown">
                            <input type="checkbox" name="setores" value="financeiro">
                            Financeiro
                        </label>
                        <label class="dropdown">
                            <input type="checkbox" name="setores" value="marketing">
                            Marketing
                        </label>
                        <label class="dropdown">
                            <input type="checkbox" name="setores" value="tecnologia">
                            Tecnologia
                        </label>
                        <label class="dropdown">
                            <input type="checkbox" name="setores" value="recursos-humanos">
                            Recursos Humanos
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn-salvar">Cadastrar</button>
            </form>
        </div>
    </div>
</body>

</html>