class ModalCadastro {
    constructor() {
        this.modalElement = document.querySelector('.modal');
        this.dropdown = document.querySelector('.setores-dropdown');
        this.textElement = document.getElementById('setores-text');
        this.checkboxes = document.querySelectorAll('input[name="setores"]');
        this.container = document.querySelector('.setores-container');

        this._initializeEvents();
    }

    _initializeEvents() {
        this.checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => this.atualizarSetoresSelecionados());
        });

        document.addEventListener('click', (event) => {
            if (!this.container.contains(event.target)) {
                this.dropdown.style.display = 'none';
            }
        });
    }

    toggleSetoresDropdown() {
        this.dropdown.style.display = (this.dropdown.style.display === 'flex' ? 'none' : 'flex');
    }

    atualizarSetoresSelecionados() {
        const selectedSetores = Array.from(document.querySelectorAll('input[name="setores"]:checked'))
                                     .map(input => input.parentElement.textContent.trim());

        if (selectedSetores.length > 0) {
            this.textElement.textContent = selectedSetores.join(', ');
        } else {
            this.textElement.textContent = 'Selecionar setores';
        }
    }

    abrirModal() {
        this.modalElement.classList.add('ativo');
    }

    fecharModal() {
        this.modalElement.classList.remove('ativo');
    }
}

class TabelaEmpresas {
    constructor() {
        this.init();
    }

    init() {
        this.bindEvents();
    }

    bindEvents() {
        document.addEventListener('DOMContentLoaded', () => {
            this.inicializarEdicao();
            this.inicializarExclusao();
        });
    }

    inicializarEdicao() {
        const editarButtons = document.querySelectorAll('.editar');

        editarButtons.forEach(button => {
            button.addEventListener('click', (event) => this.editarLinha(event));
        });
    }

    inicializarExclusao() {
        const excluirButtons = document.querySelectorAll('.excluir');

        excluirButtons.forEach(button => {
            button.addEventListener('click', (event) => this.excluirLinha(event));
        });
    }

    editarLinha(event) {
        const row = event.target.closest('tr');
        const empresaCell = row.cells[0];
        const setoresCell = row.cells[1];

        const novaEmpresa = prompt('Editar Empresa:', empresaCell.textContent);
        const novoSetor = prompt('Editar Setores:', setoresCell.textContent);

        if (novaEmpresa !== null) empresaCell.textContent = novaEmpresa;
        if (novoSetor !== null) setoresCell.textContent = novoSetor;
    }

    excluirLinha(event) {
        const row = event.target.closest('tr');
        if (confirm('Deseja excluir esta linha?')) {
            row.remove();
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {

    const modalCadastro = new ModalCadastro();
    const tabelaEmpresas = new TabelaEmpresas();

    // Eventos do modal
    const btnAbrirModal = document.querySelector('.btn-cadastrar');
    if (btnAbrirModal) {
        btnAbrirModal.addEventListener('click', () => modalCadastro.abrirModal());
    }

    const btnFecharModal = document.querySelector('.fechar');
    if (btnFecharModal) {
        btnFecharModal.addEventListener('click', () => modalCadastro.fecharModal());
    }

    const btnToggleDropdown = document.querySelector('.setores-container');
    if (btnToggleDropdown) {
        btnToggleDropdown.addEventListener('click', () => modalCadastro.toggleSetoresDropdown());
    }
});
