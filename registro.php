<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/responsive/responsive-index.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300.900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Totalplay Gaming</title>
</head>
<body>

    <div class="container">
        <div class="totalplay-phase-register">
            
            <div class="container-register">
            <!-- =======Formulario de Registro ======= -->
            <div id="register-form" class="container-forms">
                <h2>¿Cual es tu nombre de jugador(a)?</h2>
                <form id="registro" method="post" action="forms.php">
                    <input type="hidden" name="numero_cliente_totalplay" value="<?php echo $_GET['susId']; ?>">
                    <input type="text" name="nombre_apellidos" placeholder="Nombre de Jugador" required>
                    <input type="hidden" name="email" value="No_aplica">
                    <input type="hidden" name="contrasena" value="No_aplica">
                    <input type="hidden" name="genero" value="No_aplica">
                    <input type="hidden" name="celular" value="No_aplica">
                    <input type="hidden" name="fecha_nacimiento" value="No_aplica">
                    <input type="submit" value="Registrarse">
                </form>
            </div>
        </div></br>
           
            <div class="dialogo-texto">
                ¡Hola, soy Raul! Bienvenido a TotalplayGaming.
            </div>
            <div class="phase-totalplay">   
                <img class="banner-personajes" src="img/recursos/personajes/alex.png" alt="">
            </div>
        </div>

        
    </div>

    <script src="main/formulario-change-forms.js"></script>
    <script src="main/animaciones.js"></script>
</body>
</html>
