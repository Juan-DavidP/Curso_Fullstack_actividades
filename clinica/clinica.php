<?php

$aPacientes = array();
$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Ana Acuña",
    "edad" => "45",
    "peso" => "81.5"
);
$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Gonzalo Bustamante",
    "edad" => "66",
    "peso" => "79"
);
$aPacientes[] = array(
    "dni" => "23.684.386",
    "nombre" => "Juan Irraola",
    "edad" => "28",
    "peso" => "79"
);
$aPacientes[] = array(
    "dni" => "33.765.013",
    "nombre" => "Beatriz Ocampo",
    "edad" => "50",
    "peso" => "79"
);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css">
    <title>Nutricion SA</title>
</head>

<body>
    <div class="container">
        <div class="col-12">
            <table class="table border">
                <h1>
                    Listado de pacientes
                </h1>
                <thead>
                    <tr>
                        <td>
                            DNI
                        </td>
                        <td>
                            Nombre y Apellido
                        </td>
                        <td>
                            Edad
                        </td>
                        <td>
                            Peso
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($aPacientes as $value => $paciente) {

                    ?>
                        <tr>
                            <td><?php echo $paciente["dni"]; ?></td>
                            <td><?php echo $paciente["nombre"]; ?></td>
                            <td><?php echo $paciente["edad"]; ?></td>
                            <td><?php echo $paciente["peso"]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>