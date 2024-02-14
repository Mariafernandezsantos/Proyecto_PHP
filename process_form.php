<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'data.php'; 

    $nombre = filter_input(INPUT_POST, 'nombre' );
    $apellido = filter_input(INPUT_POST, 'apellido');
    $edad = filter_input(INPUT_POST, 'edad');
    $nacionalidad = filter_input(INPUT_POST, 'nacionalidad');
    $genero = filter_input(INPUT_POST, 'genero');
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

        if (!$resultado) {
            echo "<div class='mensaje-error'>Error en la consulta SQL: " . mysqli_error($conexion) . "</div>";
        } else {
            echo "<div class='mensaje-exito'>Datos insertados correctamente.</div>";
        }
    }
}

// Verifica si el método de la solicitud HTTP es POST.
// Incluye el archivo 'data.php' que contiene la conexión a la base de datos.
// Obtiene los valores de los campos del formulario utilizando la función filter_input.
// Verifica si se ha enviado un archivo a través del campo 'foto' del formulario.
// Si se ha enviado un archivo, se verifica si hay algún error en la subida del archivo.
// Si no hay errores, se mueve el archivo a la carpeta 'uploads/' y se guarda la ruta del archivo en la variable $url_foto.
// Se crea una consulta SQL para insertar los datos en la tabla 'equipo' de la base de datos.
// Se ejecuta la consulta SQL y se guarda el resultado en la variable $resultado.
// Se verifica si la consulta SQL se ejecutó correctamente utilizando la función empty. Si la consulta no se ejecutó correctamente, se muestra el mensaje de error obtenido con la función mysqli_error.


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


<!-- Boton de vuelta a la home -->
