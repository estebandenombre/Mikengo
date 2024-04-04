<?php
// Supongamos que ya tienes una conexión a la base de datos llamada $pdo
require_once('conexion_db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $idPlato = $_POST['id_plato'];
    $nombrePlato = $_POST['nombre_plato'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    // Preparar la consulta SQL para actualizar el plato
    $consulta = "UPDATE platos SET nombre_plato = :nombre_plato, descripcion = :descripcion, precio = :precio WHERE id_plato = :id_plato";

    try {
        $stmt = $pdo->prepare($consulta);

        // Bind de parámetros
        $stmt->bindParam(':nombre_plato', $nombrePlato, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
        $stmt->bindParam(':id_plato', $idPlato, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Puedes devolver un mensaje de éxito si lo deseas
        echo "Plato actualizado con éxito";
    } catch (PDOException $e) {
        // En caso de error en la consulta, puedes manejarlo aquí
        echo "Error en la actualización del plato: " . $e->getMessage();
    }
} else {
    // Devolver un mensaje de error si la solicitud no es de tipo POST
    echo "Error: solicitud no válida";
}
?>
