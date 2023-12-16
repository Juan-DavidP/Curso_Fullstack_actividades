<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST) {
    $iva = $_POST["iva"];
    $precioSinIva = $_POST["txtPrecioSinIVa"];
    $precioConIva = $_POST["txtPrecioConIva"];
    echo $iva;
    echo $precioSinIva;
    echo $precioConIva;
}

function calcularIva($iva, $precioSinIva, $precioConIva)
{
    $valorIva = $iva / 100;
    if ($precioSinIva != " ") {
        $cantidadIva = $precioSinIva * 1 * $valorIva;
        $resultado = $precioSinIva + $cantidadIva;
    }
    return $resultado;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css">
    <title>Calculadora IVA</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <h1 class="text-center my-5">Calculadora de IVA</h1>
        </div>
        <div class="row">
            <div class="col-4">
                <form action="" method="post">
                    <label for="iva">IVA</label><br>
                    <select name="iva" id="iva" class="form-control">
                        <option value="10.5">10.5%</option>
                        <option value="19">19%</option>
                        <option value="21">21%</option>
                        <option value="27">27%</option>
                    </select>
                    <label for="txtPrecioSinIVa" class="pt-4">Precio sin IVA:</label><br>
                    <input type="text" name="txtPrecioSinIVa" id="txtPrecioSinIVa" class="form-control">
                    <label for="txtPrecioConIva" class="pt-4">Precio con IVA:</label><br>
                    <input type="text" name="txtPrecioConIva" id="txtPrecioConIva" class="form-control">
                    <input type="submit" value="Calcular" class="btn btn-primary mt-4 px-4">
                </form>
            </div>
            <div class="col-2"></div>
            <div class="col-6">
                <table class="table border">
                    <tbody>
                        <tr>
                            <th>IVA:
                            <td><?php if (isset($iva)) {
                                    echo $iva;
                                } ?>
                            </td>
                            </th>
                        </tr>
                        <tr>
                            <th>Precio sin IVA:</th>
                        </tr>
                        <tr>
                            <th>Precio con IVA:
                            <td>
                                <?php
                                if (isset($iva, $precioSinIva, $precioConIva)) {
                                    echo calcularIva($iva, $precioSinIva, $precioConIva);
                                }
                                ?>
                            </td>

                            </th>
                        </tr>
                        <tr>
                            <th>Cantidad de IVA:<td><?php ?></td></th>
                            
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </main>

</body>

</html>


else {
$resultado = $precioConIva * $valorIva;
}