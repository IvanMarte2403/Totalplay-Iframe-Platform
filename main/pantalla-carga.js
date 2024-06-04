// JavaScript
document.addEventListener('DOMContentLoaded', (event) => {
    const pantallaCarga = document.querySelector('#pantalla-carga');
    const botonJugar = document.querySelector('#boton-jugar');
    const botonPantallaCompleta = document.querySelector('#boton-pantalla-completa');
    let iframe = document.querySelector('#iframe');

    let esPantallaCompleta = false; // Variable para rastrear el estado del iframe

    // Muestra la pantalla de carga cuando la página se carga
    pantallaCarga.classList.remove('hidden');
    botonPantallaCompleta.style.display = 'none';

    // Oculta la pantalla de carga y muestra el iframe en pantalla completa cuando el usuario hace clic en el botón "Jugar"
    botonJugar.addEventListener('click', () => {
        botonPantallaCompleta.style.display = 'block';
        pantallaCarga.classList.add('hidden');
        iframe.style.position = 'fixed';
        iframe.style.top = '0';
        iframe.style.left = '0';
        iframe.style.width = '100% !important';
        iframe.style.height = '100%';
        iframe.style.zIndex = '1000';
        esPantallaCompleta = true; // Actualiza el estado del iframe
    });

    // Cambia el estado del iframe cuando el usuario hace clic en el botón de pantalla completa
    botonPantallaCompleta.addEventListener('click', () => {
        if (esPantallaCompleta) {
            iframe.style.position = 'static';
            iframe.style.width = 'auto';
            iframe.style.height = 'auto';
            esPantallaCompleta = false; // Actualiza el estado del iframe
        } else {
            iframe.style.position = 'fixed';
            iframe.style.top = '0';
            iframe.style.left = '0';
            iframe.style.width = '100% !important';
            iframe.style.height = '100%';
            iframe.style.zIndex = '1000';
            esPantallaCompleta = true; // Actualiza el estado del iframe
        }
    });
});