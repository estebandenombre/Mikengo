<?php
// Verifica si se recibió una solicitud POST
require_once('conexion_db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $observacion = $_POST["observacion"];

    // Recupera los datos del pedido desde el campo oculto
    $pedidoJSON = $_POST["pedido"];
    $pedidoArray = json_decode($pedidoJSON, true);

    // Recupera el total del pedido desde el campo oculto
    $totalPedido = floatval($_POST["total-pedido"]);

    // Procesa los datos, por ejemplo, guarda en una base de datos
    // Reemplaza estos pasos con tu lógica específica de base de datos
    try {
        // Conecta a la base de datos (reemplaza con tus credenciales)

        // Prepara la consulta SQL para insertar los datos del formulario, el pedido y el total
        $sql = "INSERT INTO pedidos (nombre, email, telefono, observacion, pedido, total, estado) VALUES (:nombre, :email, :telefono, :observacion, :pedido, :total, 'Received')";

        // Prepara la sentencia SQL
        $stmt = $pdo->prepare($sql);

        // Enlaza los valores de los parámetros
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
        $stmt->bindParam(":observacion", $observacion, PDO::PARAM_STR);
        $stmt->bindParam(":pedido", $pedidoJSON, PDO::PARAM_STR); // Guarda el JSON completo en la base de datos
        $stmt->bindParam(":total", $totalPedido, PDO::PARAM_STR); // Guarda el total del pedido

        // Ejecuta la sentencia SQL
        if ($stmt->execute()) {
            // Redirige a la página de "FinalizarPedido.php"
            header("Location: FinalizarPedido.php");
            exit; // Detiene la ejecución del script actual
        } else {
            echo "Error al registrar el pedido: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Error de conexión a la base de datos: " . $e->getMessage();
    }
} else {
    echo "Acceso no autorizado.";
}
