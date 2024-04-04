<?php
// Supongamos que ya tienes una conexión a la base de datos llamada $pdo
function listarGastos()
{
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

    $gastoTotal = 0; // Inicializa el total de gastos

    try {
        // Realiza una consulta SQL para obtener los importes de los gastos
        $consulta = "SELECT importe FROM gastos";
        $resultado = $pdo->query($consulta);

        while ($gasto = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $gastoTotal += +$gasto['importe']; // Suma el importe al total
        }
    } catch (PDOException $e) {
        // Manejo de errores en la consulta
        die("Error en la consulta: " . $e->getMessage());
    }

    return $gastoTotal;
}
