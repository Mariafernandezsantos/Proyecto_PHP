<?php
require('connect.php');

function actualizarRegistro() {
    global $conexion;

    $id = filter_input(INPUT_POST, 'Id', FILTER_SANITIZE_NUMBER_INT) ?? 0;

    // Obtén los valores actuales de la base de datos
    $result = $conexion->query("SELECT * FROM equipo WHERE Id=$id");
    $fila = $result->fetch_assoc();

    $nombre = isset($fila['Nombre']) ? $fila['Nombre'] : '';
    $apellido = isset($fila['Apellido']) ? $fila['Apellido'] : '';
    $edad = isset($fila['Edad']) ? $fila['Edad'] : 0;
    $nacionalidad = isset($fila['Nacionalidad']) ? $fila['Nacionalidad'] : '';
    $genero = isset($fila['Genero']) ? $fila['Genero'] : '';

    if ($id > 0) {
        if ($conexion->connect_error) {
            die("Connection failed: " . $conexion->connect_error);
        }

        // Actualiza solo los campos que tengan nuevos valores
        $set_clause = '';
        if (!empty($nombre)) {
            $set_clause .= "Nombre=?, ";
        } else {
            $set_clause .= "Nombre=Nombre, "; // Valor predeterminado
        }
        if (!empty($apellido)) {
            $set_clause .= "Apellido=?, ";
        } else {
            $set_clause .= "Apellido=Apellido, "; // Valor predeterminado
        }
        if (!empty($edad)) {
            $set_clause .= "Edad=?, ";
        } else {
            $set_clause .= "Edad=Edad, "; // Valor predeterminado
        }
        if (!empty($nacionalidad)) {
            $set_clause .= "Nacionalidad=?, ";
        } else {
            $set_clause .= "Nacionalidad=Nacionalidad, "; // Valor predeterminado
        }
        if (!empty($genero)) {
            $set_clause .= "Genero=?, ";
        } else {
            $set_clause .= "Genero=Genero, "; // Valor predeterminado
        }
        // Elimina la última coma y espacio
        $set_clause = rtrim($set_clause, ', ');

        // Prepara la consulta SQL
        $stmt = $conexion->prepare("UPDATE equipo SET $set_clause WHERE Id=?");

        // Agrega los valores a bind_param en el mismo orden en que aparecen en la consulta SQL
        $params = array_merge(array_slice(func_get_args(), 6), [$id]);
        $stmt->bind_param(str_repeat("s", count($params) - 1) . "i", ...$params);

        if ($stmt->execute() === TRUE) {
            echo "Registro actualizado correctamente";
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "No se proporcionó un ID válido.";
    }
}

// Llama a la función actualizarRegistro
actualizarRegistro();