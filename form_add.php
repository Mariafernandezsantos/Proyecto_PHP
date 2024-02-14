<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="styles.css?v=1">
    <script src="script.js"></script>
    <link rel="icon" type="image/png" sizes="32x32" href="img/Las Variables.png">
</head>
<body>
    <form action="process_form.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellidos" name="apellidos" required>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required>

        <label for="nacionalidad">Nacionalidad:</label>
        <input type="text" id="nacionalidad" name="nacionalidad" required>

        <label for="genero">Género:</label>
        <select id="genero" name="genero">
            <option value="Femenino">Femenino</option>
            <option value="Masculino">Masculino</option>
            <option value="Otro">Otro</option>
        </select>

        <label for="foto">Foto:</label>
        <div class="custom-file-upload">
            <input type="file" id="foto" name="foto" accept="image/*" style="display: none;"
                onchange="document.getElementById('file-name').textContent = this.files[0].name">
            <button type="button" onclick="document.getElementById('foto').click()">Seleccionar Archivo</button>
            <span id="file-name">Ningún archivo seleccionado</span>
        </div>

        <input type="submit" value="Añadir">
    </form>
</body>

</html>