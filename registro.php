<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "mi_basedatos");

// Procesar el formulario de registro
if(isset($_POST['registro'])){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Verificar si el correo electrónico ya está en uso
    if(isset($email)) {
        $query = "SELECT * FROM usuarios WHERE email='$email'";
        $result = mysqli_query($conexion, $query);

        if(mysqli_num_rows($result) > 0){
            echo "El correo electrónico ya está en uso.";
        } else {
            // Insertar los datos en la tabla "usuarios"
            $query = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
            mysqli_query($conexion, $query);

            // Redirigir al usuario a la página de inicio de sesión
            header("Location: login.php");
        }
    } else {
        echo "Por favor ingrese un correo electrónico válido.";
    }
}


?>

<!-- Formulario de registro -->
<form action="registro.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>

    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>

    <input type="submit" name="registro" value="Registrarse">
        <a href="login.php" class="boton">I.S ></a>
</form>

</body>
</html>