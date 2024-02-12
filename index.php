<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Final PHP</title>
    <link rel="stylesheet" href="styles.css?v=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Guerrilla&display=swap" rel="stylesheet">

    <!-- Icono add -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


</head>

<body>
    <header>
        <img src="./img/Las Variables.png" alt="Logo del Equipo" id="team-logo">
        <h1>Las Variables</h1>
    </header>

    <section class="team-cards">
        <!-- Card equipo mirar como hacer -->
        <?php include 'data.php'; ?>

    </section>

    <footer>
        <button onclick="location.href='form_add.php'">Añadir Participante</button>
        <div class="icon">
            <!-- icono de add alumna, colocar en la card -->
            <!-- <span class="material-symbols-outlined"> 
            add_task
            </span> -->
        </div>
    </footer>
</body>

</html>