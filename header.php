<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="principal.css">
</head>
<body>
<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if(!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Obtener el nombre del usuario de la sesión
$nombre = $_SESSION['nombre'];

// Mostrar el encabezado con el mensaje de bienvenida y el botón de cierre de sesión
echo '<header>';
echo '<div class="bienvenida">Bienvenido, ' . $nombre . '</div>';
echo '<div class="cerrar-sesion"><a href="logout.php">Cerrar sesión</a></div>';
echo '</header>';
  ?>
</body>
</html>