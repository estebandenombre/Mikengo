<?php
// Supongamos que ya tienes una conexión a la base de datos llamada $pdo
require_once('conexion_db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el nombre de la nueva sección
    $nombreSeccion = $_POST['nombre_seccion'];

    // Preparar la consulta SQL para agregar la nueva sección
    $consulta = "INSERT INTO secciones (nombre_seccion) VALUES (:nombre_seccion)";

    try {
        $stmt = $pdo->prepare($consulta);

        // Bind de parámetros
        $stmt->bindParam(':nombre_seccion', $nombreSeccion, PDO::PARAM_STR);

        // Ejecutar la consulta
        $stmt->execute();

        // Puedes devolver un mensaje de éxito si lo deseas
        echo "success";
    } catch (PDOException $e) {
        // En caso de error en la consulta, puedes manejarlo aquí
        echo "Error al agregar la sección: " . $e->getMessage();
    }
} else {
    // Devolver un mensaje de error si la solicitud no es de tipo POST
    echo "Error: solicitud no válida";
}
?>
