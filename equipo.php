<?php
include 'data.php';

$sql = "SELECT * FROM equipo";

$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    foreach($resultado as $fila) {
        echo '<div class="card">';
        echo '<img src="' . $fila["url_foto"]. '" alt="Foto de ' . $fila["Nombre"] . ' ' . $fila["Apellido"] . '">';
        echo '<div class="container">';
        echo '<h4><b>' . htmlspecialchars($fila["Nombre"]) . ' ' . htmlspecialchars($fila["Apellido"]) . '</b></h4>';
        echo '<p>' . htmlspecialchars($fila["Edad"]) . ' años - ' . htmlspecialchars($fila["Nacionalidad"]) . '</p>';
        echo '<p>' . htmlspecialchars($fila["Genero"]) . '</p>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No se encontraron miembros del equipo.";
}

$conexion->close();
 ?>