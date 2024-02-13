<?php
$conexion = new mysqli("localhost", "root", "", "proyecto final");
$id = $_POST['Id'] ?? 0;
$nombre = $_POST['Nombre'] ?? '';
$apellido = $_POST['Apellido'] ?? '';
$edad = $_POST['Edad'] ?? '';
$nacionalidad = $_POST['Nacionalidad'] ?? '';
$genero = $_POST['Genero'] ?? '';
// echo "Id: $id, Nombre: $nombre, Apellido: $apellido, Edad: $edad, Nacionalidad: $nacionalidad, Genero: $genero";

if ($id > 0 && !empty($nombre) && !empty($nacionalidad)) {
    $conexion = new mysqli("localhost", "root", "", "proyecto final");
    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }

    $sql = "UPDATE equipo SET Nombre='$nombre', Nacionalidad='$nacionalidad' WHERE Id=$id";

    if ($conexion->query($sql) === TRUE) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error updating record: " . $conexion->error;
    }

    $conexion->close();
} else {
    echo "No se proporcionaron los datos necesarios para actualizar el registro.";
}
?>