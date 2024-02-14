<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Final PHP</title>
    <link rel="stylesheet" href="styles.css?v=2">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" sizes="32x32" href="img/Las Variables.png">
    
</head>

<body>
    <header>
        <img src="./img/Las_Variables1.png" alt="Logo del Equipo" id="team-logo">
        <h1>Las Variables</h1>
    </header>

    <section class="team-cards">
        <?php include 'equipo.php'; ?>
    </section>

    <div class= "add">
        <button onclick="location.href='form_add.php'">Añadir Participante</button>
    </div>
    <footer>
        
    </footer>
</body>

</html>