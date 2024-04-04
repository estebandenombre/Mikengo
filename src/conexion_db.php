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
