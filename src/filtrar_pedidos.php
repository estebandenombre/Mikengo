<?php
// Incluye tu archivo de conexión a la base de datos
require_once('conexion_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Aquí ya tienes acceso a la conexión PDO desde conexion_db.php

        // Inicializa las condiciones de búsqueda
        $conditions = [];
        $params = [];

        // Filtrar por nombre
        if (!empty($_POST["nombre"])) {
            $conditions[] = "nombre LIKE :nombre";
            $params[":nombre"] = "%" . $_POST["nombre"] . "%";
        }

        // Filtrar por email
        if (!empty($_POST["email"])) {
            $conditions[] = "email_cliente LIKE :email";
            $params[":email"] = "%" . $_POST["email"] . "%";
        }

        // Filtrar por teléfono
        if (!empty($_POST["telefono"])) {
            $conditions[] = "telefono_cliente LIKE :telefono";
            $params[":telefono"] = "%" . $_POST["telefono"] . "%";
        }

        // Filtrar por observaciones
        if (!empty($_POST["observaciones"])) {
            $conditions[] = "observacion LIKE :observaciones";
            $params[":observaciones"] = "%" . $_POST["observaciones"] . "%";
        }

        // Filtrar por fecha
        if (!empty($_POST["fecha"])) {
            $conditions[] = "fecha_pedido = :fecha";
            $params[":fecha"] = $_POST["fecha"];
        }

        // Consulta la base de datos con los filtros aplicados
        $query = "SELECT * FROM pedidos";
        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }

        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        $pedidosFiltrados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Mostrar los resultados de la búsqueda
        foreach ($pedidosFiltrados as $pedido) {
            // Aquí puedes mostrar los resultados como lo hacías anteriormente en tu página de pedidos
            // Por ejemplo:
            echo "<h2>Nombre: " . $pedido['nombre'] . "</h2>";
            echo "<p>Fecha de Pedido: " . $pedido['fecha_pedido'] . "</p>";
            // ...
        }
    } catch (PDOException $e) {
        echo "Error de conexión a la base de datos: " . $e->getMessage();
    }
}
?>
