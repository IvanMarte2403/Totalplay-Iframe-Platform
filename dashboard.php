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

// Prepara la consulta SQL para obtener la suma de los puntajes del usuario actual en el juego 4
$sql4 = "SELECT SUM(puntaje) AS puntaje_total FROM juego_4 WHERE id = ?";

// Prepara la declaración
$stmt4 = $conexion->prepare($sql4);

// Vincula los parámetros
$stmt4->bind_param("i", $id_usuario);

// Ejecuta la declaración
$stmt4->execute();

// Obtiene el resultado
$result4 = $stmt4->get_result();

// Obtiene la fila del resultado
$row4 = $result4->fetch_assoc();

// Obtiene el puntaje total del juego 4
$puntaje_total4 = $row4['puntaje_total'];

// Si el puntaje total es NULL, lo establece a 0
if ($puntaje_total4 === NULL) {
    $puntaje_total4 = 0;
}



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
    <link rel="stylesheet" href="style/dashboard.css">
    <link rel="stylesheet" href="style/responsive/responsive-dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700&display=swap" rel="stylesheet">
    <title>TotalPlayGaming</title>
</head>
<body>
    
<section class="nav-usuario">
    <div class="container-usuario-foto-perfil">
        <div class="foto-perfil">
            
        </div>
    </div>
    <div class="container-usuario-puntaje">
        <h2>Isai</h2>
        <p>Mi puntaje: <b>20,000</b>  <i class="fas fa-chevron-down" id="dropdownIcon"></i></p>
    </div>
</section>

<section class="trivia-game-principal">
    <div class="container-titulo-trivia">
        <h1>¡Feliz día del padre!</h1>
        <p>Juega, diviértete y gana</p>
    </div>
</section>

<section class="principal-game">
    <div class="container-principal-game">

        <div class="container-principal-game-image">
            <img src="img/juegos/portada/padre.PNG" alt="">
        </div>

        <div class="container-informacion-principal-game">
          <h2>Trivia día del padre</h2>
          <p>Contesta la trivia y gana. </p>
          <p>¡Demuestra tu talento ahora!</p>
        </div>

       <div class="container-bottom-principal-trivia">
            <a href="#">¡Juega Ahora!</a>
      </div>

    </div>

</section>
      
    
</body>
</html>