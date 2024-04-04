<?php
// Incluir el archivo de conexión a la base de datos
require_once "conexion_db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID del empleado a eliminar
    $empleado_id = $_POST["id"];

    try {
        // Preparar la consulta SQL para eliminar el empleado
        $consulta = "DELETE FROM empleados WHERE id = :id";
        $stmt = $pdo->prepare($consulta);

        // Vincular el valor del ID
        $stmt->bindParam(":id", $empleado_id, PDO::PARAM_INT);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir de nuevo a la página de visualización de empleados
            header("Location: empleados.php");
            exit();
        } else {
            echo "Error al eliminar el empleado.";
        }
    } catch (PDOException $e) {
        // En caso de error en la consulta, puedes manejarlo aquí
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo "Acceso no válido.";
}
