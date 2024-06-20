<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Si no ha iniciado sesión, redirigir a la página de inicio (index.php)
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/game.css">
    <link rel="stylesheet" href="style/pantalla-carga.css">
    <link rel="stylesheet" href="style/memorama-game.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    


    <title>TotalplayGaming</title>

</head>
<body>

    
<!-- ===============Pantalla de Carga=============== -->

<div id="pantalla-carga">
        <h1>Memoria</h1>
        <div class="contenedor-instrucciones">


            <h2>
                ¿Cómo Jugar Memoria?
               
            </h2>

            <p>¡Es hora de poner en práctica esa Memoria! Encuentra las cartas iguales, en tiempo record y acumula puntos.</p>

            <p>Recuerda darle click en 'Guardar Puntaje' para guardar tus resultados en tu perfil</p>
            <div class="contenedor-instrucciones-teclas">
        

            <div class="instrucciones-movimiento">
                <img src="img/recursos/instrucciones/left-click.png" alt="">
                <p>Para Seleccionar una tarjeta</p>
            </div>

            

            
            </div>
            
            <img src="img/recursos/play.png" id="boton-jugar" alt="">

        </div>
    </div>

<!-- =============Boton Pantalla Completa============== -->
<!-- Botón de pantalla completa -->
<button id="boton-pantalla-completa" class="fas fa-expand"></button>



    <nav>
        <div>
            <a href="dashboard.php">
             <img src="img/logos/totalplay-logo.png" alt="">
            </a>
        </div>

        <div class="contenedor-id-logout">
            <h2><?php echo $_SESSION['nombre_apellidos']; ?>
            </h2>

            <p>#<?php echo $_SESSION['id']; ?></p>
            <a href="logout.php">
                <i class="fas fa-sign-out-alt"></i>
            </a>

        </div>
    </nav>

    <section class="game-zone">
        <div class="game">
            <iframe id="iframe" scrolling="no" height="100vh" src="juegos/juego-5/index.html"></iframe>
        </div>
    </section>


    <section class="portada-juego">
            <h1>MEMORIA</h1>
    </section>
    <section class="descripcion-game"> 
        <div class="titulo-catalogo-juegos">
            <h2>
                Continua jugando en los siguientes juegos:
            </h2>
        </div>

        <div class="catalogo-juegos-contenedor">
            <a href="game.php" class="contenedor-imagen">
                <img src="img/juegos/portada/juego-portada-general-1.png" alt="">
            </a>
            <a href="game2.php" class="contenedor-imagen">
                <img src="img/juegos/portada/juego-portada-general-2.png" alt="">
            </a>
            <a href="game4.php" class="contenedor-imagen">
                <img src="img/juegos/portada/juego-portada-general-4.png" alt="">
            </a>
          


        </div>
            
    </section>
</body>

<script src="main/pantalla-carga.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="juegos/puntajes/puntaje-juego-5.js"></script>
<script src="main/puntaje.js"></script>
</html>