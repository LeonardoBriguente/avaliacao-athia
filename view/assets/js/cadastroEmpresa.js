function toggleSetoresDropdown() {
    const dropdown = document.querySelector('.setores-dropdown');
    dropdown.style.display = (dropdown.style.display === 'flex' ? 'none' : 'flex');
    
    // Atualiza o texto do botão de setores
    const selectedSetores = Array.from(document.querySelectorAll('input[name="setores"]:checked'))
                                  .map(input => input.parentElement.textContent.trim());
    
    const textElement = document.getElementById('setores-text');
    if (selectedSetores.length > 0) {
        textElement.textContent = selectedSetores.join(', ');
    } else {
        textElement.textContent = 'Selecionar setores';
    }
}