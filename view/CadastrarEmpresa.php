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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


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
    <main>
        <h1 class="titulo-page">Cadastro de empresas</h1>
        <button type="button" class="btn-cadastrar" onclick="abrirModal()">Cadastrar nova empresa</button>
    </main>

    <section class="modal" id="modal-cadastro">
        <div class="modal-conteudo">
            <span class="fechar" onclick="fecharModal()">&times;</span>
            <h2 class="title-form">Cadastrar Empresa</h2>
            <form>
                <label for="razao-social">Razão Social</label>
                <input type="text" id="razao-social" name="razao-social" placeholder="Ex: Fulano LTDA" required>

                <label for="cnpj">CNPJ</label>
                <input type="text" id="cnpj" name="cnpj" placeholder="xx.xxx.xxx/xxxx-xx" required>

                <label for="nome-fantasia">Nome Fantasia</label>
                <input type="text" id="nome-fantasia" name="nome-fantasia" placeholder="Ex: Amazon">

                <label for="setores">Setores</label>
                <div class="setores-container">
                    <div class="selecionar-setor" onclick="toggleSetoresDropdown()">
                        <span id="setores-text">Selecionar setores</span>
                    </div>
                    <div class="setores-dropdown">
                        <div class="por-setor">
                            <label class="dropdown">
                                <input type="checkbox" name="setores" value="administrativo">
                                Administrativo
                            </label>
                        </div>

                        <div class="por-setor">
                            <label class="dropdown">
                                <input type="checkbox" name="setores" value="financeiro">
                                Financeiro
                            </label>
                        </div>

                        <div class="por-setor">
                            <label class="dropdown">
                                <input type="checkbox" name="setores" value="marketing">
                                Marketing
                            </label>
                        </div>

                        <div class="por-setor">
                            <label class="dropdown">
                                <input type="checkbox" name="setores" value="tecnologia">
                                Tecnologia
                            </label>
                        </div>

                        <div class="por-setor">
                            <label class="dropdown">
                                <input type="checkbox" name="setores" value="recursos-humanos">
                                Recursos Humanos
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-salvar">Cadastrar</button>
            </form>
        </div>
    </section>

    <hr>

    <section class="tabela">
        <h2>Empresas e Setores</h2>

        <table>
            <thead>
                <tr>
                    <th>Empresas</th>
                    <th>Setores</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Microsoft</td>
                    <td>Financeiro, RH, TI</td>
                    <td>
                        <button class="editar" onclick="editarLinha(this)"><i class="fas fa-edit"></i></button>
                        <button class="excluir" onclick="excluirLinha(this)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Facebook</td>
                    <td>Marketing, Jurídico</td>
                    <td>
                        <button class="editar" onclick="editarLinha(this)"><i class="fas fa-edit"></i></button>
                        <button class="excluir" onclick="excluirLinha(this)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Instagram</td>
                    <td>Comercial</td>
                    <td>
                        <button class="editar" onclick="editarLinha(this)"><i class="fas fa-edit"></i></button>
                        <button class="excluir" onclick="excluirLinha(this)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Apple</td>
                    <td>Operacional, Logístico</td>
                    <td>
                        <button class="editar" onclick="editarLinha(this)"><i class="fas fa-edit"></i></button>
                        <button class="excluir" onclick="excluirLinha(this)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Americanas</td>
                    <td>Administrativo</td>
                    <td>
                        <button class="editar" onclick="editarLinha(this)"><i class="fas fa-edit"></i></button>
                        <button class="excluir" onclick="excluirLinha(this)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="modal" id="modal-edicao">
        <div class="modal-conteudo">
            <span class="fechar" onclick="fecharModal()">&times;</span>
            <h2 class="title-form">Editar Empresa</h2>
            <form>
                <label for="edicao-razao-social">Razão Social</label>
                <input type="text" id="edicao-razao-social" name="edicao-razao-social" placeholder="Ex: Fulano LTDA" required>

                <label for="edicao-cnpj">CNPJ</label>
                <input type="text" id="edicao-cnpj" name="edicao-cnpj" placeholder="xx.xxx.xxx/xxxx-xx" required>

                <label for="edicao-nome-fantasia">Nome Fantasia</label>
                <input type="text" id="edicao-nome-fantasia" name="edicao-nome-fantasia" placeholder="Ex: Amazon">

                <label for="edicao-setores">Setores</label>
                <div class="setores-container">
                    <div class="selecionar-setor" onclick="toggleSetoresDropdown()">
                        <span id="edicao-setores-text">Selecionar setores</span>
                    </div>
                    <div class="setores-dropdown">
                        <div class="setores-dropdown">
                            <div class="por-setor">
                                <label class="dropdown">
                                    <input type="checkbox" name="setores" value="administrativo">
                                    Administrativo
                                </label>
                            </div>

                            <div class="por-setor">
                                <label class="dropdown">
                                    <input type="checkbox" name="setores" value="financeiro">
                                    Financeiro
                                </label>
                            </div>

                            <div class="por-setor">
                                <label class="dropdown">
                                    <input type="checkbox" name="setores" value="marketing">
                                    Marketing
                                </label>
                            </div>

                            <div class="por-setor">
                                <label class="dropdown">
                                    <input type="checkbox" name="setores" value="tecnologia">
                                    Tecnologia
                                </label>
                            </div>

                            <div class="por-setor">
                                <label class="dropdown">
                                    <input type="checkbox" name="setores" value="recursos-humanos">
                                    Recursos Humanos
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-salvar">Salvar Alterações</button>
            </form>
        </div>
    </section>

</body>

</html>