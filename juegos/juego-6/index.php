<?php
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
  <title>Quizz Totalplay</title>
  <link rel="stylesheet" href="css/estilo.css">
  <link rel="icon" href="data:">
  <link href="https://fonts.googleapis.com/css2?family=Jersey+15&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Press+Start+2P&display=swap"   rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>

  <div class="container">

    <div id="contador-giros">
    </div>
  
    <div class="vara"></div>
    <!-- =======contenedor Ruleta de Imagen=========== -->
    <div class="contenedor-imagen">
      <img src="image/ruletas/ruleta-tpga3.png" id="ruleta">
    </div>

    <!-- ============Seccion de Dasboard================ -->

   
    <div class="premio">
      <p id="puntaje-partida"></p>
      <p id="puntaje-total"></p>
      <p class="quizzSeleccionado">Selecciona el centro para comenzar  </p>
      <p id="temporizador-pregunta" style="display: none;"></p>
    </div>

    
    <div id="contenedor-preguntas" style="display: none;">

    </div>
  
    <div id="contenedor-respuestas">

    </div>
    
    <div class="button-return">
      <a href="" id=button-return style="display: none;">
        Regresar
      </a>
    </div>

    <div id="contenedor-boton" style="display: none">
        <a id="boton-guardar"  href="#">Guardar & Salir </a>
    </div>
    <!-- <p class="contador">Turnos: 0</p> -->
    
  </div>

 

  


  <div>
    <div id="sonido" style="display: none;">
      <iframe src="sonido/ruleta.mp3" id="audio"></iframe>
    </div>
  </div>
  <script>
    var idDelUsuario = <?php echo $_SESSION['id']; ?>;
  </script>
 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/preguntas.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="js/script.js"></script>
  <script src="js/user_status.js"></script>
  

</body>

</html>