// Função para alternar a visibilidade do dropdown dos setores
function toggleSetoresDropdown() {
    const dropdown = document.querySelector('.setores-dropdown');
    dropdown.style.display = (dropdown.style.display === 'flex' ? 'none' : 'flex');
}

// Função para atualizar o texto do botão com os setores selecionados
function atualizarSetoresSelecionados() {
    // Obtém todas as checkboxes que estão marcadas
    const selectedSetores = Array.from(document.querySelectorAll('input[name="setores"]:checked'))
        .map(input => input.parentElement.textContent.trim());

    // Atualiza o texto do botão de setores
    const textElement = document.getElementById('setores-text');
    if (selectedSetores.length > 0) {
        textElement.textContent = selectedSetores.join(', ');
    } else {
        textElement.textContent = 'Selecionar setores';
    }
}

// Função para fechar o modal
function fecharModal() {
    document.querySelector('.modal').classList.remove('ativo');
}

// Função para abrir o modal
function abrirModal() {
    document.querySelector('.modal').classList.add('ativo');
}

// Adiciona eventos para o comportamento do dropdown dos setores
document.addEventListener('DOMContentLoaded', function () {
    // Adiciona o evento de clique para cada checkbox no dropdown dos setores
    const checkboxes = document.querySelectorAll('input[name="setores"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', atualizarSetoresSelecionados);
    });

    // Fecha o dropdown ao clicar fora dele
    document.addEventListener('click', function (event) {
        const dropdown = document.querySelector('.setores-dropdown');
        const container = document.querySelector('.setores-container');
        if (!container.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });
});
