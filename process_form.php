<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'data.php';

    // Formulario.
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $nacionalidad = $_POST['nacionalidad'];
    $genero = $_POST['genero'];

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $archivo = $_FILES['foto'];
        $nombreArchivo = $archivo['name'];
        $tmpNombre = $archivo['tmp_name'];
        $directorioDestino = "uploads/";
        $rutaDestino = $directorioDestino . basename($nombreArchivo);

        if (move_uploaded_file($tmpNombre, $rutaDestino)) {
            echo "El archivo ha sido cargado con éxito.";
            $url_foto = $rutaDestino;
        } else {
            echo "Hubo un error al subir el archivo.";
            $url_foto = "";
        }
    } else {
        echo "No se ha seleccionado ningún archivo o hay un error.";
        $url_foto = "";
    }

    // Insertar datos en la base de datos
    // (Código para insertar los datos aquí, usando la conexión de `data.php`)
}

$stmt = $conexion->prepare("INSERT INTO equipo (nombre, apellidos, edad, nacionalidad, genero, url_foto) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $nombre, $apellidos, $edad, $nacionalidad, $genero, $url_foto);

if ($stmt->execute()) {
    echo "Nuevo miembro añadido exitosamente.";

} else {
    echo "Error al insertar los datos: " . $stmt->error;
}

$stmt->close();



