<?php
$conexion = new mysqli("localhost", "root", "", "proyecto_final");
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}
