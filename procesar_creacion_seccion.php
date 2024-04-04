<?php
// Incluye el archivo de conexión a la base de datos
require_once('conexion_db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén el nombre de la sección desde el formulario
    $nombreSeccion = $_POST['nombreSeccion'];

    try {
        // Inserta la nueva sección en la base de datos
        $consultaInsertarSeccion = "INSERT INTO secciones (nombre_seccion) VALUES (:nombreSeccion)";
        $stmt = $pdo->prepare($consultaInsertarSeccion);
        $stmt->bindParam(':nombreSeccion', $nombreSeccion, PDO::PARAM_STR);
        $stmt->execute();
        
        // Redirige de vuelta a la página principal o muestra un mensaje de éxito
        header('Location: menu.php'); // Cambia a la página adecuada
        exit();
    } catch (PDOException $e) {
        // En caso de error en la consulta, puedes manejarlo aquí
        die("Error en la consulta: " . $e->getMessage());
    }
}
?>
