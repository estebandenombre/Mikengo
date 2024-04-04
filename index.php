<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Pato Mareado</title>
    <link rel="stylesheet" href="build/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text&display=swap" rel="stylesheet">
</head>

<body>

    <div class="contenido_index">
        <div class="contenedor_inicio">
            <div class="ocultar chaotic-orbit"></div>
        </div>
        <nav class="navbar">
            <div class="logo">
                <a href="#">El Pato Mareado</a>
            </div>
            <div class="menu-toggle">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <ul class="menu">
                <li><a href="#inicio-section" class="smooth-scroll">Inicio</a></li>
                <li><a href="#menu-section" class="smooth-scroll">Carta</a></li>
                <li><a href="#reserva-section" class="smooth-scroll">Reservas</a></li>
            </ul>
            <div class="cart-icon">
                <img src="build/img/bill.png" alt="Carrito de Compras">
                <span class="cart-count">0</span>
            </div>
        </nav>


        <?php
        // Incluye la conexión a la base de datos (conexion_db.php)
        require_once('php/mostrarPlatos.php');

        // Definir la función obtenerSeccionesYPlatos() aquí

        // Llama a la función y obtén los datos
        $seccionesYPlatos = obtenerSeccionesYPlatos();

        if (!empty($seccionesYPlatos)) {
            foreach ($seccionesYPlatos as $seccionPlato) {
                echo '<section class="menu-section">';
                echo '<h2 class="titulo_seccion_platos">' . $seccionPlato['nombre_seccion'] . '</h2>';
                echo '<div class="menu-cards">';
                foreach ($seccionPlato['platos'] as $plato) {
                    echo '<div class="menu-card">';
                    echo '<h3>' . $plato['nombre_plato'] . '</h3>'; // Aquí cerré la etiqueta h3 correctamente
                    echo '<p>' . $plato['descripcion'] . '</p>';
                    echo '<p class="price">' . $plato['precio'] . '</p>';
                    echo '<button class="add-to-cart">Añadir</button>';
                    echo '</div>';
                }
                echo '</div>';
                echo '</section>';
            }
        } else {
            echo '<p>No se encontraron platos en esta sección.</p>';
        }
        ?>





        <section class="reservas-section" id="reserva-section">
            <div class="reservas-content">
                <h2>Haz tu Reserva</h2>
                <p>Por favor, complete el formulario para hacer una reserva en nuestro restaurante.</p>
                <form class="reservas-form" action="procesar_reserva.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" id="telefono" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" required>
                    </div>
                    <div class="form-group">
                        <label for="hora">Hora:</label>
                        <input type="time" id="hora" name="hora" required>
                    </div>
                    <div class="form-group">
                        <label for="personas">Número de Personas:</label>
                        <input type="number" id="personas" name="personas" required>
                    </div>
                    <div class="form-group">
                        <label for="comentarios">Comentarios:</label>
                        <textarea id="comentarios" name="comentarios" rows="4"></textarea>
                    </div>
                    <button type="submit" class="reserva-button">Hacer Reserva</button>
                </form>
            </div>
        </section>
        <footer class="footer">
            <div class="footer-content">
                <p>&copy; 2023 Pizzería Delicioso. Todos los derechos reservados.</p>
            </div>
        </footer>
        <div class="carrito-resumen animate_animated animate__fadeInRight animate__slow">
            <div class="carrito-header">
                <button id="cerrar-carrito" class="cerrar-carrito-btn">X</button>
                <h2>Resumen del Pedido</h2>

            </div>
            <ul id="carrito-lista">
                <!-- Los productos seleccionados se mostrarán aquí -->
            </ul>
            <p>Total: <span id="carrito-total">0.00€</span></p> <!-- Precio en euros -->
            <button id="pagar-carrito" class="btn-pagar">Realizar pedido</button>
        </div>
    </div>
    <script src="build/js/bundle.min.js"></script>
</body>

</html>