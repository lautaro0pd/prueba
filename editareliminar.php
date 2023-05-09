<!DOCTYPE html>
<html>
<head>
	<title>Propiedades cargadas</title>
</head>
<body>
	<h1>Propiedades cargadas</h1>
	<table>
		<tr>
			<th>Imagen</th>
			<th>Nombre</th>
			<th>Dirección</th>
			<th>Descripción</th>
			<th>Precio</th>
			<th>Opciones</th>
		</tr>
		<?php
			// Conexión a la base de datos
			$conexion = mysqli_connect("localhost", "root", "", "mi_basedatos");

			// Consulta de propiedades existentes
			$consulta = "SELECT * FROM propiedades";
			$resultado = mysqli_query($conexion, $consulta);

			// Mostrar propiedades con opciones de eliminar y editar
			while ($fila = mysqli_fetch_array($resultado)) {
				echo "<tr>";
				echo "<td><img src='" . $fila['imagen'] . "' alt='" . $fila['nombre'] . "'></td>";
				echo "<td>" . $fila['nombre'] . "</td>";
				echo "<td>" . $fila['direccion'] . "</td>";
				echo "<td>" . $fila['descripcion'] . "</td>";
				echo "<td>$" . $fila['precio'] . "</td>";
				echo "<td><a href='eliminar.php?id=" . $fila['id'] . "'>Eliminar</a> | <a href='editar.php?id=" . $fila['id'] . "'>Editar</a></td>";
				echo "</tr>";
			}

			// Cerrar conexión a la base de datos
			mysqli_close($conexion);
		?>
	</table>

</body>
</html>
