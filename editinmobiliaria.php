<!DOCTYPE html>
<html>
<head>
	<title>Todas las propiedades</title>
	<link rel="stylesheet" href="style.css">
	<script>
		// Obtener el elemento de usuario y el menú desplegable
		const usuario = document.querySelector('.usuario');
		const dropdown = document.querySelector('.dropdown-content');

		// Agregar un event listener para el evento de clic en el usuario
		usuario.addEventListener('click', function() {
			// Agregar la clase "active" al elemento de usuario
			usuario.classList.toggle('active');
		});
	</script>
</head>
<body>
<header>
		<div class="logo">
			<h1>Nombre de la página</h1>
		</div>
		<div class="usuario">
			<a href="#">Nombre del usuario</a>
			<div class="dropdown-content">
				<a href="#">Administrar</a>
				<a href="#">Cerrar sesión</a>
			</div>
		</div>
	</header>

	<h1>Todas las propiedades</h1>
	<?php
		// Conexión a la base de datos
		$conexion = mysqli_connect("localhost", "root", "", "mi_basedatos");

		// Consulta de propiedades existentes
		$consulta = "SELECT * FROM propiedades";
		$resultado = mysqli_query($conexion, $consulta);

		// Mostrar propiedades en forma de cartas
		while ($fila = mysqli_fetch_array($resultado)) {
			echo "<div class='propiedad'>";
			echo "<img src='" . $fila['imagen'] . "' alt='" . $fila['nombre'] . "'>";
			echo "<h2>" . $fila['nombre'] . "</h2>";
			echo "<p><strong>Dirección:</strong> " . $fila['direccion'] . "</p>";
			echo "<p><strong>Descripción:</strong> " . $fila['descripcion'] . "</p>";
			echo "<p><strong>Precio:</strong> $" . $fila['precio'] . "</p>";
			echo "</div>";
		}

		// Cerrar conexión a la base de datos
		mysqli_close($conexion);
	?>
		<?php include("cargarpropi.php"); ?>
		<?php include("editareliminar.php"); ?>

	</body>
</html>
