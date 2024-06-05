   // Función para redirigir al hacer clic en "juego 3"
   document.getElementById('juego3').addEventListener('click', function(event) {
    event.preventDefault();
    let susId = "<?php echo $susId; ?>";
    let jwt = "<?php echo $jwt; ?>";
    let redirectUrl = `https://beta.yomelase.com/trivias/playtrivia/${jwt}/0`;
    window.location.href = redirectUrl;
});

// Función para redirigir al hacer clic en "JUGAR" del juego 3
document.getElementById('jugar3').addEventListener('click', function(event) {
    event.preventDefault();
    let susId = "<?php echo $susId; ?>";
    let jwt = "<?php echo $jwt; ?>";
    let redirectUrl = `https://beta.yomelase.com/trivias/playtrivia/${jwt}/0`;
    window.location.href = redirectUrl;
});