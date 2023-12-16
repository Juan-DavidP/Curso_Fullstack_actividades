<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aProductos = array();
$aProductos[] = array(
    "nombre" => "Smart TV 55\" 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 50,
    "precio" => 58000
);
$aProductos[] = array(
    "nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000
);
$aProductos[] = array(
    "nombre" => "Aire Acondicionado Split Inverter Frío/Calor Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 5,
    "precio" => 45000
);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css">
    <title>Listado productos</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="col-12">
                <h1 class="text-center">Listado productos</h1>
                <table class="table border table-hover">
                    <thead>
                        <tr>
                            <th><strong>Nombre</strong></th>
                            <th><strong>Marca</strong></th>
                            <th><strong>Modelo</strong></th>
                            <th><strong>Stock</strong></th>
                            <th><strong>Precio</strong></th>
                            <th><strong>Acción</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $precio = 0;
                        for ($i = 0; $i < count($aProductos); $i++) {
                            $precio += $aProductos[$i]["precio"];
                        ?>
                            <tr>
                                <td><?php echo $aProductos[$i]["nombre"]; ?></td>
                                <td><?php echo $aProductos[$i]["marca"]; ?></td>
                                <td><?php echo $aProductos[$i]["modelo"]; ?></td>
                                <td><?php echo $aProductos[$i]["stock"] > 10 ? "Stock" : ($aProductos[$i]["stock"] > 0  && $aProductos[$i]["stock"] <= 10 ? "Poco stock"
                                        :  "Sin Stock"); ?></td>
                                <td><?php echo $aProductos[$i]["precio"]; ?></td>
                                <td><button type="button" class="btn btn-primary">Comprar</button></td>
                            </tr>
                        <?php

                        } ?>
                        <tr>
                            <td>Subtotal:
                                <?php echo $precio; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>