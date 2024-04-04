<?php
// Incluye tu archivo de configuración de la base de datos aquí
// Reemplaza con tus credenciales y detalles de conexión
require_once('../conexion_db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["enviar_rembolso"]) && isset($_POST["pedido_id"])) {
    $pedidoId = $_POST["pedido_id"];

    try {


        // Actualiza el estado del pedido a "In Process"
        $estadoEntregado = "Reembolsado";
        $query = "UPDATE pedidos SET estado = :estado WHERE id = :pedidoId";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':estado', $estadoEntregado, PDO::PARAM_STR);
        $stmt->bindParam(':pedidoId', $pedidoId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: rembolso.php"); // Redirige de nuevo a la página de pedidos recibidos
            exit();
        } else {
            echo "Error al actualizar el estado del pedido.";
        }
    } catch (PDOException $e) {
        echo "Error de conexión a la base de datos: " . $e->getMessage();
    }
} else {
    echo "Acceso no autorizado.";
}
