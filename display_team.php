<?php
include 'data.php'; 
// Incluye el archivo 'data.php', que contiene la información de conexión a la base de datos.

$resultado = $conexion->query("SELECT * FROM equipo"); 
// Ejecuta una consulta SQL para obtener todos los registros de la tabla 'equipo'.
if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
    }
} else {
    echo "No hay miembros en el equipo.";
}
// Verifica si hay registros en el resultado de la consulta.
// Si hay registros, los recorre en un bucle while y los almacena en la variable $row.
// Si no hay registros, muestra el mensaje "No hay miembros en el equipo.".