<?php
// Incluir el archivo de conexión a la base de datos
require_once "conexion_db.php";
session_start();



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos enviados desde el formulario
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $localidad = $_POST["localidad"];
    $puesto = $_POST["puesto"];
    $sueldo = $_POST["sueldo"];
    $id_empleado = $_POST["id"];

    // Actualizar la información en la base de datos
    try {
        $stmt = $pdo->prepare("UPDATE empleados SET nombre = ?, edad = ?, localidad = ?, puesto = ?, sueldo = ? WHERE id = ?");
        $stmt->execute([$nombre, $edad, $localidad, $puesto, $sueldo, $id_empleado]); // Reemplaza '$_SESSION['id']' con la forma en que obtienes el ID del empleado
        echo "Cambios guardados correctamente.";
        header("Location: empleados.php");
        exit;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo "Método de solicitud no válido.";
}
