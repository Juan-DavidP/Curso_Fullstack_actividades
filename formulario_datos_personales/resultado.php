<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST) {
    $nombre = $_POST["txtNombre"];
    $documento = $_POST["txtDocumento"];
    $telefono = $_POST["txtTelefono"];
    $edad = $_POST["txtEdad"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css">
    <title>Formulario</title>
</head>

<body>
    <main class="cotainer">
        <div class="col-12">
            <div class="row">
                <h1 class="text-center">Resultado del formulario</h1>
            </div>
            <div class="container">
                <table class="table">
                    <thead>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Teléfono</th>
                        <th>Edad</th>
                    </thead>
                    <tbody>
                        <?php foreach ($_POST as $Value) : ?>
                            <td>
                                <?php echo $Value; ?>
                            </td>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

</html>