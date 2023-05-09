<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Establecer conexión a  base de datos
$conexion = mysqli_connect("localhost", "root", "", "mi_basedatos");

// Verificar si se ha enviado el formulario de edición
if (isset($_POST['editar'])) {
  // Obtener los datos del formulario
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $direccion = $_POST['direccion'];
  $descripcion = $_POST['descripcion'];
  $imagen = $_POST['imagen'];
  $precio = $_POST['precio'];

  // Actualizar los datos de la propiedad en la base de datos
  $query = "UPDATE propiedades SET nombre='$nombre', direccion='$direccion', descripcion='$descripcion', imagen='$imagen', precio='$precio' WHERE id='$id'";
  mysqli_query($conexion, $query);

  // Redirigir a la página principal
  header('Location: inmobiliaria.php');
}

// Obtener el ID de la propiedad para editar
$id = $_GET['id'];

// Consultar la propiedad en la base de datos
$query = "SELECT * FROM propiedades WHERE id='$id'";
$resultado = mysqli_query($conexion, $query);
$fila = mysqli_fetch_assoc($resultado);

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

<!-- Formulario de edición -->
<form method="post" action="">
  <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
  <label for="nombre">Nombre:</label>
  <input type="text" name="nombre" id="nombre" value="<?php echo $fila['nombre']; ?>"><br>
  <label for="direccion">Dirección:</label>
  <input type="text" name="direccion" id="direccion" value="<?php echo $fila['direccion']; ?>"><br>
  <label for="descripcion">Descripción:</label>
  <textarea name="descripcion" id="descripcion"><?php echo $fila['descripcion']; ?></textarea><br>
  <label for="imagen">Imagen:</label>
  <input type="text" name="imagen" id="imagen" value="<?php echo $fila['imagen']; ?>"><br>
  <label for="precio">Precio:</label>
  <input type="text" name="precio" id="precio" value="<?php echo $fila['precio']; ?>"><br>
  <input type="submit" name="editar" value="Editar">
</form>

</body>
</html>