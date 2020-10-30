<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Lista de estudiantes</title>
</head>

<body>
    <h1 class="jumbotron">Lista de Estudiantes</h1>
    <main class="container">
        <ul>
            <?php
            foreach ($data["students"] as $student) {
                echo "<li> {$student->getId()} - {$student->getName()} - {$student->getCreatedAt()} - delete </li>";
            }
            ?>
        </ul>
        <a href='?action=create'>NUEVO</a>
    </main>
</body>

</html>