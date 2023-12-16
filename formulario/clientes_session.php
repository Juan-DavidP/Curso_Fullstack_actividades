<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_SESSION["listadoClientes"])) {
    $aClientes = $_SESSION["listadoClientes"];
} else {
    $aClientes = array();
}

if ($_POST) {
    $nombre = $_REQUEST["txtNombre"];
    $documento = $_REQUEST["txtDocumento"];
    $telefono = $_REQUEST["txtTelefono"];
    $edad = $_REQUEST["txtEdad"];

    $aClientes[] = array(
        "nombre" => $nombre,
        "documento" => $documento,
        "telefono" => $telefono,
        "edad" => $edad
    );

    $_SESSION["listadoClientes"] = $aClientes;
}

if(isset($_GET["eliminar"]) && $_GET["eliminar"] >= 0){
    $pos = $_GET["eliminar"];
    unset($aClientes[$pos]); /* Elimino el array indicado */
    $_SESSION["listadoClientes"] = $aClientes; /* Actualizo la variable */
     //header("Location: clientes_session.php"); /* Me redirijo a la pagina actualizada */
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css">
    <title>Formulario</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <h1 class="text-center py-5">Tabla de clientes</h1>
        </div>
        <div class="row">
            <div class="col-4">
                <form action="" method="post">


                    <label for="txtNombre">Nombre:</label>
                    <input type="text" name="txtNombre" id="txtNombre" placeholder="Ingrese el nombre y apellido" class="form-control my-2" required>
                    <label for="txtDocumento">Documento:</label>
                    <input type="text" name="txtDocumento" id="txtDocumento" class="form-control my-2" placeholder="1111111" required>
                    <label for="txtTelefono">Teléfono:</label>
                    <input type="text" name="txtTelefono" id="txtTelefono" class="form-control my-2" placeholder="5555555" required>
                    <label for="txtEdad">Edad:</label>
                    <input type="text" name="txtEdad" id="txtEdad" class="form-control my-2" placeholder="18" required>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="col-2"></div>
            <div class="col-6">
                <table class="table border">
                    <thead>
                        <tr>
                            <th>Nombre:</th>
                            <th>Documento:</th>
                            <th>Teléfono:</th>
                            <th>Edad:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aClientes as $pos => $cliente) : ?>
                            <tr>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["documento"]; ?></td>
                                <td><?php echo $cliente["telefono"]; ?></td>
                                <td><?php echo $cliente["edad"]; ?></td>
                                <td> <a href="?eliminar=<?php echo $pos; ?>" class="btn btn-danger">Eliminar</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>