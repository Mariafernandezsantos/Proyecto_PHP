<?php

// Asegúrate de que se llama al script mediante un método POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario.
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $nacionalidad = $_POST['nacionalidad'];
    $genero = $_POST['genero'];
    $url_foto = $_POST['url_foto'];

    // Aquí deberías agregar tu lógica para procesar y almacenar estos datos, por ejemplo:
    // 1. Validar los datos recibidos.
    // 2. Conectar a la base de datos.
    // 3. Insertar los datos en la base de datos.

    // Ejemplo de conexión a la base de datos y ejecución de la consulta SQL.
    $conexion = new mysqli("localhost", "usuario", "contraseña", "nombre_base_de_datos");
    if ($conexion->connect_error) {
        die("Fallo en la conexión: " . $conexion->connect_error);
    }

    // Prepara la consulta para prevenir inyecciones SQL.
    $stmt = $conexion->prepare("INSERT INTO miembros (nombre, apellidos, edad, nacionalidad, genero, url_foto) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $nombre, $apellidos, $edad, $nacionalidad, $genero, $url_foto);

    // Ejecuta la consulta y verifica si fue exitosa.
    if ($stmt->execute()) {
        echo "Nuevo miembro añadido exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cierra la sentencia y la conexión.
    $stmt->close();
    $conexion->close();
} else {
    echo "Método no permitido.";
}

?>