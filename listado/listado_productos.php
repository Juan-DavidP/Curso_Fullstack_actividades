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
    <table class="table border table-hover">
        <thead>
            <tr>
                <th class="text-end">
                    Listado productos
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Nombre</strong></td>
                <td><strong>Marca</strong></td>
                <td><strong>Modelo</strong></td>
                <td><strong>Stock</strong></td>
                <td><strong>Precio</strong></td>
                <td><strong>Acción</strong></td>
            </tr>
            <tr>
                <td><?php echo $aProductos[0]["nombre"]; ?></td>
                <td><?php echo $aProductos[0]["marca"]; ?></td>
                <td><?php echo $aProductos[0]["modelo"]; ?></td>
                <td><?php echo $aProductos[0]["stock"] > 10 ? "Stock" : ($aProductos[0]["stock"] > 0  && $aProductos[0]["stock"] <= 10 ? "Poco stock"
                        :  "Sin Stock"); ?></td>
                <td><?php echo $aProductos[0]["precio"]; ?></td>
                <td><button type="button" class="btn btn-primary">Comprar</button></td>
            </tr>
            <tr>
                <td><?php echo $aProductos[1]["nombre"]; ?></td>
                <td><?php echo $aProductos[1]["marca"]; ?></td>
                <td><?php echo $aProductos[1]["modelo"]; ?></td>
                <td><?php echo $aProductos[1]["stock"] > 0 && $aProductos[1]["stock"] <= 10 ? "Poco Stock" : ($aProductos[1]["stock"] > 10? "Stock" : "Sin Stock"  ) ?></td>
                <td><?php echo $aProductos[1]["precio"]; ?></td>
                <td><button type="button" class="btn btn-primary">Comprar</button></td>
            </tr>
            <tr>
                <td><?php echo $aProductos[2]["nombre"]; ?></td>
                <td><?php echo $aProductos[2]["marca"]; ?></td>
                <td><?php echo $aProductos[2]["modelo"]; ?></td>
                <td><?php echo $aProductos[2]["stock"] == 0 ? "Sin Stock" : ($aProductos[2]["stock"] > 0  && $aProductos[2]["stock"] <= 10 ? "Poco stock"
                        :  "Stock"); ?></td>
                <td><?php echo $aProductos[2]["precio"]; ?></td>
                <td><button type="button" class="btn btn-primary">Comprar</button></td>
            </tr>

        </tbody>
    </table>
</body>

</html>