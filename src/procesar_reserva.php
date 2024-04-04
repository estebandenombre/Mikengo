<?php
require_once('conexion_db.php');


// Recopilar datos del formulario
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$personas = $_POST["personas"];
$comentarios = $_POST["comentarios"];

// Preparar la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO reservas (nombre, email, telefono, fecha, hora, personas, comentarios) 
        VALUES ('$nombre', '$email', '$telefono', '$fecha', '$hora', $personas, '$comentarios')";

if ($conexion->query($sql) === TRUE) {
    echo "Reserva realizada con éxito.";
    header("Location: finalizarReserva.php");
    exit();
} else {
    echo "Error al procesar la reserva";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
