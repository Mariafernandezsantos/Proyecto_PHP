<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'data.php'; 

    
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $apellido = filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_STRING);
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
            echo "<div class='mensaje-exito'>El archivo ha sido cargado con éxito.</div>";
            $url_foto = $rutaDestino;
        } else {
            echo "<div class='mensaje-error'>Hubo un error al subir el archivo.</div>";
        }

    $query= "INSERT INTO equipo(nombre, apellido, edad, nacionalidad, genero, url_foto) VALUES('$nombre','$apellido', $edad,'$nacionalidad', '$genero', '$url_foto')";
    $resultado= mysqli_query($conexion, $query);
}
}

?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Form</title>
    <link rel="stylesheet" href="styles.css?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="img/Las Variables.png">
    <script src="script.js"></script>
 </head>
    <body>
    <form action="index.php" class="mi-form"> <button type="submit" class="mi-boton">Ir a página principal</button> </form> 
    </body>
 </html>



