<?php
// Incluye tu archivo de configuración de la base de datos aquí
// Reemplaza con tus credenciales y detalles de conexión
require_once('conexion_db.php');
// Consulta la base de datos para obtener los pedidos recibidos
try {
    $estadoRecibido = "Cancelled"; // Cambia esto al estado deseado

    // Variables para el filtrado
    $filtro = isset($_POST["filtro"]) ? $_POST["filtro"] : "todos";
    $busqueda = isset($_POST["busqueda"]) ? $_POST["busqueda"] : "";

    // Construye la consulta SQL según el filtro seleccionado
    $query = "SELECT * FROM pedidos ";

    if ($filtro !== "todos") {
        $query .= "WHERE ";

        switch ($filtro) {
            case "nombre":
                $query .= "nombre LIKE :busqueda";
                break;
            case "email":
                $query .= "email LIKE :busqueda";
                break;
            case "telefono":
                $query .= "telefono = :busqueda"; // Cambia LIKE a = para coincidencia exacta
                break;
            case "observaciones":
                $query .= "observacion LIKE :busqueda";
                break;
        }
    }

    $stmt = $pdo->prepare($query);

    // Si se filtra por email o teléfono, agrega comodines (%) solo si no es número
    if ($filtro == "email" || $filtro == "telefono") {
        if (!is_numeric($busqueda)) {
            $busqueda = "%" . $busqueda . "%";
        }
    }

    // Vincula el valor de búsqueda si no se selecciona "todos"
    if ($filtro !== "todos") {
        $stmt->bindValue(":busqueda", $busqueda, PDO::PARAM_STR);
    }

    $stmt->execute();
    $pedidosFiltrados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error de conexión a la base de datos: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Received Orders</title>
    <link rel="stylesheet" href="build/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text&display=swap" rel="stylesheet">
</head>

<body class="panel_admin">

    <div class="sidebar">
        <a href="panel_admin.php">
            <div class="contenedor_regresar"><img src="build/img/back.png" alt=""></div>
        </a>

        <button id="ocultar_sidebar"><img src="build/img/sidebar.png" alt=""></button>
        <h2>Orders</h2>
        <ul>
            <li><a href="pedidos.php" class="active">Order History</a></li>
        </ul>
        <h2>Workday</h2>
        <ul>
            <li><a href="estados/recibidos.php">Received Orders</a></li>
            <li><a href="estados/en_proceso.php">Orders in Process</a></li>
            <li><a href="estados/entregados.php">Delivered Orders</a></li>
        </ul>
        <ul>
            <li><a href="estados/pagados.php">Completed Orders</a></li>
            <li><a href="estados/cancelados.php">Cancelled Orders</a></li>
            <li><a href="estados/rembolso.php">Refunded Orders</a></li>
        </ul>


    </div>
    <button id="mostrar_sidebar"><img src="build/img/sidebar_b.png" alt=""></button>
    <div class="content">
        <a href="panel_admin.php">
            <div class="contenedor_regresar g"><img src="build/img/back2.png" alt=""></div>
        </a>
        <h1>All Orders</h1>
        <!-- Agrega el formulario de filtrado -->
        <div class="filtro">
            <form action="pedidos.php" method="POST">
                <label for="filtro">Filter by:</label>
                <select name="filtro" id="filtro">
                    <option value="todos" <?php echo $filtro === "todos" ? "selected" : ""; ?>>All</option>
                    <option value="nombre" <?php echo $filtro === "nombre" ? "selected" : ""; ?>>Name</option>
                    <option value="email" <?php echo $filtro === "email" ? "selected" : ""; ?>>Email</option>
                    <option value="telefono" <?php echo $filtro === "telefono" ? "selected" : ""; ?>>Phone</option>
                    <option value="observaciones" <?php echo $filtro === "observaciones" ? "selected" : ""; ?>>Observations</option>
                </select>
                <input type="text" name="busqueda" value="<?php echo $busqueda; ?>" placeholder="Search..." id="busqueda">
                <button type="submit">Search</button>
            </form>
        </div>
        <div class="pedidos-container">
            <?php
            // Mostrar los resultados de la búsqueda
            foreach ($pedidosFiltrados as $pedido) {
                // Genera el contenido HTML de cada pedido similar a como lo hacías antes
                echo "<div class='pedido-card'>";
                echo "<h2>Name: " . $pedido['nombre'] . "</h2>";
                echo "<p>Order Date: " . $pedido['fecha_pedido'] . "</p>";
                echo "<p>Status: " . $pedido['estado'] . "</p>";
                echo "<p>Paid: " . $pedido['pagado'] . "</p>";
                echo "<p>Order:</p>";
                $pedidoJSON = json_decode($pedido['pedido'], true);
                foreach ($pedidoJSON as $item) {
                    echo "<li>" . $item['nombre'] . "</li>";
                }
                echo "<div class='datos_cliente'>";
                echo "<p>Email: " . $pedido['email'] . "</p>";
                echo "<p>Phone: " . $pedido['telefono'] . "</p>";
                echo "<p>Observation: " . $pedido['observacion'] . "</p>";
                echo "<p>Total: " . $pedido['total'] . " € </p>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
    <script src="build/js/bundle.min.js"></script>
    <script>
        // Obtén el campo de búsqueda y agrega un evento de entrada (input)
        const busquedaInput = document.getElementById('busqueda');
        busquedaInput.addEventListener('input', function() {
            // Obtiene el valor actual del campo de búsqueda
            const busquedaValue = busquedaInput.value.toLowerCase();

            // Filtra los pedidos según el valor de búsqueda
            const pedidosFiltrados = <?php echo json_encode($pedidosFiltrados); ?>; // Datos de pedidos en PHP
            const pedidosContainer = document.querySelector('.pedidos-container');
            pedidosContainer.innerHTML = ''; // Limpia los resultados actuales

            pedidosFiltrados.forEach(pedido => {
                // Comprueba si algún campo del pedido contiene la cadena de búsqueda
                if (JSON.stringify(pedido).toLowerCase().includes(busquedaValue)) {
                    // Si coincide, agrega el pedido al contenedor
                    const pedidoCard = document.createElement('div');
                    pedidoCard.classList.add('pedido-card');
                    pedidoCard.innerHTML = `
                    <h2>Nombre: ${pedido.nombre}</h2>
                    <p>Fecha de Pedido: ${pedido.fecha_pedido}</p>
                    <p>Estado: ${pedido.estado}</p>
                    <p>Pagado: ${pedido.pagado}</p>
                    <p>Pedido:</p>
                    <ul>
                        ${pedido.pedido.map(item => `<li>${item.nombre}</li>`).join('')}
                    </ul>
                    <div class='datos_cliente'>
                        <p>Email: ${pedido.email}</p>
                        <p>Teléfono: ${pedido.telefono}</p>
                        <p>Observación: ${pedido.observacion}</p>
                    </div>
                `;
                    pedidosContainer.appendChild(pedidoCard);
                }
            });
        });
    </script>
</body>

</html>