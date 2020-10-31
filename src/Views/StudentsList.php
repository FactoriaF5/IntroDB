<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="public/styles/styles.css">
    <title>Lista de estudiantes</title>
</head>

<body>
    <h1 class="jumbotron text-center">Student Manager</h1>
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
                            <i class='lnr lnr-pencil'></i>
                            <i class='lnr lnr-trash'></i>
                        </td>
                    </tr>
                    ";
                } ?>

            </tbody>
        </table>


    </main>
</body>

</html>