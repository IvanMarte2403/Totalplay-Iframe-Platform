<?php
session_start();

// Verificar si el susId está presente en la URL
$susId = isset($_GET['susId']) ? $_GET['susId'] : null;
$jwt = isset($_GET['jwt']) ? $_GET['jwt'] : null;

if ($susId) {
    include 'db_conexion.php';

    $sql = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $susId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['nombre_apellidos'] = $user['nombre_apellidos'];
        $_SESSION['id'] = $user['id'];
    } else {
        // Redirigir al formulario de registro
        header("Location: registro.php?susId=$susId");
        exit;
    }

    $stmt->close();
    $conexion->close();
}

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Si no ha iniciado sesión, redirigir a la página de inicio (index.php)
    header('Location: index.php');
    exit;
}

// Incluir la conexión a la base de datos
include 'db_conexion.php';

// Obtiene el ID del usuario actual
$id_usuario = $_SESSION['id'];

// Prepara la consulta SQL para obtener la suma de los puntajes del usuario actual en el juego 1
$sql1 = "SELECT SUM(puntaje) AS puntaje_total FROM juego_1 WHERE id = ?";       

// Prepara la declaración
$stmt1 = $conexion->prepare($sql1);

// Vincula los parámetros
$stmt1->bind_param("i", $id_usuario);

// Ejecuta la declaración
$stmt1->execute();

// Obtiene el resultado
$result1 = $stmt1->get_result();

// Obtiene la fila del resultado
$row1 = $result1->fetch_assoc();

// Obtiene el puntaje total del juego 1
$puntaje_total1 = $row1['puntaje_total'];

// Si el puntaje total es NULL, lo establece a 0
if ($puntaje_total1 === NULL) {
    $puntaje_total1 = 0;
}

// Cierra la declaración
$stmt1->close();

// Prepara la consulta SQL para obtener la suma de los puntajes del usuario actual en el juego 5
$sql5 = "SELECT SUM(puntaje) AS puntaje_total FROM juego_5 WHERE id = ?";

// Prepara la declaración
$stmt5 = $conexion->prepare($sql5);

// Vincula los parámetros
$stmt5->bind_param("i", $id_usuario);

// Ejecuta la declaración
$stmt5->execute();

// Obtiene el resultado
$result5 = $stmt5->get_result();

// Obtiene la fila del resultado
$row5 = $result5->fetch_assoc();

// Obtiene el puntaje total del juego 5
$puntaje_total5 = $row5['puntaje_total'];

// Si el puntaje total es NULL, lo establece a 0
if ($puntaje_total5 === NULL) {
    $puntaje_total5 = 0;
}

// Cierra la declaración y la conexión
$stmt5->close();
$conexion->close();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/portada-juegos.css">
    <link rel="stylesheet" href="style/dashboard.css">
    <link rel="stylesheet" href="style/responsive/responsive-dashboard.css">
    <link rel="stylesheet" href="style/casousel.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>TotalPlayGaming</title>
