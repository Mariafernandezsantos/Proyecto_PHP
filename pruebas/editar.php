<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link rel="stylesheet" href="styles.css?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="img/Las Variables.png">
    
</head>
</html>

<?php
$conexion = new mysqli("localhost", "root", "", "proyecto final");
$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM equipo WHERE Id = $id";
$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    ?>
<form action="process_edit.php" method="post">
    <input type="hidden" name="Id" value="<?php echo $row['Id']; ?>">
    <label for="Nombre">Nombre:</label>
        <input type="text" name="Nombre" value="<?php echo htmlspecialchars($fila['Nombre']); ?>" htmlspecialchars para prevenir ataques de inyección de código.
        <input type="text" name="Apellido" value="<?php echo htmlspecialchars($fila['Apellido']); ?>">
        <input type="number" name="Edad" value="<?php echo htmlspecialchars($fila['Edad']); ?>">
        <input type="text" name="Genero" value="<?php echo htmlspecialchars($fila['Genero']); ?>">
        <input type="text" name="Nacionalidad" value="<?php echo htmlspecialchars($fila['Nacionalidad']); ?>">
        <label for="foto">Foto:</label>
        <div class="custom-file-upload">
            <input type="file" id="foto" name="foto" accept="image/*" style="display: none;"
                onchange="document.getElementById('file-name').textContent = this.files[0].name">
            <button type="button" onclick="document.getElementById('foto').click()">Seleccionar Archivo</button>
            <span id="file-name">Ningún archivo seleccionado</span>
        </div>
        
        <input type="submit" value="Guardar Cambios">
    </form>

    <?php
} else {
    echo "No se encontró el registro.";
}


$conexion->close();
?>
