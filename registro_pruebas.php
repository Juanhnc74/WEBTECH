<?php
// Datos de conexión a la base de datos
$host = "localhost";
$user = "root"; // Cambia si tienes un usuario distinto
$pass = ""; // Cambia si tienes contraseña para MySQL
$db = "webtech"; // Nombre de tu base de datos

// Conectar a la base de datos
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Datos del usuario a registrar
$username = "admin"; // Cambia por el nombre de usuario que desees
$password = "12345"; // Contraseña del usuario
$nombre = "Administrador del Sistema"; // Nombre completo

// Encriptar la contraseña
$password_hashed = password_hash($password, PASSWORD_DEFAULT);

// Consulta SQL para insertar el usuario
$sql = "INSERT INTO usuarios (username, password, nombre) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $password_hashed, $nombre);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Usuario registrado exitosamente";
} else {
    echo "Error al registrar usuario: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
