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
    // Establecer la conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "mi_basedatos");

    // Subir un elemento a la tabla
    if(isset($_POST['submit'])) {
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];

        $query = "INSERT INTO tabla (titulo, contenido) VALUES ('$titulo', '$contenido')";
        mysqli_query($conexion, $query);
    }

    // Eliminar un elemento de la tabla
    if(isset($_GET['eliminar'])) {
        $id = $_GET['eliminar'];

        $query = "DELETE FROM tabla WHERE id=$id";
        mysqli_query($conexion, $query);
    }

    // Obtener los elementos de la tabla
    $query = "SELECT * FROM tabla";
    $result = mysqli_query($conexion, $query);
?>


        <h1>Panel de control</h1>

        <!-- Formulario para subir elementos -->
        <h2>Subir elemento</h2>
        <form method="post">
            <label>Título:</label><br>
            <input type="text" name="titulo"><br>
            <label>Contenido:</label><br>
            <textarea name="contenido"></textarea><br>
            <input type="submit" name="submit" value="Subir">
        </form>

        <!-- Tabla con los elementos -->
        <h2>Elementos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['titulo']; ?></td>
                        <td><?php echo $row['contenido']; ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                            <a href="?eliminar=<?php echo $row['id']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</body>
</html>