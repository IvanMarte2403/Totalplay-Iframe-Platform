window.addEventListener("message", ev => {
    // Envía el valor recolectado a 'game.php' utilizando Fetch
    fetch('juegos/puntajes/guardar-puntaje-4.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'puntaje=' + ev.data,
    })
    .then(response => response.text())
    .then(data => {
        console.log('Respuesta:', data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
});