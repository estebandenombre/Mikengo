<?php
include('php/datosPedidos.php');
require_once('conexion_db.php');
$totalGenerado = sumarTotalPedidosCompletados();
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
            height: 100%;
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

        .div-con-scroll {
            max-height: 20rem;
            /* Establece la altura máxima que deseas para el div */
            overflow-y: scroll;
            overflow-x: hidden;
            /* Oculta la barra de desplazamiento en X */
            position: relative;
            /* Necesario para personalizar la barra de desplazamiento vertical */
        }

        .div-con-scroll::-webkit-scrollbar {
            width: 6px;
            /* Ancho de la barra de desplazamiento vertical */
            background-color: #f5f5f5;
            /* Color de fondo de la barra */
        }

        .div-con-scroll::-webkit-scrollbar-thumb {
            background-color: #888;
            /* Color del "pulgar" de la barra de desplazamiento */
            border-radius: 3px;
            /* Bordes redondeados del "pulgar" */
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
            margin-left: 2rem;
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

        .gasto {
            width: 90%;
            border-radius: 5px;
            margin: 1rem auto 0 auto;
            border: #333 solid 1px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }



        .gasto p {
            font-size: 12px;
            margin: 0 1rem;
        }



        .barra_balance {
            width: 100%;
            height: 2rem;
            margin: 1rem auto;

            display: grid;
            gap: 0rem;
            grid-template-columns: repeat(4, 1fr);
        }





        .filtro_balance {
            width: 100%;
            margin: 0 auto;
            height: 2rem;
            grid-column: 3/5;
            display: grid;
            gap: 1rem;
            grid-template-columns: repeat(3, 1fr);
        }

        .fila {
            grid-column: 1/3;
        }

        .r {
            max-height: 10rem;

        }

        .ocultar {
            display: none;
        }

        #gastoForm {
            width: 90%;
            display: grid;
            display: grid;
            gap: 0.5rem;
            grid-template-columns: repeat(2, 1fr);
            margin-left: 1rem;
        }

        .botones {
            margin-bottom: 1rem;
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

                <div class="barra_balance">
                    <div>
                        <h2>Balance</h2>
                    </div>
                    <div class="filtro_balance">
                        <button>Total</button>
                        <button>Monthly</button>
                        <button>Daily</button>

                    </div>
                </div>
                <div class="widget-content-full balance">
                    <div class="contenedor_balance positivo">+ <?php echo number_format($totalGenerado, 2) ?></div>
                    <div class="ingresos_barra"></div>
                    <div class="contenedor_balance negativo">- 7.340,45€</div>
                    <div class="gastos_barra"></div>
                    <div class="contenedor_balance total">+ 3.340,45€</div>
                </div>
            </section>
            <section class="widget widget-1">
                <div class="barra_balance">
                    <div>
                        <h2>Expenses</h2>
                    </div>
                    <div class="filtro_balance">
                        <button id="btnAgregar">Add</button>
                        <button class="botones-edicion" id="btnEdit">Edit</button>
                        <button class="botones-edicion" id="btnRemove">Remove</button>
                    </div>
                </div>
                <div class="div-con-scroll r">
                    <div class="gasto ocultar añadir">
                        <form id="gastoForm" action="guardar_gasto.php" method="POST">
                            <div class="descripción">
                                <label for="nombre">Name:</label>
                                <input type="text" id="nombre" name="nombre" required>
                            </div>
                            <div class="importe">
                                <label for="importe">Amount:</label>
                                <input type="number" id="importe" name="importe" step="0.01" required>
                            </div>
                            <div class="fecha">
                                <label for="fecha">Scheduled Date:</label>
                                <input type="date" id="fecha" name="fecha" required>
                            </div>
                            <div class="tipo">
                                <label for="tipo">Type:</label>
                                <select id="tipo" name="tipo" required>
                                    <option value="one-time">One-Time</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="annual">Annual</option>
                                </select>
                            </div>
                            <div class="botones">
                                <button type="submit">Save</button>
                                <button id="btn-cancelar-gasto">Cancel</button>
                            </div>


                        </form>

                    </div>
                    <?php
                    // Incluye el archivo de conexión a la base de datos


                    // Realiza una consulta SQL para obtener los gastos desde la base de datos
                    $consulta = "SELECT * FROM gastos";
                    $resultado = $pdo->query($consulta);

                    // Muestra los gastos dentro del div-con-scroll
                    echo '<div class="div-con-scroll r">';

                    // Itera sobre los gastos desde la base de datos
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        $gastoID = $fila['id']; // Obtén el ID del gasto
                        echo '<div class="gasto">';
                        echo '<div class="descripción"">';
                        echo '<p>' . $fila['nombre'] . '</p>';
                        echo '<p class="fecha">' . $fila['fecha'] . '</p>';
                        echo '</div>';
                        echo '<div class="importe">';
                        echo '<p>' . number_format($fila['importe'], 2, ',', '.') . ' €</p>';
                        echo '</div>';
                        echo '<div class="tipo">';
                        echo '<p>' . $fila['tipo'] . '</p>';
                        echo '</div>';
                        // Agrega botones para editar, guardar cambios y eliminar con el ID del gasto
                        echo '<div class="admin-gastos ocultar">';
                        echo '<button class="editar-gasto" data-gasto-id="' . $gastoID . '">Editar</button>';
                        echo '<button class="guardar-cambios" data-gasto-id="' . $gastoID . '">Guardar</button>';
                        echo '<button class="eliminar-gasto" data-gasto-id="' . $gastoID . '">Eliminar</button>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>


                <!-- Resto de los gastos aquí -->
    </div>
    </section>


    <section class="widget fila widget-1">
        <div class="barra_balance una">
            <div>
                <h2>Income</h2>
            </div>
        </div>
        <div class="div-con-scroll">
            <?php
            include('php/ingresos.php');
            listarPedidosCompletados();
            ?>
        </div>



    </section>


    </section>

    </div>
    <script>
        // Variables de control
        let modoEdicion = false;
        let gastoSeleccionado = null;

        // Función para agregar un nuevo gasto
        function agregarGasto(nombre, fecha, importe) {
            const divGasto = document.createElement("div");
            divGasto.classList.add("gasto");

            const divDescripcion = document.createElement("div");
            divDescripcion.classList.add("descripción");
            divDescripcion.innerHTML = `
            <p>${nombre}</p>
            <p class="fecha">${fecha}</p>
        `;

            const divImporte = document.createElement("div");
            divImporte.classList.add("importe");
            divImporte.innerHTML = `<p>${importe}</p>`;

            divGasto.appendChild(divDescripcion);
            divGasto.appendChild(divImporte);

            // Evento para editar el gasto al hacer clic
            divGasto.addEventListener("click", () => {
                if (modoEdicion) {
                    // Aquí puedes implementar la lógica de edición
                    // Por ejemplo, permitir que el usuario edite el nombre, la fecha o el importe
                    // gastoSeleccionado contiene el gasto seleccionado para editar
                    // Puedes acceder a los elementos de divDescripcion y divImporte para obtener los datos actuales
                }
            });

            // Agregar el nuevo gasto al contenedor
            const contenedorGastos = document.querySelector(".div-con-scroll.r");
            contenedorGastos.appendChild(divGasto);
        }
        // Evento para agregar un nuevo gasto al hacer clic en el botón "Añadir"
        document.getElementById("btn-cancelar-gasto").addEventListener("click", () => {
            // Mostrar el formulario para agregar un nuevo gasto
            const divAñadir = document.querySelector(".añadir");
            divAñadir.classList.toggle("ocultar");

            // Si estás en modo edición, sal del modo edición
            if (modoEdicion) {
                modoEdicion = false;
                gastoSeleccionado = null;
            }
        });

        // Evento para agregar un nuevo gasto al hacer clic en el botón "Añadir"
        document.getElementById("btnAgregar").addEventListener("click", () => {
            // Mostrar el formulario para agregar un nuevo gasto
            const divAñadir = document.querySelector(".añadir");
            divAñadir.classList.remove("ocultar");

            // Si estás en modo edición, sal del modo edición
            if (modoEdicion) {
                modoEdicion = false;
                gastoSeleccionado = null;
            }
        });
        const editarBotones = document.querySelectorAll(".editar-gasto");
        const guardarBotones = document.querySelectorAll(".guardar-cambios");
        const eliminarBotones = document.querySelectorAll(".eliminar-gasto");

        // Agrega un manejador de eventos para los botones "Editar"
        editarBotones.forEach((editarBoton) => {
            editarBoton.addEventListener("click", () => {
                const gastoID = editarBoton.getAttribute("data-gasto-id");
                habilitarEdicion(gastoID);
            });
        });

        // Agrega un manejador de eventos para los botones "Guardar Cambios"
        guardarBotones.forEach((guardarBoton) => {
            guardarBoton.addEventListener("click", () => {
                const gastoID = guardarBoton.getAttribute("data-gasto-id");
                guardarCambios(gastoID);
            });
        });

        // Agrega un manejador de eventos para los botones "Eliminar"
        eliminarBotones.forEach((eliminarBoton) => {
            eliminarBoton.addEventListener("click", () => {
                const gastoID = eliminarBoton.getAttribute("data-gasto-id");
                eliminarGasto(gastoID);
            });
        });

        // Función para habilitar la edición de un gasto
        function habilitarEdicion(gastoID) {
            const descripcionElement = document.querySelector(`#descripcion-${gastoID}`);
            const importeElement = document.querySelector(`#importe-${gastoID}`);
            const tipoElement = document.querySelector(`#tipo-${gastoID}`);
            const guardarBoton = document.querySelector(`#guardar-${gastoID}`);
            const editarBoton = document.querySelector(`#editar-${gastoID}`);
            const eliminarBoton = document.querySelector(`#eliminar-${gastoID}`);

            descripcionElement.contentEditable = true;
            importeElement.contentEditable = true;
            tipoElement.disabled = false;

            guardarBoton.style.display = "inline-block";
            editarBoton.style.display = "none";
            eliminarBoton.style.display = "none";
        }

        // Función para guardar cambios en un gasto
        function guardarCambios(gastoID) {
            const descripcionElement = document.querySelector(`#descripcion-${gastoID}`);
            const importeElement = document.querySelector(`#importe-${gastoID}`);
            const tipoElement = document.querySelector(`#tipo-${gastoID}`);
            const guardarBoton = document.querySelector(`#guardar-${gastoID}`);
            const editarBoton = document.querySelector(`#editar-${gastoID}`);
            const eliminarBoton = document.querySelector(`#eliminar-${gastoID}`);

            // Obtén los valores editados
            const nuevaDescripcion = descripcionElement.innerText;
            const nuevoImporte = importeElement.innerText;
            const nuevoTipo = tipoElement.value;

            // Envía una solicitud al servidor para guardar los cambios
            // Implementa la lógica en el servidor para actualizar la información del gasto
            // Puedes usar una solicitud AJAX o un formulario para enviar la solicitud

            // Ejemplo de solicitud AJAX utilizando jQuery
            $.ajax({
                type: "POST",
                url: "guardar_cambios_gasto.php", // Reemplaza con la URL correcta
                data: {
                    gasto_id: gastoID,
                    descripcion: nuevaDescripcion,
                    importe: nuevoImporte,
                    tipo: nuevoTipo
                },
                success: function(response) {
                    // Maneja la respuesta del servidor (éxito o error)
                    alert(response); // Muestra un mensaje al usuario
                },
                error: function() {
                    // Maneja errores de AJAX
                    alert("Error al guardar los cambios del gasto");
                }
            });

            // Después de guardar los cambios, deshabilita la edición y muestra los botones
            descripcionElement.contentEditable = false;
            importeElement.contentEditable = false;
            tipoElement.disabled = true;

            guardarBoton.style.display = "none";
            editarBoton.style.display = "inline-block";
            eliminarBoton.style.display = "inline-block";
        }

        // Función para eliminar un gasto
        function eliminarGasto(gastoID) {
            // Envía una solicitud al servidor para eliminar el gasto
            // Implementa la lógica en el servidor para eliminar el gasto
            // Puedes usar una solicitud AJAX o un formulario para enviar la solicitud

            // Ejemplo de solicitud AJAX utilizando jQuery
            $.ajax({
                type: "POST",
                url: "eliminar_gasto.php", // Reemplaza con la URL correcta
                data: {
                    gasto_id: gastoID
                },
                success: function(response) {
                    // Maneja la respuesta del servidor (éxito o error)
                    alert(response); // Muestra un mensaje al usuario
                },
                error: function() {
                    // Maneja errores de AJAX
                    alert("Error al eliminar el gasto");
                }
            });

            // Después de eliminar el gasto, puedes recargar la página o actualizar la lista de gastos

        }
    </script>
    <script src="build/js/bundle.min.js"></script>


</body>

</html>