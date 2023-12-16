<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST) {
    $usuario = $_POST["txtUsuario"];
    $password = $_POST["txtPass"];

    if ($usuario && $password != "") {
        header("location: acceso_confirmado.php");
    } else {
        $mensaje = "Datos invalidos";
    }
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
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-3">
                <h1>Login</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="" method="POST">
                    <div class="py-2">
                        <label for="">Usuario:</label>
                        <input type="text" name="txtUsuario" id="txtUsuario" class="form-control">
                    </div>
                    <div class="py-2">
                        <label for="">Contraseña:</label>
                        <input type="password" name="txtPass" id="txtPass" class="form-control">
                    </div>
                    <div class="py-2">
                        <button type="submit" name="btnIngresar" id="btnIngresar" class="btn btn-primary">
                            Ingresar</button>
                    </div>
                    <?php
                    if (isset($mensaje)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje; ?>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </main>


</body>

</html>