<?php
include 'data.php'; 

$resultado = $conexion->query("SELECT * FROM equipo");
if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        // Mostrar los datos
    }
} else {
    echo "No hay miembros en el equipo.";
}
