<?php
$fecha = date("d/m/Y");
$nombre = "Juan Pelaez";
$edad = 22;
$aPeliculas = array("ratatouille", "Mulan", "Donde estan las rubias?");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css" />
    <title>Tabla</title>
</head>

<body>
    <header>
        <h1 class="text-center">
            Ficha personal
        </h1>
    </header>
    <main class="container">
        <div class="container">
            <table class="table border">
                <th></th>
                <tbody>
                    <tr>
                        <td> <strong>Fecha:</strong>
                        </td>
                        <td> <?php echo $fecha; ?></td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Nombre y apellido:</strong>
                        </td>
                        <td> <?php echo $nombre; ?> </td>
                    </tr>
                    <tr>
                        <td><strong>Edad:</strong>
                        </td>
                        <td> <?php print_r($edad); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Peliculas favoritas:</strong>
                        </td>
                        <td>
                            <?php echo "$aPeliculas[0] <br>"; ?>
                            <?php echo "$aPeliculas[1] <br>"; ?>
                            <?php echo "$aPeliculas[2] <br>"; ?>
                            <?php print_r($aPeliculas); ?><br>
                            <?php var_dump($aPeliculas); ?>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </main>
</body>

</html>