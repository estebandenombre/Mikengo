<?php
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (reemplaza con tus propios datos de conexión)
    require_once('conexion_db.php');

    // Recibir datos del formulario
    $nombreSeccion = $_POST['nombre_seccion'];

    // Validar y sanitizar los datos (agrega más validaciones según tus necesidades)
    $nombreSeccion = filter_var($nombreSeccion, FILTER_SANITIZE_STRING);

    if ($nombreSeccion) {
        // Insertar la nueva sección en la base de datos
        $consulta = "INSERT INTO secciones (nombre_seccion) VALUES (:nombre_seccion)";
        $stmt = $pdo->prepare($consulta);

        $stmt->bindParam(':nombre_seccion', $nombreSeccion, PDO::PARAM_STR);

        if ($stmt->execute()) {
            // Éxito: la sección se creó correctamente
            header("Location: menu.php"); // Redirigir a la página principal u otra página de tu elección
            exit;
        } else {
            // Error al insertar la sección en la base de datos
            echo "Error al crear la sección. Por favor, inténtalo de nuevo.";
        }
    } else {
        // Datos de entrada no válidos
        echo "Los datos del formulario no son válidos. Por favor, verifica los campos.";
    }
} else {
    // La solicitud no es de tipo POST, redirigir o mostrar un mensaje de error
    echo "Acceso no autorizado.";
}
?>
