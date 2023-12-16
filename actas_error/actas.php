<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aEstudiantes[] = array(
    "id" => "1",
    "nombre" => "Juan Perez",
    "nota1" => 9,
    "nota2" => 8
);
$aEstudiantes[] = array(
    "id" => "2",
    "nombre" => "Ana Valle",
    "nota1" => 4,
    "nota2" => 9
);
$aEstudiantes[] = array(
    "id" => "3",
    "nombre" => "Gonzalo Roldán",
    "nota1" => 7,
    "nota2" => 6
);

function promediar($aEstudiantes)
{
    foreach ($aEstudiantes as $estudiante) {
        return ($estudiante["nota1"] + $estudiante["nota2"]) / 2;
    }
}

print_r($aEstudiantes);
print_r(promediar($aEstudiantes));

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/fontawesome/css/all.min.css">
    <title>Actas Estudiantes</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <h1 class="text-center">Actas</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Alumno</th>
                            <th>Nota 1</th>
                            <th>Nota 2</th>
                            <th>Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador = 0;
                        $promedioGeneral = 0;
                        foreach ($aEstudiantes as $estudiante) :
                            $contador += 1;
                            $promedio = ($estudiante["nota1"] + $estudiante["nota2"]) / 2;

                        ?>
                            <tr>
                                <td><?php echo $estudiante["id"]; ?></td>
                                <td><?php echo $estudiante["nombre"]; ?></td>
                                <td><?php echo $estudiante["nota1"]; ?></td>
                                <td><?php echo $estudiante["nota2"]; ?></td>
                                <td><?php echo number_format($promedio, 2, ",", ".") ?></td>
                            </tr>
                        <?php
                            $promedioGeneral += $promedio;
                        endforeach; ?>
                    </tbody>
                </table>
                <h5>Promedio de la cursada: <?php echo number_format($promedioGeneral / $contador, 2, ",", "."); ?></h5>
            </div>
        </div>
    </main>

</body>

</html>