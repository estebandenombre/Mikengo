<?php
// Supongamos que ya tienes una conexión a la base de datos llamada $pdo
function listarPedidosCompletados()
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
        // Realiza una consulta SQL para obtener los pedidos completados
        $consulta = "SELECT id, fecha_pedido, total FROM pedidos WHERE estado = 'Completed'";
        $resultado = $pdo->query($consulta);

        while ($pedido = $resultado->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="gasto">';
            echo '<div class="descripción">';
            echo '<p>ID: ' . $pedido['id'] . '</p>';
            echo '<p class="fecha">Order Date: ' . $pedido['fecha_pedido'] . '</p>';
            echo '</div>';
            echo '<div class="importe">';
            echo '<p>' . number_format($pedido['total'], 2, ',', '.') . '€</p>';
            echo '</div>';
            echo '</div>';
        }
    } catch (PDOException $e) {
        // Manejo de errores en la consulta
        die("Error en la consulta: " . $e->getMessage());
    }
}
