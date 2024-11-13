<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Gestão, empresa, setor">
    <meta name="author" content="Leonardo Briguente">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="view/assets/css/index.css">

    <title>SmartGestão</title>
</head>

<body>
    <header class="cabecalho">
        <div class="itens-logo">
            <img class="logo" src="view/assets/images/logo.png">
            <h1 class="nome-sistema"><a class="titulo" href="index.php">SmartGestão</a></h1>
        </div>

        <div class="caminhos">
            <a class="link" href="view/cadastrarEmpresa.php">Empresas</a>
            <a class="link link-meio" href="view/cadastrarSetores.php">Setores</a>
            <a class="link" href="view/relatorios.php">Relatórios</a>
        </div>
    </header>

    <main>
        <Section class="todos-cards">
            <div class="card">
                <p class="numero-principal">57</p>
                <p class="texto-chave">Empresas</p>
                <p class="texto-complementar">gerenciadas pela plataforma</p>
            </div>

            <div class="card">
                <p class="numero-principal">60</p>
                <p class="texto-chave">Setores</p>
                <p class="texto-complementar">cadastrados na plataforma</p>
            </div>
        </Section>

        <p class="mensagem">Sua gestão de maneira rápida e eficaz!</p>

        <div class="acesso-rapido">
            <button class="btn"><a href="view/cadastrarEmpresa.php">Cadastrar Empresa</a></button>
            <button class="btn"><a href="view/cadastrarSetores.php">Cadastrar Setores</a></button>
            <button class="btn"><a href="view/relatorios.php">Visualizar Relatórios</a></button>
        </div>
    </main>

</body>

</html>