<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        /* Estilos CSS para dar formato a la carta */
        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            font-family: 'Golos Text', sans-serif;
        }

        .navbar {

            /* Color de fondo de la barra de navegación */
            margin: 2rem;
            border-radius: 5px;
            color: #fff;
            /* Color del texto */
            padding: 10px 20px;
            /* Espaciado interno */
            display: flex;
            justify-content: space-between;
            /* Alinea los elementos a la izquierda y derecha */
            align-items: center;
            color: #333;
            /* Centra verticalmente los elementos */
        }

        .navbar-title {
            font-size: 24px;
            /* Tamaño del texto del título */
        }

        .navbar-links {
            list-style-type: none;

            /* Quita las viñetas de la lista */
            margin: 0;
            /* Elimina el margen predeterminado de la lista */
            padding: 0;
            /* Elimina el relleno predeterminado de la lista */
        }

        .navbar-links li {
            display: inline;
            /* Muestra los elementos de la lista en línea (en la misma fila) */
            margin-right: 20px;
            /* Espacio entre los elementos */
        }

        .navbar-back {
            text-decoration: none;
            /* Quita la decoración de enlace */
            color: #fff;
            /* Color del enlace */
            margin-right: auto;
            /* Empuja el enlace hacia la izquierda tanto como sea posible */
        }

        /* Estilos para dispositivos móviles */
        @media screen and (max-width: 768px) {
            .navbar {
                flex-direction: column;
                /* Cambia a un diseño de columna en dispositivos móviles */
                text-align: center;
                /* Centra el texto en dispositivos móviles */
            }

            .navbar-links {
                margin-top: 10px;
                /* Espacio superior en dispositivos móviles */
            }

            .navbar-links li {
                margin: 10px 0;
                /* Espacio vertical entre elementos en dispositivos móviles */
                display: block;
                /* Muestra los elementos de la lista en bloques (uno debajo del otro) */
            }
        }



        .titulo_carta {
            margin: 2rem auto;
            color: black;

        }





        h1 {
            font-size: 28px;
        }

        .contenedor_regresar {
            width: 25px;
            height: 25px;
        }

        @media screen and (max-width: 768px) {

            .contenedor_opciones {
                width: 100%;
                display: flex;
                align-self: center;
                justify-content: center;
            }

            .contenedor_regresar {
                position: absolute;
                top: 1rem;
                left: 1rem;
            }

        }

        .contenedor_regresar:hover {
            transform: translateX(-5px);

        }


        h1 {
            margin: 0;
        }

        main {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            width: 90%;
            margin: 0 auto;
        }

        /* Estilos de los widgets */
        .widget {
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 45%;
            /* Ancho del widget */
            box-sizing: border-box;
        }

        .widget h2 {
            font-size: 24px;
            margin-top: 0;
        }

        /* Estilos responsivos */
        @media screen and (max-width: 768px) {
            main {
                flex-direction: column;
            }

            .widget {
                width: 100%;
                margin-bottom: 20px;
            }
        }

        .contenedor_titulo {
            width: 90%;
            margin: 2rem auto;
            height: 4rem;
            display: flex;
            justify-content: center;
            color: black;
        }

        .contenedor_regresar img {
            width: 100%;
            /* Ancho del 100% del contenedor (se ajustará automáticamente) */
            height: 100%;
            display: block;
            /* Eliminar el espacio adicional debajo de la imagen */

        }

        .resumen {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            width: 90%;
            margin: 0 auto;
            display: grid;
            gap: 2rem;
            grid-template-columns: repeat(4, 1fr);
        }

        /* Estilos de los widgets */
        .widget {
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            box-sizing: border-box;
            border-radius: 5px;
            transition: transform 0.2s ease;
        }



        .widget h2 {
            font-size: 24px;
            font-weight: bold;
            margin-top: 0;
            margin-bottom: 20px;

        }

        .widget-content {
            text-align: center;
            width: 100%;
            max-height: 10rem;
            display: grid;
            gap: 0rem;
            grid-template-columns: repeat(2, 1fr);
        }

        .widget-content-full {
            text-align: center;
            width: 100%;
            max-height: 10rem;
        }



        .sub {

            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        .contador {
            width: 8rem;
            height: 8rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: #333 solid 3px;
        }

        .contador p {
            font-size: 50px;
            color: #333;
        }

        .ingresos {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ingresos p {
            font-size: 50px;
            color: #333;
        }

        .podio {
            width: 100%;
            height: 10rem;

            display: grid;
            gap: 2rem;
            grid-template-columns: repeat(3, 1fr);
        }

        .podio2 {
            display: none;
        }

        .bar {
            flex: 1;
            width: 100%;
            height: 100%;
            background-color: #333;
            border-radius: 5px;
            color: #fff;
        }

        .info_plato {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bar-1 {
            height: 70%;
            margin-top: 30%;
        }

        .bar-3 {
            height: 60%;
            margin-top: 40%;
        }

        .bar-2 {
            height: 90%;
            margin-top: 10%;
        }

        .n {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .n {
            margin-top: 10px;
            font-size: 30px !important;
        }

        .gold {
            color: #FFD700;
        }

        .silver {
            color: #C0C0C0;
        }

        .bronze {
            color: #CD7F32;
        }

        .circular {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            background-color: #CD7F32;
            margin: 0 auto;
            background-color: #fff;
        }

        .circular p {
            color: #333;
        }

        .ingresos_barra {
            width: 80%;
            height: 1rem;
            margin: 1rem 0;
            background-color: green;
            border-radius: 5px;
        }

        .gastos_barra {
            width: 50%;
            height: 1rem;
            margin: 1rem 0;
            background-color: red;
            border-radius: 5px;
        }

        .contenedor_balance {
            width: 100%;


            text-align: justify;
            font-size: 15px;
        }

        .positivo {
            color: green;
        }

        .negativo {
            color: red;
        }

        .total {
            color: #333;
            font-size: 25px;
            text-align: justify;
        }

        p {
            text-align: justify;
        }

        /* Estilos responsivos */
        @media screen and (max-width: 768px) {

            .resumen {
                display: flex;
                justify-content: space-between;
                padding: 20px;
                width: 90%;
                margin: 0 auto;
                display: grid;
                gap: 2rem;
                grid-template-columns: repeat(1, 1fr);
            }

            .widget {
                grid-column: 1/1;
                width: 70%;
                margin: 0 auto;
            }

            p {
                font-size: 0.5rem;
            }

            .contador {
                width: 5rem;
                height: 5rem;
            }

            .contador p,
            .ingresos p {
                font-size: 1.6rem;
            }

            .widget-content {
                text-align: center;
                width: 100%;
                max-height: 10rem;
                display: grid;
                gap: 0rem;
                grid-template-columns: repeat(1, 1fr);
            }

            .podio {
                display: none;
            }

            .podio2 {
                display: block;
            }

            .podio2 p {
                font-size: 1rem;
            }




        }

        .porcentaje {
            font-size: 1rem;
        }

        span {
            font-weight: bold !important;
            margin-left: 1rem;
        }

        .barra_nav {
            width: 50%;
            height: 4rem;
            margin: 0 auto;
            border: #333 3px solid;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .opcion {
            width: 10rem;
            height: 2rem;
            background-color: #333;
            margin: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            border-radius: 5px;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        .chart-container {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
        }

        #graficoBarrasHorizontales {
            max-width: 100%;

        }

        .o3 {
            grid-column: 2/5;
        }

        /* Estilos CSS para la tabla */
        .top-platos {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .top-platos th,
        .top-platos td {
            padding: 8px 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .top-platos th {
            background-color: #f2f2f2;
        }

        /* Estilos para resaltar la fila principal */
        .top-platos tbody tr:first-child {
            color: #333;
        }

        /* Estilos responsivos */
        @media screen and (max-width: 768px) {
            .top-platos {
                font-size: 14px;
            }
        }

        .entero {
            grid-column: 1/5;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .simulador {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type=number] {
            width: 90%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        .sim {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            font-size: 18px;
            cursor: pointer;
        }

        .resultados {
            margin-top: 20px;
            font-size: 18px;
        }

        .f3 {
            grid-column: 2/5;
        }

        .contenedor_svg img {
            width: 100%;
            height: 100%;
            margin: 0 auto;
            border-radius: none;
        }

        .contenedor_resumen {
            width: 100%;
            height: 4rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Estilos iniciales para los botones */
        .filtro_balance button {
            background-color: #f5f5f5;
            /* Color de fondo para los botones inactivos */
            color: #333;
            /* Color de texto para los botones inactivos */
            border: none;
            /* Quitar el borde de los botones */
            padding: 10px 20px;
            /* Espaciado interno */
            cursor: pointer;
            /* Cambiar el cursor al pasar por encima */
            transition: background-color 0.3s, color 0.3s;
            /* Transición suave de colores */
        }

        /* Estilos para el botón activo */
        .filtro_balance button:focus,
        .filtro_balance button:active {
            background-color: rgba(75, 192, 192, 0.6);
            /* Color de fondo para el botón activo */
            color: #333;
            /* Color de texto para el botón activo */
            outline: none;
            /* Quitar el borde de enfoque predeterminado */
        }
    </style>
</head>

<body>
    <div class="navbar">

        <a href="panel_admin.php">
            <div class="contenedor_regresar"><img src="build/img/back2.png" alt=""></div>
        </a>
        <h1 class="navbar-title">Analytics</h1>
        <ul class="navbar-links">
            <li><a href="analisis.php">Summary</a></li>
            <li><a href="analisis_pedidos.php">Orders</a></li>
            <li><a href="finanzas.php">Finance</a></li>
        </ul>
    </div>
    <div class="contenido_analisis">

        <section class="resumen">


            <section class="widget fila widget-1">
                <div class="barra_balance una">
                    <div>
                        <h2>Completed Orders</h2>
                    </div>
                    <div class="filtro_balance">
                        <form action="analisis_pedidos.php" method="post">
                            <input type="date" id="fecha_inicial" name="fecha_inicial" required>
                            <input type="date" id="fecha_final" name="fecha_final" required>
                            <input type="submit" value="Consult">
                        </form>
                    </div>
                    <div class="widget-content">
                        <div class="sub">
                            <div class="contador animate__animated animate__rotateIn">
                                <p class="ingresos" id="cantidad_pedidos"></p>
                            </div>
                        </div>
                        <div class="sub ingresos animate__animated animate__animated animate__flash">
                            <p id="ingresos_totales"></p>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            // Verifica si se ha enviado el formulario
            if (isset($_POST['fecha_inicial']) && isset($_POST['fecha_final'])) {
                // Obtiene las fechas desde el formulario
                $fechaInicial = $_POST['fecha_inicial'];
                $fechaFinal = $_POST['fecha_final'];

                include('php/pedidos_completados.php');

                // Llama a la función para obtener la información de pedidos
                $informacionPedidos = obtenerInformacionPedidos($fechaInicial, $fechaFinal);

                // Actualiza los valores de los elementos HTML con los resultados
                echo '<script>
                document.getElementById("cantidad_pedidos").textContent = "' . $informacionPedidos['cantidad_pedidos'] . '";
                document.getElementById("ingresos_totales").textContent = "' . number_format($informacionPedidos['ingresos_totales'], 2, ',', '.') . '€";
              </script>';
            }
            ?>

            <section class="widget o3 fila widget-1">
                <h2 id="titulo_historico_pedidos">Completed Orders History</h2>
                <div class="filtro_balance">
                    <button id="btnCompletados">Completed</button>
                    <button id="btnCancelados">Cancelled</button>
                    <button id="btnReembolsados">Refunded</button>
                </div>

                <div class="chart-container">
                    <canvas id="barChart"></canvas>
                </div>
            </section>
            <?php
            include('php/tabla_platos_menos.php');
            generarTablaPlatosYIngresos($pdo)
            ?>


            <section class="widget o3 fila widget-1">
                <h2>Number of times a dish is ordered</h2>
                <div>
                    <canvas id="graficoBarrasHorizontales"></canvas>
                </div>
            </section>
            <section class="widget entero fila widget-1">
                <h1>Dish List</h1>

                <table class="top-platos">
                    <tr>
                        <th>Dish Name</th>
                        <th>Production Cost</th>
                        <th>Selling Price</th>
                        <th>Number of Orders</th>
                        <th>Generated Revenue</th>
                        <th>Net Profit</th>
                    </tr>
                    <tr>
                        <td>Filet Mignon</td>
                        <td>10.00€</td>
                        <td>30.00€</td>
                        <td>50</td>
                        <td>1,500.00€</td>
                        <td>1,000.00€</td>
                    </tr>
                    <tr>
                        <td>Pasta Alfredo</td>
                        <td>5.00€</td>
                        <td>15.00€</td>
                        <td>80</td>
                        <td>1,200.00€</td>
                        <td>700.00€</td>
                    </tr>
                    <tr>
                        <td>Assorted Sushi</td>
                        <td>12.00€</td>
                        <td>25.00€</td>
                        <td>60</td>
                        <td>1,500.00€</td>
                        <td>900.00€</td>
                    </tr>
                    <tr>
                        <td>Margherita Pizza</td>
                        <td>4.00€</td>
                        <td>12.00€</td>
                        <td>90</td>
                        <td>1,080.00€</td>
                        <td>480.00€</td>
                    </tr>
                    <tr>
                        <td>Caesar Salad</td>
                        <td>3.00€</td>
                        <td>10.00€</td>
                        <td>70</td>
                        <td>700.00€</td>
                        <td>400.00€</td>
                    </tr>
                    <!-- Add more rows with dishes and data here -->
                    <tr>
                        <td>Lasagna</td>
                        <td>6.00€</td>
                        <td>16.00€</td>
                        <td>40</td>
                        <td>640.00€</td>
                        <td>280.00€</td>
                    </tr>
                    <tr>
                        <td>Fish Tacos</td>
                        <td>8.00€</td>
                        <td>18.00€</td>
                        <td>55</td>
                        <td>990.00€</td>
                        <td>660.00€</td>
                    </tr>
                    <tr>
                        <td>Chicken Curry</td>
                        <td>7.00€</td>
                        <td>20.00€</td>
                        <td>65</td>
                        <td>1,300.00€</td>
                        <td>585.00€</td>
                    </tr>
                    <tr>
                        <td>BBQ Ribs</td>
                        <td>9.00€</td>
                        <td>24.00€</td>
                        <td>75</td>
                        <td>1,800.00€</td>
                        <td>900.00€</td>
                    </tr>
                    <tr>
                        <td>Grilled Fish</td>
                        <td>10.00€</td>
                        <td>26.00€</td>
                        <td>62</td>
                        <td>1,612.00€</td>
                        <td>612.00€</td>
                    </tr>
                    <tr>
                        <td>Fried Rice</td>
                        <td>5.00€</td>
                        <td>14.00€</td>
                        <td>78</td>
                        <td>1,092.00€</td>
                        <td>492.00€</td>
                    </tr>
                    <tr>
                        <td>Club Sandwich</td>
                        <td>4.00€</td>
                        <td>12.00€</td>
                        <td>88</td>
                        <td>1,056.00€</td>
                        <td>352.00€</td>
                    </tr>
                    <tr>
                        <td>French Fries</td>
                        <td>2.00€</td>
                        <td>8.00€</td>
                        <td>95</td>
                        <td>760.00€</td>
                        <td>570.00€</td>
                    </tr>
                    <tr>
                        <td>Spring Rolls</td>
                        <td>3.00€</td>
                        <td>10.00€</td>
                        <td>42</td>
                        <td>420.00€</td>
                        <td>210.00€</td>
                    </tr>

                </table>
            </section>
            <section class="widget row widget-1">
                <h2>Simulator</h2>
                <label for="costoProduccion">Production Cost (€):</label>
                <input type="number" id="costoProduccion" placeholder="Example: 10.00" step="0.01" required>

                <label for="precioVenta">Selling Price (€):</label>
                <input type="number" id="precioVenta" placeholder="Example: 30.00" step="0.01" required>

                <label for="vecesPedido">Number of Times Ordered:</label>
                <input type="number" id="vecesPedido" placeholder="Example: 50" required>

                <button class="sim" onclick="calculateRevenueAndProfit()">Calculate</button>

                <div class="results">
                    <p>Generated Revenue: <span id="ingresosGenerados">0.00 €</span></p>
                    <p>Profit: <span id="beneficio">0.00 €</span></p>
                </div>
            </section>

            <section class="widget f3 fila widget-1">
                <h2>Estimated Times</h2>
                <div class="contenedor_svg"><img src="esquema.svg" alt="Descripción de la imagen SVG"></div>
                <p>The estimated time between receiving and completing an order is 40 minutes and 5 seconds.</p>
                <p>An order takes an average of 10 minutes to be prepared and ready to serve.</p>
                <p>An order takes an average of 30 minutes to be billed.</p>
                <div class="contenedor_resumen">
                    <p>Trp = 5''</p>
                    <p>Tpe = 10'</p>
                    <p>Tec = 30'</p>
                    <p>Trc = 40' 5''</p>
                </div>
            </section>


        </section>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const meses = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];


        // Obtener el contexto del lienzo del gráfico
        const ctx = document.getElementById('barChart').getContext('2d');

        // Declarar una variable para el gráfico actual
        let barChart;

        // Función para crear o actualizar el gráfico de barras
        function crearOActualizarGrafico(data) {
            // Destruir el gráfico actual si existe
            if (barChart) {
                barChart.destroy();
            }

            // Crear un nuevo gráfico de barras
            barChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: meses,
                    datasets: [{
                        label: 'Orders',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Number of Orders'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Months'
                            }
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        }

        // Función para cargar datos y crear el gráfico inicial
        function cargarDatosYCrearGrafico(estado) {
            // Realizar una solicitud AJAX para obtener datos según el estado
            // Aquí debes hacer la solicitud AJAX a tu archivo PHP que proporciona los datos
            // Asume que la respuesta se almacena en la variable "data"

            // Ejemplo de solicitud AJAX utilizando fetch:
            fetch(`/php/historico_completados.php?estado=${estado}`)
                .then(response => response.json())
                .then(data => {
                    // Llamar a la función para crear o actualizar el gráfico
                    crearOActualizarGrafico(data);
                })
                .catch(error => {
                    console.error('Error en la solicitud AJAX:', error);
                });
        }

        // Manejar el clic en los botones de filtrado
        document.getElementById('btnCompletados').addEventListener('click', function() {
            cargarDatosYCrearGrafico('Completed');
            document.getElementById("titulo_historico_pedidos").textContent = "Completed Orders History";
        });

        document.getElementById('btnCancelados').addEventListener('click', function() {
            cargarDatosYCrearGrafico('Cancelled');
            document.getElementById("titulo_historico_pedidos").textContent = "Cancelled Orders History";
        });

        document.getElementById('btnReembolsados').addEventListener('click', function() {
            cargarDatosYCrearGrafico('Reembolsado');
            document.getElementById("titulo_historico_pedidos").textContent = "Refunded Orders History";
        });

        // Cargar datos y crear el gráfico inicial con el estado "Completed"
        cargarDatosYCrearGrafico('Completed');
        const ctx2 = document.getElementById("graficoBarrasHorizontales").getContext("2d");

        // Función para cargar los datos y crear la gráfica
        function cargarDatosYCrearGrafico2() {
            // Realizar una solicitud AJAX para obtener los datos desde el archivo PHP
            fetch("php/historico_platos.php")
                .then(response => response.json())
                .then(data => {
                    // Extraer los datos del objeto JSON recibido
                    const platos = Object.keys(data);
                    const pedidos = Object.values(data);

                    // Crear el gráfico de barras
                    const myChart = new Chart(ctx2, {
                        type: "bar",
                        data: {
                            labels: platos,
                            datasets: [{
                                label: "Times Ordered",
                                data: pedidos,
                                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    beginAtZero: true,
                                    stepSize: 5
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                }
                            },
                            indexAxis: 'y',
                        }
                    });
                })
                .catch(error => {
                    console.error('Error en la solicitud AJAX:', error);
                });
        }

        // Llamar a la función para cargar datos y crear la gráfica
        cargarDatosYCrearGrafico2();

        function calcularIngresosYBeneficio() {
            const costoProduccion = parseFloat(document.getElementById("costoProduccion").value);
            const precioVenta = parseFloat(document.getElementById("precioVenta").value);
            const vecesPedido = parseInt(document.getElementById("vecesPedido").value);

            if (isNaN(costoProduccion) || isNaN(precioVenta) || isNaN(vecesPedido)) {
                alert("Por favor, ingrese números válidos.");
                return;
            }

            const ingresosGenerados = (precioVenta * vecesPedido).toFixed(2);
            const beneficio = ((precioVenta - costoProduccion) * vecesPedido).toFixed(2);

            document.getElementById("ingresosGenerados").textContent = `${ingresosGenerados} €`;
            document.getElementById("beneficio").textContent = `${beneficio} €`;
        }
    </script>




</body>

</html>