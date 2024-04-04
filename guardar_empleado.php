<?php
// Incluir el archivo de conexión a la base de datos
require_once "conexion_db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Obtener los datos del formulario
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];
        $localidad = $_POST["localidad"];
        $puesto = $_POST["puesto"];
        $sueldo = $_POST["sueldo"];

        // Preparar la consulta SQL para insertar un nuevo empleado
        $consulta = "INSERT INTO empleados (nombre, edad, localidad, puesto, sueldo) VALUES (:nombre, :edad, :localidad, :puesto, :sueldo)";
        $stmt = $pdo->prepare($consulta);

        // Bind de los parámetros
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":edad", $edad, PDO::PARAM_INT);
        $stmt->bindParam(":localidad", $localidad, PDO::PARAM_STR);
        $stmt->bindParam(":puesto", $puesto, PDO::PARAM_STR);
        $stmt->bindParam(":sueldo", $sueldo, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Redirigir de nuevo a la página principal o donde sea necesario
        header("Location: empleados.php");
        exit();
    } catch (PDOException $e) {
        // En caso de error en la consulta, puedes manejarlo aquí
        echo 'Error: ' . $e->getMessage();
    }
}
