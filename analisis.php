<?php
include('php/gastos.php');
?>

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

        img {
            width: 100%;
            /* Ancho del 100% del contenedor (se ajustará automáticamente) */
            height: 100%;
            display: block;
            /* Eliminar el espacio adicional debajo de la imagen */
            border-radius: 50%;
        }

        .resumen {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            width: 90%;
            margin: 0 auto;
            display: grid;
            gap: 2rem;
            grid-template-columns: repeat(2, 1fr);
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

        .widget:hover {
            transform: translateY(-5px);
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
            height: 90%;
            margin-top: 10%;

        }

        .bar-3 {
            height: 60%;
            margin-top: 40%;
        }

        .bar-2 {
            height: 70%;
            margin-top: 30%;
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
            <section class="widget widget-1">
                <h2>Completed Orders</h2>
                <div class="widget-content">
                    <div class="sub">
                        <div class="contador animate__animated animate__rotateIn">
                            <?php
                            include('php/datosPedidos.php');
                            $numPedidosCompletados = contarPedidosCompletados();
                            echo " <p class='ingesos'>" . $numPedidosCompletados . "</p>";
                            ?>

                        </div>
                    </div>
                    <div class="sub ingresos animate__animated animate__animated animate__flash">
                        <?php

                        $totalGenerado = sumarTotalPedidosCompletados();
                        // Imprime el resultado
                        echo "<p>" . number_format($totalGenerado, 2, ',', '.') . " €</p>";
                        ?>
                    </div>

                </div>
            </section>
            <section class="widget widget-1">
                <h2>Global Balance</h2>
                <div class="widget-content-full">
                    <div class="contenedor_balance positivo">+ <?php echo number_format($totalGenerado, 2, ',', '.') ?> €</div>
                    <div class="ingresos_barra animate__animated animate__animated animate__zoomInLeft"></div>
                    <div class="contenedor_balance negativo">- <?php echo number_format(listarGastos(), 2, ',', '.') ?> €</div>
                    <div class="gastos_barra animate__animated animate__animated animate__zoomInLeft"></div>
                    <div class="contenedor_balance total">
                        <?php
                        $total = $totalGenerado - listarGastos();
                        echo "<p>" . number_format($total, 2, ',', '.') . " €</p>";
                        ?>
                    </div>


                </div>
            </section>
            <section class="widget widget-2">
                <h2>Best dishes</h2>

                <div class="podio">
                    <?php
                    include('php/tabla_platos_menos.php');
                    obtenerTopPlatos($pdo)
                    ?>
                </div>
                <div class="podio2">
                    <p>1. Ensalada César</p>
                    <p>2. Ensalada César</p>
                    <p>3. Ensalada César</p>
                </div>
            </section>
            <?php
            // Incluye el archivo que contiene la función
            require_once('php/recordatorio_gastos.php');

            // Llama a la función para obtener el widget de próximos gastos
            generarProximosGastos($pdo);

            // Imprime el widget en tu página HTML

            ?>
        </section>

    </div>
    <script>
        // Función para calcular la proporción entre ingresos y gastos
        function calcularProporcion(ingresos, gastos) {
            return ingresos / (ingresos + gastos);
        }



        // Función para ajustar el ancho de las barras
        function ajustarAnchoBarras() {
            // Obtener elementos HTML de las barras y los valores de ingresos y gastos
            const ingresosBarra = document.querySelector(".ingresos_barra");
            const gastosBarra = document.querySelector(".gastos_barra");
            const totalGenerado = <?php echo $totalGenerado; ?>; // Supongo que esta variable ya está definida
            const totalGastos = <?php echo listarGastos(); ?>; // Supongo que esta función devuelve el total de gastos
            const totalElement = document.querySelector(".contenedor_balance.total");
            // Calcular la proporción
            total = totalGenerado + totalGastos;
            proporcion = totalGenerado / total;
            // Ajustar el ancho de las barras en función de la proporción
            ingresosBarra.style.width = `${proporcion * 100}%`;
            gastosBarra.style.width = `${(1 - proporcion) * 100}%`;

        }

        // Llamar a la función para ajustar el ancho de las barras cuando se cargue la página
        window.addEventListener("load", ajustarAnchoBarras);
    </script>



</body>

</html>