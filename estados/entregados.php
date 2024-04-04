<?php
// Incluye tu archivo de configuración de la base de datos aquí
// Reemplaza con tus credenciales y detalles de conexión

require_once('../conexion_db.php');
// Consulta la base de datos para obtener los pedidos recibidos
try {
    $estadoRecibido = "Delivered"; // Cambia esto al estado deseado
    $fechaHoy = date('Y-m-d'); // Obtén la fecha actual en el formato de tu base de datos
    $query = "SELECT * FROM pedidos WHERE estado = :estado AND DATE(fecha_pedido) = :fecha";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':estado', $estadoRecibido, PDO::PARAM_STR);
    $stmt->bindParam(':fecha', $fechaHoy, PDO::PARAM_STR);
    $stmt->execute();
    $pedidosRecibidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error de conexión a la base de datos: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivered Orders</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>

<body class="panel_admin">
    <div class="sidebar minimizar">
        <a href="../panel_admin.php">
            <div class="contenedor_regresar"><img src="../build/img/back.png" alt=""></div>
        </a>
        <button id="ocultar_sidebar"><img src="../build/img/sidebar.png" alt=""></button>
        <h2>Orders</h2>
        <ul>
            <li><a href="../pedidos.php" <?php if (basename($_SERVER['PHP_SELF']) == 'pedidos.php') echo 'class="active"'; ?>>Order History</a></li>
        </ul>
        <h2>Workday</h2>
        <ul>
            <li><a href="recibidos.php" <?php if (basename($_SERVER['PHP_SELF']) == 'recibidos.php') echo 'class="active"'; ?>>Received Orders</a></li>
            <li><a href="en_proceso.php" <?php if (basename($_SERVER['PHP_SELF']) == 'en_proceso.php') echo 'class="active"'; ?>>Orders in Process</a></li>
            <li><a href="entregados.php" <?php if (basename($_SERVER['PHP_SELF']) == 'entregados.php') echo 'class="active"'; ?>>Delivered Orders</a></li>

        </ul>
        <ul>
            <li><a href="pagados.php" <?php if (basename($_SERVER['PHP_SELF']) == 'pagados.php') echo 'class="active"'; ?>>Completed Orders</a></li>
            <li><a href="cancelados.php" <?php if (basename($_SERVER['PHP_SELF']) == 'cancelados.php') echo 'class="active"'; ?>>Cancelled Orders</a></li>
            <li><a href="rembolso.php" <?php if (basename($_SERVER['PHP_SELF']) == 'rembolso.php') echo 'class="active"'; ?>>Refunded Orders</a></li>
        </ul>


    </div>
    <button id="mostrar_sidebar"><img src="../build/img/sidebar_b.png" alt=""></button>

    <div class="content maximizar">
        <a href="../panel_admin.php">
            <div class="contenedor_regresar g"><img src="../build/img/back2.png" alt=""></div>
        </a>
        <h1>Delivered Orders</h1>
        <div class="pedidos-container">
            <?php foreach ($pedidosRecibidos as $pedido) : ?>
                <div class="pedido-card animate__animated  animate__fadeIn animate__faster">
                    <h2>Name: <?php echo $pedido['nombre']; ?></h2>

                    <p>Order Date: <?php echo $pedido['fecha_pedido']; ?></p>
                    <p>Status: <?php echo $pedido['estado']; ?></p>
                    <p>Paid: <?php echo $pedido['pagado']; ?></p>
                    <p>Order:</p>
                    <?php
                    $pedidoJSON = json_decode($pedido['pedido'], true);
                    foreach ($pedidoJSON as $item) {
                        echo "<li>" . $item['nombre'] . "</li>";
                    }
                    ?>
                    <p>Observation: <?php echo $pedido['observacion']; ?></p>
                    <div class="datos_cliente ocultar">
                        <p>Email: <?php echo $pedido['email_cliente']; ?></p>
                        <p>Teléfono: <?php echo $pedido['telefono_cliente']; ?></p>
                    </div>
                    <form action="actualizar_estado4.php" method="POST">
                        <input type="hidden" name="pedido_id" value="<?php echo $pedido['id']; ?>">
                        <button type="submit" name="enviar_a_pagados">Send to Completed</button>
                    </form>
                    <form action="actualizar_cancelar.php" method="POST">
                        <input type="hidden" name="pedido_id" value="<?php echo $pedido['id']; ?>">
                        <button type="submit" name="enviar_cancelados">Cancel Order</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="../build/js/bundle.min.js"></script>
</body>

</html>