</head>
<body>
    <div class="container">
        <div class="player-container">

            <div class="info-player">
                <div class="photo-container">
                    <img src="img/perfil/temporada1-halo.png" alt="">
                </div>

                <div id="infoUsuarioContainer" class="info-usuario">
                    <h2><?php echo $_SESSION['nombre_apellidos']; ?></h2>
                    <p>#<?php echo $_SESSION['id']; ?></p>
                </div>

            </div>

                <div class="puntaje-player">
        <p>Mi Puntaje Total : </p>
        <h2><?php echo $puntaje_total1 + $puntaje_total5 + $puntaje_total3; ?></h2>
    </div>
    <div class="explicacion-juegos">
        <div class="seccion-juegos">
    <div class="contenedor-seccion-juegos">
            <!-- ==============Juego 3 ============== -->
              
                     <div class="contenedor-juego-explicacion">
                        <a href="#" class="imagen-juego-explicacion" id="juego3">
                            <img src="img/juegos/portada/padre.PNG" alt="">
                        </a>

                        <div class="explicacion-texto">
                            <a href="#" class="temporada-game" id="jugar3">
                                <p>JUGAR</p>
                            </a>
                            <h3>Trivia Dia del padre</h3>
                            <p>
                                Una categoría especial solo para expertos.
                            </p>

                            <div class="calificacion-estrellas">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
        </div></div></div>

   
        <div class="explicacion-juegos">
        <div class="seccion-juegos">

        
        <div class="dashboard-container">
            <div class="nav-dashboard">
                <a href="logout.php" class="logout-icon">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
            <div class="titulo-dashboard">
                 <h1>JUEGA AHORA</h1>
                 
            </div>
           
            <div class="catalogo-juegos">
                <figure class="icon-cards mt-3">
                <div class="icon-cards__content">

                 <a href="#" class="icon-cards__item d-flex align-items-center justify-content-center juego-3" id="juego3"></a>
                <a href="game.php" class="icon-cards__item d-flex align-items-center justify-content-center juego-1"></a>

                 <!-- <a href="game2.php" class="icon-cards__item d-flex align-items-center justify-content-center juego-2"></a> -->

                
                 <a href="game4.php"  class="icon-cards__item d-flex align-items-center justify-content-center juego-4"></a>
                 <a href="game5.php"  class="icon-cards__item d-flex align-items-center justify-content-center juego-5"></a>
                 </div>
                </figure>
             </div>

            <!-- =========Lista de Personajes Por Jugador====== -->
            <div class="nuestros-juegos-personajes ">
                <div class="contenedor-juego-1">
                    <div class="imagen-juego-personajes">
                        <img src="img/juegos/portada-game-personaje-2.png" alt="">
                    </div>

                    <h3>
                        <b class="black-juegos-personaje">¡Personaje Nuevo! </b>   en Te Reto
                    </h3>
                    <p>¡No permitas que lleguen al centro!</p>
                </div>

                <div class="contenedor-juego-1">
                    <div class="imagen-juego-personajes">
                        <img src="img/juegos/portada-game-personaje-1.png" alt="">
                    </div>

                    <h3>
                       <b class="black2-juegos-personaje">¡Nuevo Pool De Preguntas! </b>   
                    </h3>
                    <p>¡Solo tienes una oportunidad!</p>
                </div>

            
            </div>
          
               


            </div>

        </div>

    </div>


    <section class="premios">
         <div class="animacion-frame">
            <img src="img/recursos/personajes/cono.gif" alt="">
         </div>'

    <div class="seccion-premios">
                <div class="titulo-premios">
                    <h1>OBTÉN EL PUNTAJE MÁS ALTO</h1>
                </div>

    </div>

    <div class="explicacion-juegos">
        <div class="seccion-juegos">

        <div class="contenedor-seccion-juegos">
            <!-- ==============Juego 3 ============== -->
              
                     <div class="contenedor-juego-explicacion">
                        <a href="#" class="imagen-juego-explicacion" id="juego3">
                            <img src="img/juegos/portada/padre.PNG" alt="">
                        </a>

                        <div class="explicacion-texto">
                            <a href="#" class="temporada-game" id="jugar3">
                                <p>JUGAR</p>
                            </a>
                            <h3>Trivia Dia del padre</h3>
                            <p>
                                Una categoría especial solo para expertos.
                            </p>

                            <div class="calificacion-estrellas">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
             <!-- ==============Juego 1 ============== -->
             <div class="contenedor-juego-explicacion">
                <a href="game.php" class="imagen-juego-explicacion">
                    <img src="img/juegos/portada/juego-portada-general-1.png" alt="">
                </a>

                <div class="explicacion-texto">
                    <a href="game.php" class="temporada-game">
                        <p>JUGAR</p>
                    </a>
                    <h3>Big Trivia </h3>
                    <p>
                        Juego de preguntas con ruleta. Cinco categorías. Acumula puntos por respuestas correctas.                    </p>

                    <div class="calificacion-estrellas">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            <!-- ==============Juego 2 ============== -->
        <!--    <div class="contenedor-juego-explicacion">
                <a  href="game2.php"  class="imagen-juego-explicacion">
                    <img src="img/juegos/portada/juego-portada-general-2.png" alt="">
                </a>

                <div class="explicacion-texto">
                    <a href="game2.php" class="temporada-game">
                        <p>JUGAR</p>
                    </a>
                    <h3>Te Reto</h3>
                    <p>
                       Detén enemigos, mejora cañonazos, acumula puntos.                  
                     </p>

                    <div class="calificacion-estrellas">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div> -->
         
        <div class="contenedor-seccion-juegos">
             
            <!-- ==============Juego 4 ============== -->
            <div class="contenedor-juego-explicacion">
                <a   href="game4.php" class="imagen-juego-explicacion">
                    <img src="img/juegos/portada/juego-portada-general-4.png" alt="">
                </a>
 
                <div class="explicacion-texto">
                    <a href="game4.php" class="temporada-game">
                        <p>JUGAR</p>
                    </a>
                    <h3>Misión</h3>
                    <p>

                        ¡Obten el punta mas alto, golpea y no dejes que lleguen al suelo! 
                    </p>

                    <div class="calificacion-estrellas">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>

                <!-- ==============Juego 5 ============== -->
            <div class="contenedor-juego-explicacion">
                <a  href="game5.php"  class="imagen-juego-explicacion">
                    <img src="img/juegos/portada/juego-portada-general-5.png" alt="">
                </a>

                <div class="explicacion-texto">
                    <a href="game5.php" class="temporada-game">
                        <p>JUGAR</p>
                    </a>
                    <h3>Memoria</h3>
                    <p>
                    Juego de memoria con tarjetas únicas sobre football soccer  
                    </p>

                    <div class="calificacion-estrellas">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>

        </div>
           

            


            
        </div>
        
    </div>
         <!-- ======Puntajes Individuales de Juego=========== -->
    <div class="puntaje-individual-juego">
        <div class="titulo-puntaje-juego-individual">
        <p>SCORE</p>
        </div>

        <!-- =====Juego 1===== -->
        <div class="contenedor-puntaje-juego">
            <img src="img/juegos/portada/juego-portada-general-1.png" alt="">
            <div class="texto-puntaje">
            <p><?php echo $puntaje_total1; ?></p>
            </div>

        </div>

        <!-- Puntaje Número 2  -->

        <!-- <div class="contenedor-puntaje-juego">
            <img src="img/juegos/portada/juego-portada-general-2.png" alt="">
            <div class="texto-puntaje">
            <p>2500</p>
            </div>

        </div>-->

        <!-- =========Juego 3========= -->
         <div class="contenedor-puntaje-juego">
            <img src="img/juegos/portada/padre.PNG" alt="">
            <div class="texto-puntaje">
            <p><?php echo $puntaje_total3; ?></p>
            </div>

        </div> 

        <!-- ===============Juego 3========== -->


        <!-- <div class="contenedor-puntaje-juego">
            <img src="img/juegos/portada/juego-portada-general-4.png" alt="">
            <div class="texto-puntaje">
            <p>2400</p>
            </div>

        </div>-->

        <!-- =========Juego 4========= -->
        <div class="contenedor-puntaje-juego">
            <img src="img/juegos/portada/juego-portada-general-5.png" alt="">
            <div class="texto-puntaje">
            <p><?php echo $puntaje_total5; ?></p>
            </div>

        </div>
    </div>

</div> 


    </section>
         <script>
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
    </script>
    
</body>
<script src="main/casousel.js"></script>
</html>