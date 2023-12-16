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
        <div class="col-12">
            <div class="row">
                <h1 class="text-center">
                    Formulario de datos personales
                </h1>
            </div>
            <form action="resultado.php" method="post">
                <div class="row my-3">
                    <label for="">Nombre:*</label>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" required>
                </div>
                <div class="row my-3">
                    <label for="">Documento:*</label>
                    <input type="text" name="txtDocumento" id="txtDocumento" class="form-control" required>
                </div>
                <div class="row my-3">
                    <label for="">Teléfono:*</label>
                    <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" required>
                </div>
                <div class="row my-3">
                    <label for="">Edad:*</label>
                    <input type="text" name="txtEdad" id="txtEdad" class="form-control" required>
                </div>
                <div>
                    <input type="submit" value="Enviar" class="btn btn-primary px-3 float-end">
            </form>
            <a href="resultado.php">Revisar</a>
        </div>
        </div>
    </main>
</body>

</html>