<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_SESSION["listadoAlumnos"])) {
    $aAlumnos = $_SESSION["listadoAlumnos"];
} else {
    $aAlumnos = array();
}

if ($_POST) {
    $alumno = $_REQUEST["txtAlumno"];
    $nota1 = $_REQUEST["txtNota1"];
    $nota2 = $_REQUEST["txtNota2"];

    $aAlumnos[] = array(
        "alumno" => $alumno,
        "aNotas" => [$nota1, $nota2],
    );

    $_SESSION["listadoAlumnos"] = $aAlumnos;
}

if (isset($_GET["eliminar"]) && $_GET["eliminar"] >= 0) {
    $key = $_GET["eliminar"];
    unset($aAlumnos[$key]); /* Elimino el array indicado */
    $_SESSION["listadoAlumnos"] = $aAlumnos; /* Actualizo la variable */
    header("Location: actas.php"); /* Me redirijo a la pagina actualizada */
}

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
    <title>Actas</title>
</head>

<body>
    <main class="container">
        <div class="col-12">
            <div class="row">
                <h1 class="text-center py-4">Actas</h1>
            </div>
        </div>
        <div class="col-12">
            <table class="table border">
                <thead>
                    <th>ID</th>
                    <th>Alumno</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Promedio</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php
                    $id = 0;
                    $sumPromedio = 0;
                    foreach ($aAlumnos as $key => $alumno) :
                        $promedio = Promediar($alumno["aNotas"]);
                        $sumPromedio += $promedio;
                    ?>
                        <tr>
                            <td><?php echo $id += 1 ?></td>
                            <td><?php echo $alumno["alumno"]; ?></td>
                            <td><?php echo $alumno["aNotas"][0]; ?></td>
                            <td><?php echo $alumno["aNotas"][1]; ?></td>
                            <td><?php echo $promedio; ?></td>
                            <td><a href="?eliminar=<?php echo $key; ?>" class="fa-regular fa-trash-can" style="color: #1839F1;"></a></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td></td>
                        <form action="" method="post">
                            <td colspan="1">
                                <div class="col-12"><input type="text" name="txtAlumno" id="txtAlumno" class="form-control" placeholder="Alumno" required></div>
                            </td>
                            <td>
                                <div class="col-12"><input type="text" name="txtNota1" id="txtNota1" class="form-control" placeholder="Nota 1" required></div>
                            </td>
                            <td>
                                <div class="col-12"><input type="text" name="txtNota2" id="txtNota2" class="form-control" placeholder="Nota 2" required></div>
                            </td>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-regular fa-square-plus" style="color: #FFFF;"></i>
                                </button>
                            </td>
                        </form>
                    </tr>
                </tbody>
            </table>
            <h3>Promedio del curso: <?php echo $sumPromedio / count($aAlumnos); ?></h3>
        </div>

    </main>

</body>

</html>