<?php
// Verifica si ya se ha iniciado sesión como administrador
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration Panel</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>


<body class="panel">
    <h1>Administration Panel</h1>
    <div class="container">
        <a href="pedidos.php">
            <div class="tool-card user-management">
                <h2>Orders</h2>

            </div>
        </a>
        <a href="menu.php">
            <div class="tool-card content-management">
                <h2>Menu</h2>
            </div>
        </a>
        <a href="empleados.php">
            <div class="tool-card order-management">
                <h2>Employees</h2>
            </div>
        </a>
        <a href="analisis.php">
            <div class="tool-card reporting">
                <h2>Analytics</h2>
            </div>
        </a>

        <!-- Agrega más herramientas aquí -->
    </div>
</body>

</html>