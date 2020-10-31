<?php require_once("Components/Layout.php"); ?>

<body>
    <?php require_once("Components/Header.php"); ?>

    <main class="container text-center">

        <h2 class="text-center">Nuevo Estudiante</h2>

        <form action='?action=store' method="post">
            <input type="text" name="name" required>
            <input type="submit" value="Crear">
            <input type="reset" value="Reset">
        </form>
    </main>

</body>