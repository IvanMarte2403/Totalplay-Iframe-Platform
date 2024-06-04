document.addEventListener('DOMContentLoaded', (event) => {
    const texto = document.querySelector('.dialogo-texto');
    texto.innerHTML = texto.textContent.split('').map((letra, i) => `<span style="animation-delay: ${i * 0.05}s">${letra}</span>`).join('');
});