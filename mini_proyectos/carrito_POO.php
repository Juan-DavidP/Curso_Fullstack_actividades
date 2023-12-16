<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("America/Bogota");

class Cliente
{
    private $documento;
    private $nombre;
    private $correo;
    private $telefono;
    private $descuento;

    public function __construct()
    {
        $this->descuento = 0;
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function imprimir()
    {
        echo "Documento: " . $this->documento . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Correo: " . $this->correo . "<br>";
        echo "Teléfono: " . $this->telefono . "<br>";
        echo "Descuento: " . $this->descuento . "<br>";
        echo "<br>";
    }
}


class Producto
{
    private $cod;
    private $nombre;
    private $precio;
    private $descripcion;
    private $iva;

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function __construct()
    {
        $this->precio = 0;
        $this->iva = 0;
    }

    public function imprimir()
    {
        echo "Codigo: " . $this->cod . "<br>";
        echo "Nombre;: " . $this->nombre . "<br>";
        echo "Precio: " . $this->precio . "<br>";
        echo "Descripcion: " . $this->descripcion . "<br>";
        echo "IVA: " . $this->iva . "<br>";
        echo "<br>";
    }
}

class Carrito
{
    private $cliente;
    private $aProductos;
    private $subTotal;
    private $total;

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }



    public function cargarProductos($producto)
    {
        $this->aProductos[] = $producto;
    }
    public function imprimirTicket()
    {
        echo "<table class='table border table-hover'>
        <thead>
            <th colspan='2' class='text-center'>Carrito POO</th>
        </thead>
        <tbody>
            <tr><th>Fecha:</th> <td>" . date('d/m/Y H:i:s') . "</td></tr>
            <tr><th>Documento:</th><td>" . $this->cliente->documento . "</td></tr>
            <tr><th>Nombre</th> <td>" . $this->cliente->nombre . "</td></tr> 
            <th colspan='2'>Productos:</th></tr>";

        foreach ($this->aProductos as $producto) {
            echo "<tr> <td>" .
                $producto->nombre . "</td>" .
                "<td> $" . number_format($producto->precio,0,",",".") . "<br>" .
                "</td></tr>";
            $this->subTotal +=  $producto->precio;
            $this->total += ($producto->precio) + ($producto->precio * ($producto->iva / 100));
        }
        echo "
        <tr><th>Subtotal/Sin iva</th> <td> $" . number_format($this->subTotal,0,",",".") . "</td></tr>
        <tr><th>Total + IVAS y descuentos</th> <td> $" . number_format(($this->total) - ($this->total * $this->cliente->descuento),0,",",".") . "</td></tr>
        </tbody>
            </table>";
    }
}


//programa
$cliente1 = new Cliente();
$cliente1->documento = "34765456";
$cliente1->nombre = "Bernabé";
$cliente1->correo = "bernabe@gmail.com";
$cliente1->telefono = "+541188598686";
$cliente1->descuento = 0.05;
// $cliente1->imprimir();

$producto1 = new Producto();
$producto1->cod = "AB8767";
$producto1->nombre = "Notebook 15\" HP";
$producto1->descripcion = "Esta es una computadora HP";
$producto1->precio = 30800;
$producto1->iva = 21;
// $producto1->imprimir();

$producto2 = new Producto();
$producto2->cod = "QWR579";
$producto2->nombre = "Heladera Whirlpool";
$producto2->descripcion = "Esta es una heladera no froze";
$producto2->precio = 76000;
$producto2->iva = 10.5;
// $producto2->imprimir();

$carrito = new Carrito();
$carrito->cliente = $cliente1;
$carrito->cargarProductos($producto1);
$carrito->cargarProductos($producto2);
echo "<br>";
// print_r($carrito);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Carrito</title>
</head>

<body>
    <div class="main">
        <div class="row">
            <div class="col-6">
                <?php echo $carrito->imprimirTicket(); ?>
            </div>
        </div>
    </div>
</body>

</html>