

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../models/User.php';
require_once '../config/database.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Manejo de inicio de sesión
    $user = new User();
    if ($user->login($username, $password)) {
        $_SESSION['user_id'] = $username;
        $_SESSION['user_name'] = $user->getUserName($username); // Opcional

        // Redirigir al panel de administración
        header('Location: ../views/admin_panel.php');
        exit;
    } else {
        echo "Usuario o contraseña incorrectos. <a href='../views/login_register.php'>Intentar de nuevo</a>";
    }
}
