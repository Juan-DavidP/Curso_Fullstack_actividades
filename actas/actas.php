<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aEstudiantes[] = array(
    "nombre" => "Juan Perez",
    "aNotas" => array(8, 9)
);
$aEstudiantes[] = array(
    "nombre" => "Ana Valle",
    "aNotas" => array(4, 9)
);
$aEstudiantes[] = array(
    "nombre" => "Gonzalo Roldán",
    "aNotas" => array(7, 6)
);

function promediar($aNotas)
{
    $suma = 0;
    foreach ($aNotas as $nota) {
        $suma += $nota;
    }
    return $suma / count($aNotas);
}

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
                        $id = 0;
                        $promedioCurso = 0;
                        foreach ($aEstudiantes as $estudiante) :
                            $promedio = promediar($estudiante["aNotas"]) ?>
                            <tr>
                                <td><?php echo $id += 1; ?></td>
                                <td><?php echo $estudiante["nombre"]; ?></td>
                                <td><?php echo $estudiante["aNotas"][0]; ?></td>
                                <td><?php echo $estudiante["aNotas"][1]; ?></td>
                                <td><?php echo number_format($promedio, 2, ",", "."); ?></td>
                            </tr>
                        <?php
                            $promedioCurso += $promedio;
                        endforeach; ?>
                    </tbody>
                </table>
                <h5>Promedio del curso: <?php echo number_format($promedioCurso / count($aEstudiantes), 2, ",", "."); ?></h5>
            </div>
        </div>
    </main>

</body>

</html>