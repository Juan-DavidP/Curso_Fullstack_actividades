<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Si existe el archivo.txt 
if (file_exists("archivo.txt")) {
    //Leer todos el contenido y almacenarlo en $strJson
    $strJson = file_get_contents("archivo.txt");

    //Decodificar la variable $strJson y que se almacene en el array $aClientes
    $aClientes = json_decode($strJson, true);
} else {
    //Sino
    //Crear el array $aClientes vacio
    curl_file_create("achivo.txt");
    $aClientes[] = array();
}
if ($_POST) {
    $documento = $_POST["txtDocumento"];
    $nombre = $_POST["txtNombre"];
    $telefono = $_POST["txtTelefono"];
    $correo = $_POST["txtCorreo"];

    if (isset($_GET["editar"]) && $_GET["editar"] >= 0) {
        //editar 
        $pos = $_GET["editar"];

        if ($_FILES["iFile"]["error"] === UPLOAD_ERR_OK) {
            $nombreAleatorio = date("Ymdhmsi") . rand(1000, 2000);
            $archivo_tmp = $_FILES["iFile"]["tmp_name"];
            $extension = strtolower(pathinfo($_FILES["iFile"]["name"], PATHINFO_EXTENSION));
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                $nombreImagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "img/$nombreImagen");
                //Eliminar la imagen anterior
                unlink("img/" . $aClientes[$pos]["imagen"]);
            }
        } else {
            //si no se sube una imagen tomamos el nombre de la imagen actual
            $nombreImagen = $aClientes[$pos]["imagen"];
        }
        //editar un cliente existente
        $aClientes[$pos] = array(
            "imagen" => $nombreImagen,
            "documento" => $documento,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
        );
        header("Location: index.php");
    } else {
        //si no es un cliente existente
        if ($_FILES["iFile"]["error"] === UPLOAD_ERR_OK) {
            $nombreAleatorio = date("Ymdhmsi") . rand(1000, 2000);
            $archivo_tmp = $_FILES["iFile"]["tmp_name"];
            $extension = strtolower(pathinfo($_FILES["iFile"]["name"], PATHINFO_EXTENSION));
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                $nombreImagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "img/$nombreImagen");
            }
        }
        //inserto un nuevo cliente
        $aClientes[] = array(
            "imagen" => $nombreImagen,
            "documento" => $documento,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
        );
    }


    //convertir el array en un objeto tipo JSON
    $strJson = json_encode($aClientes, true);

    //Almacenar el JSON en archivo.txt
    file_put_contents("archivo.txt", $strJson);
}
if (isset($_GET["eliminar"]) && $_GET["eliminar"] >= 0) { //Se mira que la posición tomada sea valida
    //se almacena dicha posicion en una variable
    $pos = $_GET["eliminar"];

    //elimina la posicion marcada
    unset($aClientes[$pos]);

    //Convertir el array de clientes en json
    $strJson = json_encode($aClientes);

    //Almacenar el json en el archivo.txt
    file_put_contents("archivo.txt", $strJson);
    //redirecciono a la pantalla principal
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/fontawesome/css/all.min.css">
    <title>abm clientes</title>
</head>

<body>
    <main class="container">
        <div class="col-12">
            <h1 class="text-center py-5">Registro clientes</h1>
        </div>
        <div class="row">

            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="txtDocumento">Documento: *</label>
                    <input type="text" name="txtDocumento" id="txtDocumento" class="form-control" value="<?php echo isset($_GET["editar"]) && $_GET["editar"] >= 0 ? $aClientes[$_GET["editar"]]["documento"] : ""; ?>" required>
                    <label for="txtNombre">Nombre: *</label>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" value="<?php echo isset($_GET["editar"]) && $_GET["editar"] >= 0 ? $aClientes[$_GET["editar"]]["nombre"] : ""; ?>" required>
                    <label for=" txttelefono">Teléfono: *</label>
                    <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="<?php echo isset($_GET["editar"]) && $_GET["editar"] >= 0 ? $aClientes[$_GET["editar"]]["telefono"] : ""; ?>" required>
                    <label for=" txtcorreo">Correo: *</label>
                    <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" value="<?php echo isset($_GET["editar"]) && $_GET["editar"] >= 0 ? $aClientes[$_GET["editar"]]["correo"] : ""; ?>" required>
                    <input type="file" name="iFile" id="iFile" accept=".jpg .jpge .png">
                    <strong class="d-block">archivos admitidos: .jpg, .jpge, .png</strong>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="submit" class="btn btn-danger">Editar</button>
                </form>
            </div>
            <div class="col-6">
                <table class="table border">
                    <thead>
                        <th>Imagen</th>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>correo</th>
                        <th>Telefono</th>
                        <th colspan="2">Acciones</th>
                    </thead>
                    <tbody>
                        <?php foreach ($aClientes as $pos => $cliente) : ?>
                            <tr>
                                <td><img width="50px" height="50px" src="img/<?php echo $cliente["imagen"]; ?>"></td>
                                <td><?php echo $cliente["documento"]; ?></td>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["correo"]; ?></td>
                                <td><?php echo $cliente["telefono"]; ?></td>
                                <td><a href="?editar=<?php echo $pos; ?>" class="fa-regular fa-pen-to-square" style="color: #2e4fd1;"></a></td>
                                <td><a href="?eliminar=<?php echo $pos; ?>" class="fa-solid fa-trash-can" style="color: #FF0000;"></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>