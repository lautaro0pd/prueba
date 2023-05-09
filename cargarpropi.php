<!DOCTYPE html>
<html>
<head>
	<title>Cargar una propiedad</title>
</head>
<body>
	<h1>Cargar una propiedad</h1>
	<form method="post" enctype="multipart/form-data">
		<label for="imagen">Imagen:</label>
		<input type="file" id="imagen" name="imagen"><br><br>
		<label for="nombre">Nombre:</label>
		<input type="text" id="nombre" name="nombre"><br><br>
		<label for="direccion">Dirección:</label>
		<input type="text" id="direccion" name="direccion"><br><br>
		<label for="descripcion">Descripción:</label><br>
		<textarea id="descripcion" name="descripcion" rows="4" cols="50"></textarea><br><br>
		<label for="precio">Precio:</label>
		<input type="number" id="precio" name="precio"><br><br>
		<input type="submit" value="Cargar">
	</form>
	<?php
		// Verificar si se ha enviado el
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Conexión a la base de datos
            $conexion = mysqli_connect("localhost", "root", "", "mi_basedatos");
    
            // Obtener valores del formulario
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
    
            // Subir imagen al servidor y obtener su URL
            $imagen_nombre = $_FILES['imagen']['name'];
            $imagen_temporal = $_FILES['imagen']['tmp_name'];
            $imagen_url = "imagenes/" . $imagen_nombre;
            move_uploaded_file($imagen_temporal, $imagen_url);
    
            // Insertar nueva propiedad en la base de datos
            $insercion = "INSERT INTO propiedades (imagen, nombre, direccion, descripcion, precio) VALUES ('$imagen_url', '$nombre', '$direccion', '$descripcion', '$precio')";
            mysqli_query($conexion, $insercion);
    
            // Cerrar conexión a la base de datos
            mysqli_close($conexion);
    
            echo "<p>Propiedad cargada correctamente.</p>";
        }
    ?>
    
    </body>
</html>