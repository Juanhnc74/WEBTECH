<?php
// Iniciar sesión
session_start();

// Si el usuario ya está logueado, redirigir al panel
if (isset($_SESSION['user_id'])) {
    header('Location: admin_panel.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>
</head>
<body>
    <h2>Formulario de Registro e Ingreso</h2>

    <!-- Formulario de Registro -->
    <form action="../controllers/login_handler.php" method="POST">
        <h3>Registro</h3>
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="nombre">Nombre completo:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <input type="hidden" name="action" value="register">
        <button type="submit">Registrar</button>
    </form>

    <hr>

    <!-- Formulario de Login -->
    <form action="../controllers/login_handler.php" method="POST">
        <h3>Iniciar sesión</h3>
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="hidden" name="action" value="login">
        <button type="submit">Iniciar sesión</button>
    </form>

    <?php
    if (isset($message)) {
        echo "<p>$message</p>";
    }
    ?>

</body>
</html>
