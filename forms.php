<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_apellidos = $_POST['nombre_apellidos'];
    $numero_cliente_totalplay = $_POST['numero_cliente_totalplay'];
    $email = 'No_aplica';
    $contrasena = 'No_aplica';
    $genero = 'No_aplica';
    $celular = 'No_aplica';
    $fecha_nacimiento = 'No_aplica';

    include 'db_conexion.php';

    // Verificar si el usuario ya existe
    $sql = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $numero_cliente_totalplay);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Insertar nuevo usuario
        $sql_insert = "INSERT INTO usuarios (nombre_apellidos, email, contrasena, genero, celular, fecha_nacimiento, id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = $conexion->prepare($sql_insert);
        $stmt_insert->bind_param("ssssssi", $nombre_apellidos, $email, $contrasena, $genero, $celular, $fecha_nacimiento, $numero_cliente_totalplay);
        $stmt_insert->execute();
        $stmt_insert->close();
        
        // Configurar la sesión del usuario
        $_SESSION['loggedin'] = true;
        $_SESSION['nombre_apellidos'] = $nombre_apellidos;
        $_SESSION['id'] = $numero_cliente_totalplay;

        // Redirigir al dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        echo 'El usuario ya existe.';
    }

    $stmt->close();
    $conexion->close();
}
?>