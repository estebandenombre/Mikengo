<?php
// Incluye el archivo de conexión a la base de datos (asegúrate de que la ruta sea correcta)
require_once('conexion_db.php');

// Verifica si se recibieron los datos del formulario
if (isset($_POST['nombre']) && isset($_POST['importe']) && isset($_POST['fecha']) && isset($_POST['tipo'])) {
    // Obtiene los datos del formulario
    $nombre = $_POST['nombre'];
    $importe = $_POST['importe'];
    $fecha = $_POST['fecha'];
    $tipo = $_POST['tipo'];

    try {
        // Prepara la consulta SQL para insertar un nuevo gasto
        $consulta = "INSERT INTO gastos (nombre, importe, fecha, tipo) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($consulta);
        $stmt->execute([$nombre, $importe, $fecha, $tipo]);

        // Redirecciona a la página principal o a donde desees después de guardar
        header("Location: finanzas.php");
        exit();
    } catch (PDOException $e) {
        // En caso de error en la consulta, puedes manejarlo aquí
        die("Error en la consulta: " . $e->getMessage());
    }
} else {
    // Si no se recibieron los datos del formulario, muestra un mensaje de error
    echo "Error: Datos del formulario incompletos.";
}
