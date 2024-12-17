<?php
require_once '../models/User.php';

class AuthController {

    public function register() {
        // Datos del formulario de registro
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'register') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $nombre = $_POST['nombre'];

            // Crear un objeto User (modelo)
            $user = new User();
            $result = $user->registerUser($username, $password, $nombre);

            return $result;
        }
    }

    public function login() {
        // Datos del formulario de login
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'login') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Crear un objeto User (modelo)
            $user = new User();
            $loginStatus = $user->loginUser($username, $password);

            return $loginStatus;
        }
    }
}
?>
