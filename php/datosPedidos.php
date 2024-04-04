<?php
// Supongamos que ya tienes una conexión a la base de datos llamada $pdo


function contarPedidosCompletados()
{
    require_once('conexion_db.php');
    try {
        // Consulta SQL para contar los pedidos con estado "Completed"
        $consulta = "SELECT COUNT(*) AS total FROM pedidos WHERE estado = 'Completed'";
        $resultado = $pdo->query($consulta);

        // Obtener el resultado
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);

        // Retornar el total de pedidos completados
        return $fila['total'];
    } catch (PDOException $e) {
        // En caso de error en la consulta, puedes manejarlo aquí
        die("Error en la consulta: " . $e->getMessage());
    }
}

// Supongamos que ya tienes una conexión a la base de datos llamada $pdo


function sumarTotalPedidosCompletados()
{
    try {
        require('conexion_db.php');
        // Consulta SQL para obtener los pedidos completados
        $consulta = "SELECT total FROM pedidos WHERE estado = 'Completed'";
        $resultado = $pdo->query($consulta);

        // Inicializar la suma total
        $totalGenerado = 0;

        // Recorrer los pedidos y sumar el total
        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $totalGenerado += $fila['total'];
        }

        // Retornar el total generado
        return $totalGenerado;
    } catch (PDOException $e) {
        // En caso de error en la consulta, puedes manejarlo aquí
        die("Error en la consulta: " . $e->getMessage());
    }
}
