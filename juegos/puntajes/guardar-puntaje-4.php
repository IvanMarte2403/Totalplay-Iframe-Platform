<?php
// Iniciar la sesión
session_start();

// Incluir la conexión a la base de datos
include '../../db_conexion.php';

// Recibe el puntaje desde la solicitud AJAX
$puntaje = $_POST['puntaje'];
$id_usuario = $_SESSION['id'];

// Prepara la consulta SQL para insertar el puntaje en la base de datos
$sql = "INSERT INTO juego_4 (id, puntaje, fecha_hora) VALUES (?, ?, NOW())";
    
// Prepara la declaración
$stmt = $conexion->prepare($sql);

// Vincula los parámetros (id del usuario y puntaje)
$stmt->bind_param("ii", $id_usuario, $puntaje);

// Ejecuta la declaración
$stmt->execute();

// Verifica si se insertó el puntaje
if ($stmt->affected_rows > 0) {
    // Devuelve el puntaje insertado
    echo $puntaje;
} else {
    // Devuelve un error
    echo 'Error al guardar el puntaje: ' . $conexion->error;
}

// Cierra la declaración y la conexión
$stmt->close();
$conexion->close();
?>
