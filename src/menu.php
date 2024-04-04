<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
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


        .seccion_carta {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f0f0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .seccion_titulo {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
            color: black;
        }

        .plato {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            border: 1px solid #e0e0e0;
            padding: 15px;
            background-color: white;
            border-radius: 5px;
        }

        .plato img {
            max-width: 100px;
            height: auto;
            margin-right: 20px;
        }

        .info-plato {
            flex: 1;
        }

        .nombre-plato {
            font-size: 20px;
            font-weight: bold;
            margin: 0;
            color: #333;
        }

        .descripcion-plato {
            font-size: 16px;
            margin: 5px 0;
            color: #777;
        }

        .precio-plato {
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
            margin: 0;
        }

        .botones-plato {
            display: flex;
            align-items: center;
        }

        .boton {
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 5px;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        .boton.eliminar {
            background-color: #ff3333;
            /* Rojo */
        }

        .boton.editar {
            background-color: #ff9900;
            /* Naranja */
        }

        .boton.guardar {
            background-color: #007bff;
            /* Azul */
        }

        .boton:hover {
            background-color: #666666;
            /* Cambia a gris oscuro al pasar el cursor */
        }

        .crear-seccion-form {
            margin-top: 20px;
            display: none;
        }

        .crear-plato-form {
            margin-top: 10px;
            display: none;
        }

        /* Agrega estilos personalizados para los botones */
        .boton.eliminar-seccion {
            background-color: #ff3333;
            /* Rojo */
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        .boton.eliminar-seccion:hover {
            background-color: #ff0000;
            /* Rojo más oscuro al pasar el cursor */

        }

        .boton.crear-plato {
            background-color: #007bff;
            /* Azul */
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        .boton.crear-plato:hover {
            background-color: #0056b3;
            /* Azul más oscuro al pasar el cursor */
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
            margin: 0 auto;
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

        img {
            width: 100%;
            /* Ancho del 100% del contenedor (se ajustará automáticamente) */
            height: auto;
            /* Altura automática (se ajustará proporcionalmente) */
            display: block;
            /* Eliminar el espacio adicional debajo de la imagen */
        }

        .contenedor_regresar:hover {
            transform: translateX(-5px);

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

        .contenedor_titulo {
            width: 100%;
            margin: 0;
        }

        .pagina_web {
            text-decoration: none;
            color: #3498db;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="panel_admin.php">
            <div class="contenedor_regresar"><img src="build/img/back2.png" alt=""></div>
        </a>
        <div class="contenedor_titulo">
            <h1>Menu</h1>
        </div>
    </div>
    <section class="seccion_carta">
        <div class="contenedor_opciones">
            <button class="boton agregar-seccion" onclick="agregarSeccion()">Add Section</button>
            <a class="pagina_web" href="index.php">Web</a>
        </div>

        <?php
        // Supongamos que ya tienes una conexión a la base de datos llamada $pdo
        require_once('conexion_db.php');

        try {
            $consultaSecciones = "SELECT * FROM secciones";
            $resultadoSecciones = $pdo->query($consultaSecciones);

            while ($seccion = $resultadoSecciones->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="contenedor_seccion">';
                echo '<h1 class="seccion_titulo">' . $seccion['nombre_seccion'] . '</h1>';



                $consultaPlatos = "SELECT * FROM platos WHERE id_seccion = " . $seccion['id_seccion'];
                $resultadoPlatos = $pdo->query($consultaPlatos);

                while ($plato = $resultadoPlatos->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="plato" id="plato_' . $plato['id_plato'] . '">';
                    // echo '<img src="' . $plato['imagen'] . '" alt="Imagen del ' . $plato['nombre_plato'] . '">';
                    echo '<div class="info-plato">';
                    echo '<h2 class="nombre-plato">' . $plato['nombre_plato'] . '</h2>';
                    echo '<p class="descripcion-plato">' . $plato['descripcion'] . '</p>';
                    echo '<p class="precio-plato">Precio: ' . number_format($plato['precio'], 2) . ' €</p>';
                    echo '</div>';
                    echo '<div class="botones-plato">';
                    echo '<button class="boton eliminar" onclick="eliminarPlato(' . $plato['id_plato'] . ')">Remove</button>';
                    echo '<button class="boton editar" onclick="editarPlato(' . $plato['id_plato'] . ')">Edit</button>';
                    echo '<button class="boton guardar" onclick="guardarCambios(' . $plato['id_plato'] . ')" style="display: none;">Save</button>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '<button class="boton eliminar-seccion" onclick="eliminarSeccion(' . $seccion['id_seccion'] . ')">Remove Section</button>'; // Botón para eliminar la sección
                echo '<button class="boton crear-plato" data-seccion="' . $seccion['id_seccion'] . '">Create dish</button>'; // Botón para crear un plato
                // Formulario para crear un nuevo plato
                echo '<form class="crear-plato-form" data-seccion="' . $seccion['id_seccion'] . '" action="crear_plato.php" method="POST" enctype="multipart/form-data">';
                echo '<input type="hidden" name="id_seccion" value="' . $seccion['id_seccion'] . '">';
                echo '<input type="text" name="nombre_plato" placeholder="Nombre del Plato">';
                echo '<input type="text" name="descripcion_plato" placeholder="Descripción">';
                echo '<input type="number" name="precio_plato" step="0.01" placeholder="Precio Venta">';
                //echo '<input type="file" name="imagen_plato" accept="image/*" placeholder="Subir una imagen">';
                echo '<button class="boton guardar" type="submit">Save</button>';
                echo '</form>';

                echo '</div>';
            }

            // Formulario para crear una nueva sección
            echo '<form class="crear-seccion-form" action="crear_seccion.php" method="POST">';
            echo '<input type="text" name="nombre_seccion" placeholder="Nombre de la Sección">';
            echo '<button class="boton guardar" type="submit">Guardar</button>';
            echo '</form>';
        } catch (PDOException $e) {
            // En caso de error en la consulta, puedes manejarlo aquí
            die("Error en la consulta: " . $e->getMessage());
        }
        ?>


    </section>


    <script>
        // Función para eliminar una sección
        function eliminarSeccion(idSeccion) {
            console.log(idSeccion);
            // Puedes mostrar una confirmación al usuario antes de eliminar la sección
            if (confirm(`Are you sure you want to delete the section?`)) {
                // Realizar una solicitud AJAX para eliminar la sección de la base de datos
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'eliminar_seccion.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        if (xhr.responseText === 'success') {
                            // Recargar la página actual para reflejar la eliminación de la sección
                            location.reload();
                        } else {
                            // Mostrar el mensaje de error en la consola
                            console.error('Error al eliminar la sección: ' + xhr.responseText);
                            alert('Error al eliminar la sección.');
                        }
                    }
                };
                xhr.send(`id_seccion=${idSeccion}`);
            }
        }

        function eliminarPlato(idPlato) {
            // Puedes mostrar una confirmación al usuario antes de eliminar el plato


            if (confirm(`Are you sure you want to delete the dish?`)) {
                // Realizar una solicitud AJAX para eliminar el plato de la base de datos
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'eliminar_plato.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Verificar si la eliminación fue exitosa
                        if (xhr.responseText === 'success') {
                            // Eliminar el elemento de la carta
                            const platoElement = document.getElementById(`plato_${idPlato}`);
                            platoElement.remove();
                            alert(`Plato eliminado con éxito.`);
                        } else {
                            alert(`Error al eliminar el plato`);
                        }
                    }
                };
                xhr.send(`id_plato=${idPlato}`);
            }
        }

        function editarPlato(idPlato) {
            // Obtener el elemento del plato en edición
            const platoElement = document.getElementById(`plato_${idPlato}`);

            // Habilitar la edición de los elementos del plato
            const nombrePlatoElement = platoElement.querySelector('.nombre-plato');
            const descripcionPlatoElement = platoElement.querySelector('.descripcion-plato');
            const precioPlatoElement = platoElement.querySelector('.precio-plato');

            nombrePlatoElement.contentEditable = true;
            descripcionPlatoElement.contentEditable = true;
            precioPlatoElement.contentEditable = true;

            // Mostrar el botón de guardar y ocultar el botón de editar
            const botonEditar = platoElement.querySelector('.editar');
            const botonGuardar = platoElement.querySelector('.guardar');

            botonEditar.style.display = 'none';
            botonGuardar.style.display = 'block';
        }

        function guardarCambios(idPlato) {
            // Obtener el elemento del plato en edición
            const platoElement = document.getElementById(`plato_${idPlato}`);

            // Obtener los nuevos valores editados
            const nombrePlatoElement = platoElement.querySelector('.nombre-plato');
            const descripcionPlatoElement = platoElement.querySelector('.descripcion-plato');
            const precioPlatoElement = platoElement.querySelector('.precio-plato');

            const nuevoNombre = nombrePlatoElement.textContent;
            const nuevaDescripcion = descripcionPlatoElement.textContent;
            const nuevoPrecio = parseFloat(precioPlatoElement.textContent.replace('Precio: ', ''));

            // Realizar una solicitud AJAX para actualizar el plato en la base de datos
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'actualizar_plato.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Verificar si la actualización fue exitosa

                    // Mostrar una alerta con los nuevos valores
                    alert(`Edited values for dish ${idPlato}:\nName: ${nuevoNombre}\nDescription: ${nuevaDescripcion}\nPrice: ${nuevoPrecio.toFixed(2)}`);


                    // Deshabilitar la edición y mostrar nuevamente el botón de editar
                    nombrePlatoElement.contentEditable = false;
                    descripcionPlatoElement.contentEditable = false;
                    precioPlatoElement.contentEditable = false;

                    // Mostrar el botón de editar y ocultar el botón de guardar
                    const botonEditar = platoElement.querySelector('.editar');
                    const botonGuardar = platoElement.querySelector('.guardar');

                    botonEditar.style.display = 'block';
                    botonGuardar.style.display = 'none';

                }
            };
            xhr.send(`id_plato=${idPlato}&nombre_plato=${nuevoNombre}&descripcion=${nuevaDescripcion}&precio=${nuevoPrecio}`);
        }

        // Agregar evento de clic a los botones "Crear Plato" de cada sección
        const crearPlatoButtons = document.querySelectorAll('.crear-plato');
        crearPlatoButtons.forEach(button => {
            button.addEventListener('click', () => {
                const seccion = button.getAttribute('data-seccion');
                toggleCrearPlatoForm(seccion);
            });
        });

        // Función para mostrar/ocultar el formulario de creación de plato
        function toggleCrearPlatoForm(seccion) {
            const crearPlatoForm = document.querySelector(`.crear-plato-form[data-seccion="${seccion}"]`);
            if (crearPlatoForm.style.display === 'none' || crearPlatoForm.style.display === '') {
                crearPlatoForm.style.display = 'block';
            } else {
                crearPlatoForm.style.display = 'none';
            }
        }

        function agregarSeccion() {
            // Mostrar un cuadro de diálogo para que el usuario ingrese el nombre de la nueva sección
            const nuevaSeccion = prompt("Enter the name of the new section:");

            // Verificar si el usuario ingresó un nombre de sección válido
            if (nuevaSeccion && nuevaSeccion.trim() !== "") {
                // Realizar una solicitud AJAX para agregar la nueva sección a la base de datos
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'agregar_seccion.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Verificar si la adición fue exitosa
                        if (xhr.responseText === 'success') {
                            // Recargar la página actual para mostrar la nueva sección
                            location.reload();
                        } else {
                            alert(`Error when adding the section.`);
                        }
                    }
                };
                xhr.send(`nombre_seccion=${nuevaSeccion}`);
            }
        }
    </script>
</body>

</html>