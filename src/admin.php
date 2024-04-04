<?php
// Verifica si ya se ha iniciado sesión como administrador
session_start();
// Verifica si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica las credenciales de inicio de sesión (reemplaza con tus propias credenciales)
    $admin_username = "admin"; // Cambia esto por tu nombre de usuario de administrador
    $admin_password = "admin"; // Cambia esto por tu contraseña de administrador

    $input_username = $_POST["username"];
    $input_password = $_POST["password"];

    if ($input_username === $admin_username && $input_password === $admin_password) {
        // Inicia sesión como administrador
        session_start();
        $_SESSION['admin_logged_in'] = true;

        // Redirige al panel de administración si las credenciales son correctas
        header("Location: panel_admin.php");
        exit;
    } else {
        $login_error = "Credenciales incorrectas. Por favor, intenta de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Administration Panel</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>

<body>
    <div class="login-container">
        <h2>Login - Administration Panel</h2>
        <?php if (isset($login_error)) { ?>
            <p class="error-message"><?php echo $login_error; ?></p>
        <?php } ?>
        <form method="POST" action="admin.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="submit-button">Login</button>
        </form>
    </div>
</body>

</html>