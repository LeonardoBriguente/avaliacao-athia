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

document.addEventListener('DOMContentLoaded', () => {
    const modalCadastro = new ModalCadastro();

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
