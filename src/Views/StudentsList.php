<?php require_once("Components/Layout.php"); ?>

<body>

    <?php require_once("Components/Header.php") ?>
    <main class="container">
        <a href="?action=create">
            <button class="btn btn-primary btn-circle btn-lg">
                <i class="fas fa-plus"></i>
            </button>
        </a>
        <table class="table table-light">

            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Options</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($data["students"] as $student) {
                    echo "
                    <tr>
                        <td>{$student->getId()}</td>
                        <td>{$student->getName()}</td>
                        <td>{$student->getCreatedAt()}</td>
                        <td>               
                        <a href='?action=edit&id={$student->getId()}'><i class='lnr lnr-pencil'></i></a>
                            <a href='?action=delete&id={$student->getId()}'><i class='lnr lnr-trash'></i></a>
                        </td>
                    </tr>
                    ";
                } ?>

            </tbody>
        </table>
    </main>
</body>

</html>