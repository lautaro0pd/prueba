<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "mi_basedatos");

// Procesar el formulario de login
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Buscar al usuario en la tabla "usuarios"
    $query = "SELECT * FROM usuarios WHERE email='$email'";
    $result = mysqli_query($conexion, $query);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);

        // Verificar si la contraseña coincide
        if(password_verify($password, $row['password'])){
            // Iniciar sesión
            session_start();
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['email'] = $row['email'];

            // Redirigir al usuario a la página de inicio
            header("Location: inicio.php");
        }
        else{
            echo "<p class='error'>La contraseña es incorrecta</p>";
        }
    }
    else{
        echo "<p class='error'>El correo electrónico no existe</p>";
    }
}
?>

<!-- Formulario de login -->
<form action="login.php" method="post">
    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>

    <input type="submit" name="login" value="Iniciar sesión">
     <a href="registro.php" class="boton"><</a>
</form>

</body>
</html>