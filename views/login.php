<?php
session_start();
require_once '../models/User.php';
require_once '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Crear un objeto User (modelo)
    $user = new User();
    $loginStatus = $user->loginUser($username, $password);

    if ($loginStatus === "Inicio de sesión exitoso.") {
        // Si el login es exitoso, iniciar sesión y redirigir
        $_SESSION['username'] = $username;
        $_SESSION['nombre'] = $user->getNombre($username); // Recuperar el nombre del usuario
        header("Location: admin_panel.php");
        exit();
    } else {
        // Si hay un error en el login, mostrar el mensaje de error
        $message = $loginStatus;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="../css/plugins.css" rel="stylesheet" type="text/css" >
    <link href="../css/swiper.css" rel="stylesheet" type="text/css" >
    <link href="../css/style.css" rel="stylesheet" type="text/css" >
    <link href="../css/coloring.css" rel="stylesheet" type="text/css" >
    <!-- color scheme -->
    <link id="colors" href="../css/colors/scheme-01.css" rel="stylesheet" type="text/css" >

</head>
<body>
    

    <?php
    // Mostrar el mensaje de error si no pudo iniciar sesión
    if (isset($message)) {
        echo "<p>$message</p>";
    }
    ?>

<section>
                <div class="container">
                    <div class="row g-4 justify-content-center">
                        <div class="col-lg-8">
                            <div class="p-4 bg-white rounded-10px">
                                
                                <form action="../controllers/login_handler.php" id="contact_form" class="position-relative z1000" method="post" action="#">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h5>Iniciar sesión</h5>
                                            <div class="relative">
                                            <label for="username">Nombre de usuario:</label>
                                            <input type="text" id="username" name="username" required><br><br>

                                            <label for="password">Contraseña:</label>
                                            <input type="password" id="password" name="password" required><br><br>

                                            <button type="submit">Iniciar sesión</button>
                                        </form>
                                                <i class="absolute top-0 end-0 id-color pt-3 pe-3 icofont-simple-down"></i>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
    
                    </div>
                </div>
            </section>




</body>
</html>
