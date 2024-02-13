<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'data.php'; //conecta con bbdd

    
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
    $edad = filter_input(INPUT_POST, 'edad', FILTER_VALIDATE_INT);
    $nacionalidad = filter_input(INPUT_POST, 'nacionalidad', FILTER_SANITIZE_STRING);
    $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
    $url_foto = ""; 
    $id = ""; 

    
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
        }
    }

    $query= "INSERT INTO equipo(nombre, apellido, edad, nacionalidad, genero, url_foto) VALUES('$nombre','$apellido', $edad,'$nacionalidad', '$genero', '$url_foto')";
    $resultado= mysqli_query($conexion, $query);
}





