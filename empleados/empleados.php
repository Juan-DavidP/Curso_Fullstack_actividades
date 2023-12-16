<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aEmpleados = array();
$aEmpleados[0] = array("dni" => 33300123, "nombre" => "David García", "bruto" => 85000.30);
$aEmpleados[1] = array("dni" => 40874456, "nombre" => "Ana Del Valle", "bruto" => 90000);
$aEmpleados[2] = array("dni" => 67567565, "nombre" => "Andrés Perez", "bruto" => 100000);
$aEmpleados[3] = array("dni" => 75744545, "nombre" => "Vicoria Luz", "bruto" => 70000);

function calcularNeto($bruto)
{
    $salNeto = $bruto - ($bruto * 0.17);
    return $salNeto;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css">
    <title>Empleados</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Listado empleados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <td><strong>DNI</strong></td>
                            <td><strong>Nombre</strong></td>
                            <td><strong>Sueldo</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contadorEmpleados = 0;
                        $contadorEmpleados2 = 0;
                        for ($i = 0; $i < count($aEmpleados); $i++) {
                            $contadorEmpleados++;
                        ?>
                            <tr>
                                <td><?php echo $aEmpleados[$i]["dni"]; ?></td>
                                <td><?php echo  mb_strtoupper($aEmpleados[$i]["nombre"]); ?></td>
                                <td><?php echo number_format(calcularNeto($aEmpleados[$i]["bruto"]), 2, ",", "."); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="3">Cantidad de empleados activos: <?php echo $contadorEmpleados; ?></td>
                        </tr>
                        <tr>
                            <td>Foreach</td>
                        </tr>
                        <?php
                        foreach ($aEmpleados as $pos => $aEmpleado) {
                            $contadorEmpleados2++;
                        ?>
                            <tr>
                                <td><?php echo $aEmpleado["dni"]; ?></td>
                                <td><?php echo  mb_strtoupper($aEmpleado["nombre"]); ?></td>
                                <td><?php echo number_format(calcularNeto($aEmpleado["bruto"]), 2, ",", "."); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="3">Cantidad de empleados activos: <?php echo $contadorEmpleados2; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>