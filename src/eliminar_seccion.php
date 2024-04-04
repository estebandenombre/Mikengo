<?php
// Archivo: eliminar_seccion.php

// Incluir el archivo de conexión a la base de datos
require_once('conexion_db.php');

// Verificar si se recibió el parámetro "id_seccion"
if (isset($_POST['id_seccion'])) {
    // Obtener el valor del parámetro
    $idSeccion = $_POST['id_seccion'];

    try {
        // Preparar la consulta SQL para eliminar la sección
        $consulta = "DELETE FROM secciones WHERE id_seccion = :id_seccion";
        $stmt = $pdo->prepare($consulta);
        $stmt->bindParam(':id_seccion', $idSeccion, PDO::PARAM_INT);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // La eliminación fue exitosa, devolver una respuesta "success"
            echo 'success';
        } else {
            // Hubo un error al eliminar la sección, devolver una respuesta de error
            echo 'error al eliminar la sección';
        }
    } catch (PDOException $e) {
        // En caso de error en la consulta, devolver una respuesta de error con detalles del error
        echo 'error: ' . $e->getMessage();
    }
} else {
    // Si no se recibió el parámetro "id_seccion", devolver una respuesta de error
    echo 'error';
}
