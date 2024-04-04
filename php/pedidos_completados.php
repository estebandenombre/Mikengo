<?php

// Función para obtener la cantidad de pedidos completados y los ingresos totales
function obtenerInformacionPedidos($fechaInicial, $fechaFinal)
{
    // Datos de conexión a la base de datos
    $host = "";
    $dbname = "";
    $usuario = "";
    $contrasena = "";

    try {
        // Crear una nueva conexión PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $contrasena);

        // Configurar el modo de error y lanzar excepciones en caso de errores
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Opcional: Establecer el juego de caracteres a UTF-8
        $pdo->exec("SET NAMES 'utf8'");
    } catch (PDOException $e) {
        // En caso de error en la conexión, puedes manejarlo aquí
        die("Error en la conexión a la base de datos: " . $e->getMessage());
    }

    try {
        // Realiza una consulta SQL para obtener la información de pedidos completados
        $consulta = "SELECT COUNT(*) AS cantidad_pedidos, SUM(total) AS ingresos_totales FROM pedidos WHERE estado = 'Completed' AND fecha_pedido BETWEEN :fecha_inicial AND :fecha_final";

        $stmt = $pdo->prepare($consulta);
        $stmt->bindParam(':fecha_inicial', $fechaInicial);
        $stmt->bindParam(':fecha_final', $fechaFinal);
        $stmt->execute();

        // Obtiene los resultados
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultados;
    } catch (PDOException $e) {
        // En caso de error en la consulta, puedes manejarlo aquí
        die("Error en la consulta: " . $e->getMessage());
    }
}
