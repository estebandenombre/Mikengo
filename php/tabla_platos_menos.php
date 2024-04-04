<?php
// Datos de conexión a la base de datos
$host = "";
$dbname = "";
$usuario = "";
$contrasena = "";

try {
    // Crear una nueva conexión PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $contrasena);

    // Configurar el modo de error y lanzar excepciones en caso de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Opcional: Establecer el juego de caracteres a UTF-8
    $pdo->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    // En caso de error en la conexión, puedes manejarlo aquí
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}

function generarTablaPlatosYIngresos($pdo)
{
    // Inicia el bloque de la tabla HTML
    $tablaHTML = '
    <section class="widget fila widget-1">
        <h2>Dishes and Generated Revenue</h2>
        <div class="contenedor_top">
            <table class="top-platos">
                <thead>
                    <tr>
                        <th>Dish Name</th>
                        <th>Number of Times Ordered</th>
                        <th>Unit Price (€)</th>
                        <th>Total Revenue (€)</th>

                    </tr>
                </thead>
                <tbody>';

    // Coloca aquí el código PHP que obtiene los platos y la cantidad de veces que se han pedido
    // desde la base de datos y los almacena en el arreglo $platosYCantidad
    try {
        // Realiza una consulta SQL para obtener los datos de los platos pedidos
        $consulta = "SELECT pedido FROM pedidos WHERE estado = 'Completed'";

        $stmt = $pdo->prepare($consulta);
        $stmt->execute();

        // Arreglo para almacenar los platos y la cantidad de veces que se han pedido
        $platosYCantidad = [];

        // Recorre los resultados
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Decodifica el contenido JSON en la columna "pedido"
            $pedido = json_decode($fila['pedido'], true);

            // Verifica si $pedido es un array válido antes de iterar
            if (is_array($pedido)) {
                // Recorre los platos en el pedido
                foreach ($pedido as $plato) {
                    $nombrePlato = $plato['nombre'];

                    // Si el plato ya existe en el arreglo, aumenta la cantidad
                    if (isset($platosYCantidad[$nombrePlato])) {
                        $platosYCantidad[$nombrePlato]['cantidad']++;
                    } else {
                        // Si no existe, agrega el plato al arreglo con cantidad 1 y precio
                        $platosYCantidad[$nombrePlato] = [
                            'cantidad' => 1,
                            'precio' => $plato['precio']
                        ];
                    }
                }
            }
        }

        // Ordena el arreglo por la cantidad de platos pedidos de menor a mayor
        asort($platosYCantidad);

        // Recorre el arreglo $platosYCantidad
        foreach ($platosYCantidad as $nombrePlato => $datosPlato) {
            $cantidad = $datosPlato['cantidad'];
            $precioUnitario = $datosPlato['precio'];
            $ingresosTotales = $cantidad * $precioUnitario;

            // Agrega una fila a la tabla HTML
            $tablaHTML .= '
            <tr>
                <td>' . $nombrePlato . '</td>
                <td>' . $cantidad . '</td>
                <td>' . number_format($precioUnitario, 2) . '</td>
                <td>' . number_format($ingresosTotales, 2) . '</td>
            </tr>';
        }
    } catch (PDOException $e) {
        // En caso de error en la consulta, puedes manejarlo aquí
        die("Error en la consulta: " . $e->getMessage());
    }

    // Finaliza el bloque de la tabla HTML
    $tablaHTML .= '
                </tbody>
            </table>
        </div>
    </section>';

    // Imprime la tabla HTML
    echo $tablaHTML;
}
function obtenerTopPlatos($pdo)
{
    try {
        // Realiza una consulta SQL para obtener los datos de los platos pedidos
        $consulta = "SELECT pedido FROM pedidos WHERE estado = 'Completed'";

        $stmt = $pdo->prepare($consulta);
        $stmt->execute();

        // Arreglo para almacenar los platos y la cantidad de veces que se han pedido
        $platosYCantidad = [];

        // Recorre los resultados
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Decodifica el contenido JSON en la columna "pedido"
            $pedido = json_decode($fila['pedido'], true);

            // Verifica si $pedido es un array válido antes de iterar
            if (is_array($pedido)) {
                // Recorre los platos en el pedido
                foreach ($pedido as $plato) {
                    $nombrePlato = $plato['nombre'];

                    // Si el plato ya existe en el arreglo, aumenta la cantidad
                    if (isset($platosYCantidad[$nombrePlato])) {
                        $platosYCantidad[$nombrePlato]++;
                    } else {
                        // Si no existe, agrega el plato al arreglo con cantidad 1
                        $platosYCantidad[$nombrePlato] = 1;
                    }
                }
            }
        }

        // Ordena el arreglo por la cantidad de platos pedidos de mayor a menor
        arsort($platosYCantidad);

        // Obtiene los nombres de los 3 platos más pedidos y su cantidad
        $topPlatos = array_slice($platosYCantidad, 0, 3);

        // Imprime los resultados en el formato necesario
        $contador = 1;
        foreach ($topPlatos as $nombrePlato => $cantidad) {
            echo '<div class="bar animate__animated animate__slideInUp bar-' . $contador . ' animate__delay-' . $contador . 's">';
            echo '<div class="n">' . $contador . '</div>';
            echo '<div class="info_plato">';
            echo '<p>' . $nombrePlato . '</p>';
            echo '</div>';
            if ($contador === 1) {
                echo '<div class="info_plato circular">';
                echo '<p>' . $cantidad . '</p>';
                echo '</div>';
            }
            echo '</div>';
            $contador++;
        }

        // Imprime la lista de nombres de los 3 platos más pedidos
        echo '<div class="podio2">';
        $contador = 1;
        foreach ($topPlatos as $nombrePlato => $cantidad) {
            echo '<p>' . $contador . '. ' . $nombrePlato . '</p>';
            $contador++;
        }
        echo '</div>';
    } catch (PDOException $e) {
        // En caso de error en la consulta, puedes manejarlo aquí
        die("Error en la consulta: " . $e->getMessage());
    }
}

// Llama a la función para obtener y mostrar el top de platos
