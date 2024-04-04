<?php
require_once('conexion_db.php');

if (isset($_POST['id_plato'])) {
    $idPlato = $_POST['id_plato'];

    try {
        // Realiza la eliminación del plato en la base de datos
        $consultaEliminar = "DELETE FROM platos WHERE id_plato = :id_plato";
        $stmt = $pdo->prepare($consultaEliminar);
        $stmt->bindParam(':id_plato', $idPlato, PDO::PARAM_INT);
        $stmt->execute();

        // Comprueba si se realizó la eliminación con éxito
        if ($stmt->rowCount() > 0) {
            echo 'success'; // Devuelve 'success' si la eliminación fue exitosa
        } else {
            echo 'error'; // Devuelve 'error' si hubo un problema al eliminar
        }
    } catch (PDOException $e) {
        echo 'error'; // En caso de error en la consulta, devuelve 'error'
    }
} else {
    echo 'error'; // Si no se proporciona el ID del plato, devuelve 'error'
}
