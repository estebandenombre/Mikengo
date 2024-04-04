<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
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
            margin: 2rem 2rem 0 2rem;
            border-radius: 5px;
            color: #fff;
            /* Color del texto */
            padding: 10px 20px 0 20px;
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

        .agregar-seccion {
            background-color: #007bff;
            /* Verde */
            margin: 4rem;
            width: 10rem;
        }

        .titulo_carta {
            margin: 2rem auto;
            color: black;

        }

        .contenedor_seccion {
            border: #333 solid 1px;
            width: 90%;
            margin: 0 auto;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: white;
        }

        .contenedor_titulo {
            width: 90%;
            margin: 2rem auto;
            height: 4rem;
            display: flex;
            justify-content: center;
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

        .contenedor_empleados {
            width: 100%;
            height: 100vh;
            margin-top: 4rem;
        }

        .listado_empleados {
            width: 90%;
            display: grid;
            gap: 2rem;
            grid-template-columns: repeat(3, 1fr);
            margin: 2rem auto;
        }

        .contenedor_empleado {
            width: 90%;
            margin: 0 auto;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            /* Cambio a columna para mostrar los datos al lado */
            align-items: center;
            justify-content: center;
            border: #333 solid 2px;
            padding: 20px;
        }

        .doted {
            border: #333 dotted 2px !important;
            max-width: 100%;
            max-height: 100%;
        }

        .info {
            width: 90%;
            margin: 0 auto;
        }

        @media screen and (max-width: 768px) {

            .listado_empleados {
                width: 90%;
                display: grid;
                gap: 1rem;
                grid-template-columns: repeat(1, 1fr);
                margin: 4rem auto;
            }

            .contenedor_empleado {
                width: 80%;
                margin: 0 auto;
                border-radius: 5px;
                display: flex;
                flex-direction: column;
                /* Cambio a columna para mostrar los datos al lado */
                align-items: center;
                justify-content: center;
                border: #333 solid 2px;
                padding: 20px;
            }
        }

        img {
            width: 100%;
            /* Ancho del 100% del contenedor (se ajustará automáticamente) */
            height: 100%;
            display: block;
            /* Eliminar el espacio adicional debajo de la imagen */
            border-radius: 50%;
        }

        .contenedor_regresar:hover {
            transform: translateX(-5px);

        }

        .contenedor_tareas {
            width: 90%;
            margin: 2rem auto;
        }

        .ocultar {
            display: none;
        }

        input[type="text"],
        input[type="number"] {
            background: none;
            border: none;
            outline: none;
            font-size: 16px;
            /* Esto elimina el borde de enfoque */
        }

        p {
            font-size: 16px;
        }

        input[type="submit"],
        .boton {
            width: 100%;
            margin: 0.5rem auto;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 5px;
            margin-right: 10px;
            background-color: #333;
            transition: background-color 0.3s ease;

        }

        .nombre_empleado.editable {
            display: block;
        }

        .nombre_empleado.active {
            display: block;
        }

        /* Estilos para el formulario de añadir empleado */
        .contenedor_formulario {
            display: none;
            width: 90%;
            margin: 0 auto;
            border-radius: 5px;
            border: #333 solid 2px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .contenedor_formulario.active {
            display: block;
        }

        .btn_añadir_empleado {
            width: 100%;
            height: 100%;
            border: none;

            cursor: pointer;
            font-size: 1.6rem;
        }

        .ocultar {
            display: none !important;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="panel_admin.php">
            <div class="contenedor_regresar"><img src="build/img/back2.png" alt=""></div>
        </a>
        <div class="contenedor_titulo">
            <h1>Employees</h1>
        </div>
    </div>
    <section class="contenedor_empleados">
        <div class="listado_empleados">
            <?php
            // Incluir el archivo de conexión a la base de datos
            require_once "conexion_db.php";

            try {
                // Realizar una consulta para obtener la información de los empleados
                $consulta = "SELECT * FROM empleados";
                $stmt = $pdo->query($consulta);

                // Verificar si hay registros en la tabla
                if ($stmt->rowCount() > 0) {
                    // Iterar a través de los registros y mostrar la información en tarjetas
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="contenedor_empleado">';
                        echo '<form class="info" action="guardar_cambios.php" method="POST">';
                        // Resto de los campos
                        echo '<div class="contenedor_info">';
                        echo '<p>Name: <input type="text" name="nombre" value="' . $row['nombre'] . '" data-campo="nombre"></p>';
                        echo '<p>Age: <input type="number" name="edad" value="' . $row['edad'] . '" data-campo="edad"></p>';
                        echo '<p>Location: <input type="text" name="localidad" value="' . $row['localidad'] . '" data-campo="localidad"></p>';
                        echo '<p>Position: <input type="text" name="puesto" value="' . $row['puesto'] . '" data-campo="puesto"></p>';
                        echo '<p>Salary: <input type="number" name="sueldo" value="' . $row['sueldo'] . '"data-campo="sueldo"></p>';
                        echo '</div>';
                        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                        echo '<input type="submit" value="Save Changes">';
                        echo '</form>';

                        // Agregar el mensaje de confirmación para eliminar al empleado
                        echo '<form class="info" action="eliminar_empleado.php" method="POST" onsubmit="return confirmarEliminacion();">';
                        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                        echo '<input type="submit" value="Delete Employee">';
                        echo '</form>';
                        echo '</div>';
                    }
                }
            } catch (PDOException $e) {
                // En caso de error en la consulta, puedes manejarlo aquí
                echo 'Error: ' . $e->getMessage();
            }
            ?>
            <div class="contenedor_empleado doted" id="nuevo_empleado">
                <button class="btn_añadir_empleado" onclick="mostrarFormulario()">Add</button>
            </div>
            <div class="contenedor_formulario" id="formulario_empleado">
                <h2>
                    New Employee</h2>
                <form class="info" action="guardar_empleado.php" method="POST">
                    <div class="contenedor_nombre">
                        <p>Name: <input type="text" name="nombre" placeholder="Name"></p>
                    </div>
                    <div class="contenedor_info">
                        <p>Age: <input type="number" name="edad" placeholder="Age"></p>
                        <p>Location: <input type="text" name="localidad" placeholder="Location"></p>
                        <p>Position: <input type="text" name="puesto" placeholder="Position"></p>
                        <p>Salary: <input type="number" name="sueldo" placeholder="Salary"></p>
                    </div>
                    <input type="submit" value="Guardar">
                </form>
                <div class="info"><button class="boton w" id="cancelarOperacion" onclick="noMostrarFormulario()">Cancelar</button></div>


            </div>

            <script>
                function editNombre(element) {
                    element.style.display = 'block';
                    const inputElement = element.nextElementSibling;
                    inputElement.style.display = 'block';
                    inputElement.focus();
                }

                function mostrarFormulario() {
                    const nuevoEmpleado = document.getElementById('nuevo_empleado');
                    const formularioEmpleado = document.getElementById('formulario_empleado');

                    nuevoEmpleado.style.display = 'none';
                    formularioEmpleado.style.display = 'block';
                }

                function cancelarCreacion() {
                    const nuevoEmpleado = document.getElementById('nuevo_empleado');
                    const formularioEmpleado = document.getElementById('formulario_empleado');

                    nuevoEmpleado.style.display = 'block';
                    formularioEmpleado.style.display = 'none';
                }

                function confirmarEliminacion() {
                    return confirm("¿Estás seguro de que deseas eliminar a este empleado?");
                }

                function noMostrarFormulario() {
                    const nuevoEmpleado = document.getElementById('nuevo_empleado');
                    const formularioEmpleado = document.getElementById('formulario_empleado');

                    nuevoEmpleado.style.display = 'block';
                    formularioEmpleado.style.display = 'none';
                }
            </script>

</body>

</html>