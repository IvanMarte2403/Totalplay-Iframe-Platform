// Puntaje Exclusivo para Flappy Bird

window.addEventListener("message", ev => {
    
    if (ev.data && ev.data.type === 'score'){

        console.log('Puntaje Recibido: ', ev.data);
        
          // Envía el valor recolectado a 'game.php' utilizando Fetch
    fetch('juegos/puntajes/guardar-puntaje-4.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'puntaje=' + 25,
    })
    .then(response => response.text())
    .then(data => {
        console.log('Respuesta:', data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
    }
  
});