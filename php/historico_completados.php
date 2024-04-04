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

// Obtén el valor del estado desde la solicitud GET
$estado = isset($_GET['estado']) ? $_GET['estado'] : 'Completed';

try {
    // Realiza una consulta SQL para obtener los pedidos según el estado
    $consulta = "SELECT DATE_FORMAT(fecha_pedido, '%m') AS mes, COUNT(*) AS cantidad
                 FROM pedidos
                 WHERE estado = :estado
                 GROUP BY mes
                 ORDER BY mes";

    $stmt = $pdo->prepare($consulta);
    $stmt->bindParam(':estado', $estado);
    $stmt->execute();

    // Prepara un arreglo para almacenar los datos
    $data = array_fill(0, 12, 0); // Inicializa un arreglo con 12 elementos (uno para cada mes) con valor 0

    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // $fila['mes'] contiene el número de mes (ejemplo: '01' para enero)
        // Utiliza ese valor para actualizar el arreglo $data
        $mes = (int)$fila['mes'];
        $cantidad = (int)$fila['cantidad'];
        $data[$mes - 1] = $cantidad;
    }

    // Retorna los resultados como JSON
    echo json_encode($data);
} catch (PDOException $e) {
    // En caso de error en la consulta, puedes manejarlo aquí
    die("Error en la consulta: " . $e->getMessage());
}
