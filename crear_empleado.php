<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $localidad = $_POST["localidad"];
    $puesto = $_POST["puesto"];
    $salario = $_POST["salario"];

    // Realizar la conexión a la base de datos (asegúrate de incluir tu conexión a la base de datos aquí)
    include "conexion_db.php";

    // Preparar la consulta SQL para insertar el empleado en la base de datos
    $sql = "INSERT INTO empleados (nombre, edad, localidad, puesto_trabajo, salario) 
            VALUES (:nombre, :edad, :localidad, :puesto, :salario)";
    
    try {
        // Preparar la declaración SQL
        $stmt = $pdo->prepare($sql);

        // Bind values
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':edad', $edad, PDO::PARAM_INT);
        $stmt->bindParam(':localidad', $localidad, PDO::PARAM_STR);
        $stmt->bindParam(':puesto', $puesto, PDO::PARAM_STR);
        $stmt->bindParam(':salario', $salario, PDO::PARAM_STR);

        // Ejecutar la declaración SQL
        $stmt->execute();

        // Redirigir de nuevo a la página principal o realizar cualquier otra acción que necesites
        header("Location: empleados.php");
        exit();
    } catch (PDOException $e) {
        echo "Error al crear el empleado: " . $e->getMessage();
    }
}
?>
