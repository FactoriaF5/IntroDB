<?php require_once("Components/Layout.php"); ?>

<body>
    <?php require_once("Components/Header.php"); ?>

    <main class="container text-center">

        <h2 class="text-center">Nuevo Estudiante</h2>

        <form action='?action=update&id=<?php echo $data["student"]->getId() ?>' method="post">
            <input type="text" name="name" required value='<?php echo $data["student"]->getName() ?>'>
            <input type="submit" value="Edit">
            <input type="reset" value="Reset">
        </form>
    </main>

</body>