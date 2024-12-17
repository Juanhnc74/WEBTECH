<?php
// Iniciar sesión
session_start();

// Si el usuario no está logueado, redirigir a login
if (!isset($_SESSION['user_id'])) {
    header('Location: login_register.php');
    exit;
}

// Mostrar contenido del panel de administración
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
</head>
<body>
    <h2>Bienvenido al Panel de Administración</h2>
    <p>Hola, <?php echo $_SESSION['user_name']; ?>. ¡Estás logueado!</p>
    <a href="../controllers/logout.php">Cerrar sesión</a>
</body>
</html>
