<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiKENGO</title>
    <link rel="stylesheet" href="build/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text&display=swap" rel="stylesheet">
</head>

<body>
    <div class="cargar">
        <div class="loader">
            <span>M</span>
            <span>I</span>
            <span>K</span>
            <span>E</span>
            <span>N</span>
            <span>G</span>
            <span>O</span>
        </div>
    </div>
    <div class="contenido_index ocultar">
        <div class="contenedor_inicio">
            <div class="ocultar chaotic-orbit"></div>
        </div>
        <nav class="navbar">
            <div class="logo">
                <a href="#">MiKENGO</a>
            </div>
            <div class="menu-toggle">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <ul class="menu">
                <li><a href="#inicio-section" class="smooth-scroll">Home</a></li>
                <li><a href="#menu-section" class="smooth-scroll">Menu</a></li>
                <li><a href="#reserva-section" class="smooth-scroll">Reservations</a></li>
            </ul>
            <div class="cart-icon">
                <img src="build/img/bill.png" alt="Shopping Cart">
                <span class="cart-count">0</span>
            </div>
        </nav>
        <section class="inicio-section" id="inicio-section">
            <header class="inicio-header animate__animated animate__fadeIn">
                <h1>Welcome to MiKENGO</h1>

            </header>
        </section>
        <section class="menu-section" id="menu-section">
            <h2>Our Coffees</h2>
            <div class="menu-cards">
                <!-- Espresso Coffee -->
                <div class="menu-card">
                    <img src="build/img/c1.jpeg" alt="Espresso Coffee">
                    <h3>Espresso Coffee</h3>
                    <p>Intense and strong</p>
                    <p class="price">1.60€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <!-- Cortado Coffee -->
                <div class="menu-card">
                    <img src="build/img/c2.jpeg" alt="Cortado Coffee">
                    <h3>Coffee Milk</h3>
                    <p>Smooth and creamy</p>
                    <p class="price">1.85€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <!-- Latte Coffee -->
                <div class="menu-card">
                    <img src="build/img/c3.jpeg" alt="Latte Coffee">
                    <h3>Latte Coffee</h3>
                    <p>Smooth and delicious</p>
                    <p class="price">2.30€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <!-- Cappuccino -->
                <div class="menu-card">
                    <img src="build/img/c4.jpeg" alt="Cappuccino">
                    <h3>Cappuccino</h3>
                    <p>Rich and frothy</p>
                    <p class="price">2.30€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <!-- Flat White -->
                <div class="menu-card">
                    <img src="build/img/c5.jpeg" alt="Flat White">
                    <h3>Flat White</h3>
                    <p>Smooth and velvety</p>
                    <p class="price">2.60€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <!-- Americano -->
                <div class="menu-card">
                    <img src="build/img/c6.jpeg" alt="Americano">
                    <h3>Americano</h3>
                    <p>Smooth and light</p>
                    <p class="price">2.20€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <!-- Latte Macchiato -->
                <div class="menu-card">
                    <img src="build/img/c7.jpeg" alt="Latte Macchiato">
                    <h3>Latte Macchiato</h3>
                    <p>Creamy and delicious</p>
                    <p class="price">3.00€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <!-- Iced Latte Coffee -->
                <div class="menu-card">
                    <img src="build/img/c8.jpeg" alt="Iced Latte Coffee">
                    <h3>Iced Latte Coffee</h3>
                    <p>Refreshing and delicious</p>
                    <p class="price">3.00€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <!-- Dbl Cafe Latte -->
                <div class="menu-card">
                    <img src="build/img/c9.jpeg" alt="Dbl Cafe Latte">
                    <h3>Dbl Cafe Latte</h3>
                    <p>Strong and creamy</p>
                    <p class="price">2.80€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <!-- Dbl Cappuccino -->
                <div class="menu-card">
                    <img src="build/img/c10.jpeg" alt="Dbl Cappuccino">
                    <h3>Dbl Cappuccino</h3>
                    <p>Rich and frothy</p>
                    <p class="price">2.80€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <!-- Hot Chocolate -->
                <div class="menu-card">
                    <img src="build/img/c11.jpeg" alt="Hot Chocolate">
                    <h3>Hot Chocolate</h3>
                    <p>Hot and delicious</p>
                    <p class="price">3.00€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
            </div>
        </section>

        <section class="menu-section" id="menu-ensaladas">
            <h2>Food</h2>
            <div class="menu-cards">
                <div class="menu-card">
                    <img src="build/img/f1.jpeg" alt="Breakfast Toasts">
                    <h3>Breakfast Toasts</h3>
                    <p>Served with grated tomato (v) or homemade apple and cinnamon jam with butter OR homemade peanut butter</p>
                    <p class="price">2.25€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <div class="menu-card">
                    <img src="build/img/f2.jpeg" alt="Banana Bread with Peanut Butter">
                    <h3>Banana Bread with Peanut Butter. All homemade and vegan (V)</h3>
                    <p>Both our banana bread and peanut butter are made on-site and are vegan. One of our most popular dishes.</p>
                    <p class="price">3.25€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <div class="menu-card">
                    <img src="build/img/f3.jpeg" alt="Gluten-Free Orange & Almond Cake with Yogurt">
                    <h3>Gluten-Free Orange & Almond Cake with Yogurt</h3>
                    <p>Homemade with Valencian oranges and ground almond flour. Delicious at any time of the day.</p>
                    <p class="price">3.25€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <div class="menu-card">
                    <img src="build/img/f4.jpeg" alt="Cinnamon Roll">
                    <h3>Cinnamon Roll</h3>
                    <p class="price">2.15€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <div class="menu-card">
                    <img src="build/img/f5.jpeg" alt="Croissant">
                    <h3>Croissant</h3>
                    <p class="price">2.60€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <div class="menu-card">
                    <img src="build/img/f6.jpeg" alt="Carrot Cake">
                    <h3>Carrot Cake</h3>
                    <p>Homemade with soft cheese and walnut topping. Yummy!!</p>
                    <p class="price">3.34€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <div class="menu-card">
                    <img src="build/img/f7.jpeg" alt="Brownie">
                    <h3>Brownie</h3>
                    <p>Homemade with chocolate, of course!!! ;) A true delight.</p>
                    <p class="price">3.25€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <div class="menu-card">
                    <img src="build/img/f8.jpeg" alt="Cookie">
                    <h3>Cookie</h3>
                    <p class="price">2.50€</p> <!-- Price in euros -->
                    <button class="add-to-cart">Add</button>
                </div>
                <!-- Add more salad cards here -->
            </div>
        </section>


        <section class="reservas-section" id="reserva-section">
            <div class="reservas-content">
                <h2>Make a Reservation</h2>
                <p>Please fill out the form to make a reservation at our restaurant.</p>
                <form class="reservas-form" action="procesar_reserva.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Name:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Phone:</label>
                        <input type="tel" id="telefono" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Date:</label>
                        <input type="date" id="fecha" name="fecha" required>
                    </div>
                    <div class="form-group">
                        <label for="hora">Time:</label>
                        <input type="time" id="hora" name="hora" required>
                    </div>
                    <div class="form-group">
                        <label for="personas">Number of People:</label>
                        <input type="number" id="personas" name="personas" required>
                    </div>
                    <div class="form-group">
                        <label for="comentarios">Comments:</label>
                        <textarea id="comentarios" name="comentarios" rows="4"></textarea>
                    </div>
                    <button type="submit" class="reserva-button">Make Reservation</button>
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
                <h2>Order</h2>

            </div>
            <ul id="carrito-lista">
                <!-- Los productos seleccionados se mostrarán aquí -->
            </ul>
            <p>Total: <span id="carrito-total">0.00€</span></p> <!-- Precio en euros -->
            <button id="pagar-carrito" class="btn-pagar">Place Order</button>
        </div>
    </div>
    <script>
        // Función para verificar si todas las imágenes están cargadas
        function todasLasImagenesCargadas() {
            var imagenes = document.getElementsByTagName('img');
            for (var i = 0; i < imagenes.length; i++) {
                if (!imagenes[i].complete) {
                    return false;
                }
            }
            return true;
        }

        window.addEventListener('load', function() {
            var loader = document.querySelector(".cargar");
            var contenido = document.querySelector(".contenido_index");

            // Verificar si todas las imágenes están cargadas
            if (todasLasImagenesCargadas()) {
                setTimeout(function() {
                    loader.style.display = "none";
                    contenido.classList.toggle("ocultar");
                }, 4000); // 4000 milisegundos = 4 segundos
            } else {
                // Si no todas las imágenes están cargadas, seguir verificando cada 100 milisegundos
                var interval = setInterval(function() {
                    if (todasLasImagenesCargadas()) {
                        clearInterval(interval); // Detener la verificación
                        setTimeout(function() {
                            loader.style.display = "none";
                            contenido.classList.toggle("ocultar");
                        }, 4000); // 4000 milisegundos = 4 segundos
                    }
                }, 100); // Verificar cada 100 milisegundos
            }
        });
    </script>

    <script src="build/js/bundle.min.js"></script>
</body>

</html>