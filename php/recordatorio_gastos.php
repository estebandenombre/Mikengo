<?php
// Función para generar el widget de próximos gastos
function generarProximosGastos($pdo)
{
    try {
        // Realiza una consulta SQL para obtener los datos de los próximos gastos
        $consulta = "SELECT nombre, importe, DATEDIFF(fecha, CURDATE()) AS dias FROM gastos WHERE fecha >= CURDATE() ORDER BY fecha";

        $stmt = $pdo->prepare($consulta);
        $stmt->execute();

        // Almacena el resultado en una variable
        $widgetHTML = '';

        // Imprime el encabezado del widget
        $widgetHTML .= '<section class="widget widget-1">';
        $widgetHTML .= '<h2>Upcoming Expenses</h2>';
        $widgetHTML .= '<div class="widget-content-full">';

        // Recorre los resultados y muestra los datos en el formato HTML deseado
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nombre = $fila['nombre'];
            $importe = number_format($fila['importe'], 2, ',', '.') . '€';
            $dias = $fila['dias'];

            if ($dias == 0) {
                $diasTexto = 'Today';
            } elseif ($dias == 1) {
                $diasTexto = 'Tomorrow';
            } elseif ($dias > 30) {
                $meses = floor($dias / 30);

                if ($meses > 12) {
                    $años = floor($meses / 12);
                    $meses_restantes = $meses % 12;
                    if ($años > 1 && $meses_restantes > 1) {
                        $diasTexto = $años . ' years and ' . $meses_restantes . ' months';
                    } elseif ($años > 1 && $meses_restantes == 1) {
                        $diasTexto = $años . ' years and ' . $meses_restantes . ' month';
                    } elseif ($años == 1 && $meses_restantes > 1) {
                        $diasTexto = $años . ' year and ' . $meses_restantes . ' months';
                    } else {
                        $diasTexto = $años . ' year and ' . $meses_restantes . ' month';
                    }
                } else {
                    $diasTexto = ($meses == 1) ? '1 month' : $meses . ' months';
                }
            } else {
                $diasTexto = $dias . ' days';
            }

            $widgetHTML .= '<p>' . $nombre . ': ' . $importe . ' <span>in ' . $diasTexto . '</span></p>';
        }

        // Cierra el widget
        $widgetHTML .= '</div>';
        $widgetHTML .= '</section>';

        // Retorna el HTML del widget
        return $widgetHTML;
    } catch (PDOException $e) {
        // En caso de error en la consulta, puedes manejarlo aquí
        die("Error en la consulta: " . $e->getMessage());
    }
}

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

    // Llama a la función para generar el widget de próximos gastos
    $widgetProximosGastos = generarProximosGastos($pdo);

    // Imprime el widget en tu página HTML
    echo $widgetProximosGastos;
} catch (PDOException $e) {
    // En caso de error en la conexión, puedes manejarlo aquí
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}
