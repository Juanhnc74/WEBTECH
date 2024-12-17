<?php
// config/database.php
class Database {
    private static $conn = null;

    public static function getConnection() {
        if (self::$conn === null) {
            // Ajusta estos parámetros a los de tu base de datos
            self::$conn = new mysqli("localhost", "root", "", "webtech");
            if (self::$conn->connect_error) {
                die("Conexión fallida: " . self::$conn->connect_error);
            }
        }
        return self::$conn;
    }
}

?>
