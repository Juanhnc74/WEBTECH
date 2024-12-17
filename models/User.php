<?php
// models/User.php

class User {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    // Método para verificar login
    public function login($username, $password) {
        $query = "SELECT * FROM usuarios WHERE username = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            // Verificar si la contraseña es correcta
            if (password_verify($password, $user['password'])) {
                return true;
            }
        }
        return false;
    }
     // Método para obtener el nombre de usuario
     public function getUserName($username) {
        $query = "SELECT nombre FROM usuarios WHERE username = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            return $user['nombre'];  // Retorna el nombre del usuario
        }
        return null;
}

}
?>
