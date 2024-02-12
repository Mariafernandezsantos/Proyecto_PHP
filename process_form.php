<?php
// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'data.php'; // Asegura una conexión a la base de datos

    // Recoge y filtra los datos del formulario
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
    $edad = filter_input(INPUT_POST, 'edad', FILTER_VALIDATE_INT);
    $nacionalidad = filter_input(INPUT_POST, 'nacionalidad', FILTER_SANITIZE_STRING);
    $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
    $url_foto = ""; // Inicializa como vacío

    // Procesa la subida del archivo, si existe
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $archivo = $_FILES['foto'];
        $nombreArchivo = $archivo['name'];
        $tmpNombre = $archivo['tmp_name'];
        $directorioDestino = "uploads/";
        $rutaDestino = $directorioDestino . basename($nombreArchivo);

        if (move_uploaded_file($tmpNombre, $rutaDestino)) {
            echo "El archivo ha sido cargado con éxito.";
            $url_foto = $rutaDestino; // Almacena la ruta del archivo
        } else {
            echo "Hubo un error al subir el archivo.";
        }
    }

    // Prepara e inserta los datos en la base de datos
    if ($stmt = $conexion->prepare("INSERT INTO equipo (nombre, apellidos, edad, nacionalidad, genero, url_foto) VALUES (?, ?, ?, ?, ?, ?)")) {
        $stmt->bind_param("ssisss", $nombre, $apellidos, $edad, $nacionalidad, $genero, $url_foto);

        if ($stmt->execute()) {
            echo "Nuevo miembro añadido exitosamente.";
        } else {
            echo "Error al insertar los datos: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error al preparar la inserción: " . $conexion->error;
    }

    $conexion->close();
}





