<?php
require_once('../conexion_db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["enviar_a_pagados"]) && isset($_POST["pedido_id"])) {
    $pedidoId = $_POST["pedido_id"];

    try {


        // Actualiza el estado del pedido a "Pagado"
        $estadoEntregado = "Completed";
        $query = "UPDATE pedidos SET estado = :estado, pagado = 'Si' WHERE id = :pedidoId";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':estado', $estadoEntregado, PDO::PARAM_STR);
        $stmt->bindParam(':pedidoId', $pedidoId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: pagados.php"); // Redirige de nuevo a la página de pedidos recibidos
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
