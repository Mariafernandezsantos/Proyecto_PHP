<?php
include 'data.php';

if ($conexion) {
    $sql = "SELECT * FROM equipo";
    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        foreach($resultado as $fila) {
            if (isset($fila["Id"])) {
                echo '<div class="card">';
                echo '<img src="' . $fila["url_foto"]. '" alt="Foto de ' . $fila["Nombre"] . ' ' . $fila["Apellido"] . '">';
                echo '<div class="container">';
                echo '<h4><b>' . htmlspecialchars($fila["Nombre"]) . ' ' . htmlspecialchars($fila["Apellido"]) . '</b></h4>';
                echo '<p>' . htmlspecialchars($fila["Edad"]) . ' años - ' . htmlspecialchars($fila["Nacionalidad"]) . '</p>';
                echo '<p>' . htmlspecialchars($fila["Genero"]) . '</p>';
                echo '<form action="editar.php" method="get">';
                echo '<input type="hidden" name="id" value="' . $fila["Id"] . '">';
                // echo '<button type="submit">Editar</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
        }
    } else {
        echo "No se encontraron miembros del equipo.";
    }

    $conexion->close();
} else {
    echo "No se pudo conectar a la base de datos.";
}
?>


<!--¨La función htmlspecialchars para escapar los caracteres especiales en los valores de las columnas Nombre, Apellido, Edad, Nacionalidad y Género, lo que ayuda a prevenir ataques de inyección de código HTML o JavaScript malintencionados. -->

<!-- Verifica si la conexión a la base de datos se ha establecido correctamente.
Si la conexión se ha establecido bien, hace las acciones:
Crear una consulta SQL para seleccionar todos los registros de la tabla 'equipo'.
Ejecuta la consulta y almacena el resultado en la variable $resultado.
Verifica si el resultado de la consulta contiene registros y tiene más de 0 filas.
Si el resultado contiene registros, recorre cada fila y crea una tarjeta HTML (card) para cada miembro del equipo. La tarjeta incluye la foto, nombre, apellido, edad, nacionalidad, género y un botón de editar.
Si el resultado no contiene registros, muestra el mensaje "No se encontraron miembros del equipo.". -->
