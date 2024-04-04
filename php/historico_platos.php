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

try {
    // Realiza una consulta SQL para obtener los datos de los platos pedidos
    $consulta = "SELECT pedido FROM pedidos  WHERE estado = 'Completed'";

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

    // Retorna los resultados como JSON
    echo json_encode($platosYCantidad);
} catch (PDOException $e) {
    // En caso de error en la consulta, puedes manejarlo aquí
    die("Error en la consulta: " . $e->getMessage());
}
