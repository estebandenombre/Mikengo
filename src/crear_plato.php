<?php

// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (reemplaza con tus propios datos de conexión)
    require_once('conexion_db.php');

    // Recibir datos del formulario
    $idSeccion = $_POST['id_seccion'];
    $nombrePlato = $_POST['nombre_plato'];
    $descripcionPlato = $_POST['descripcion_plato'];
    $precioPlato = $_POST['precio_plato'];

    // Validar y sanitizar los datos (agrega más validaciones según tus necesidades)
    $nombrePlato = filter_var($nombrePlato, FILTER_SANITIZE_STRING);
    $descripcionPlato = !empty($descripcionPlato) ? filter_var($descripcionPlato, FILTER_SANITIZE_STRING) : null; // Convierte la descripción en null si está vacía
    $precioPlato = filter_var($precioPlato, FILTER_VALIDATE_FLOAT);

    if ($nombrePlato && $precioPlato !== false) {
        // Insertar el nuevo plato en la base de datos
        $consulta = "INSERT INTO platos (id_seccion, nombre_plato, descripcion, precio) VALUES (:id_seccion, :nombre_plato, :descripcion, :precio)";
        $stmt = $pdo->prepare($consulta);

        $stmt->bindParam(':id_seccion', $idSeccion, PDO::PARAM_INT);
        $stmt->bindParam(':nombre_plato', $nombrePlato, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcionPlato, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $precioPlato, PDO::PARAM_STR);

        if ($stmt->execute()) {
            // Éxito: el plato se creó correctamente
            header("Location: menu.php"); // Redirigir a la página principal u otra página de tu elección
            exit;
        } else {
            // Error al insertar el plato en la base de datos
            echo "Error al crear el plato. Por favor, inténtalo de nuevo.";
        }
    } else {
        // Datos de entrada no válidos
        echo "Los datos del formulario no son válidos. Por favor, verifica los campos.";
    }
} else {
    // La solicitud no es de tipo POST, redirigir o mostrar un mensaje de error
    echo "Acceso no autorizado.";
}
