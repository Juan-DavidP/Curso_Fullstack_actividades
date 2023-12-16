<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("America/Bogota");

class Persona
{
    protected $documento;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __construct()
    {
    }
}

class Socio extends Persona
{
    private $aTarjetas;
    private $bActivo;
    private $fechaAlta;
    private $fechaBaja;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __construct()
    {
        $this->aTarjetas = array();
        $this->bActivo = true;
        $this->fechaAlta = date("d/m/Y");
    }

    public function agregarTarjeta($tarjeta)
    {
        $this->aTarjetas[] = $tarjeta;
    }

    public function darDeBaja($fecha)
    {
        $fecha == $this->fechaBaja ? $this->bActivo = false : $this->bActivo = true;
    }

    public function imprimir()
    {
        echo "<table class='table table-bordered'>"
            . "<thead>
                <tr>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Tarjetas</th>
                <th>Fecha compra</th>
                <th>Fecha vencimiento</th>
                </tr>
                </thead>
                <tbody>
                <tr>";
        echo "<td> " . $this->nombre;
        echo "</td>" . "<td class='text-center'>" . $this->documento;
        echo "</td>" . "<td>";
        foreach ($this->aTarjetas as $tarjeta) {
            echo "<ul> <li>" . $tarjeta->tipo . "</li></ul> ";
        }
        echo "</td>";
        echo "<td>";
        foreach ($this->aTarjetas as $tarjeta) {
            echo "<ul> <li>" . $tarjeta->fechaEmision . "</li></ul> ";
        }
        echo "</td>";
        echo "<td>";
        foreach ($this->aTarjetas as $tarjeta) {
            echo "<ul> <li>" . $tarjeta->fechaVto . "</li></ul> ";
        }
        echo "</td>";
        echo "</tr>
            </tbody>
        </table>";
    }
}

class Tarjeta
{
    private $nombreTitular;
    private $numero;
    private $fechaEmision;
    private $fechaVto;
    private $tipo;
    private $cvv;

    const VISA = "Visa";
    const MASTERCARD = "Mastercard";
    const AMEX = "American Express";

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __construct($tipo, $numero, $fechaEmision, $fechaVto, $cvv)
    {
        $this->tipo = $tipo;
        $this->numero = $numero;
        $this->fechaEmision = $fechaEmision;
        $this->fechaVto = $fechaVto;
        $this->cvv = $cvv;
    }
}

//Programa
$socio1 = new Socio();
$socio1->documento = "35123789";
$socio1->nombre = "Ana Valle";
$socio1->correo = "ana@corre.com";
$socio1->celular = "1156781234";



$tarjeta1 = new Tarjeta(Tarjeta::VISA, "4223750778806383", "03/2023", "01/2024", "275");
$tarjeta2 = new Tarjeta(Tarjeta::AMEX, "347572886751981", "05/2020", "07/2027", "136");
$tarjeta3 = new Tarjeta(Tarjeta::MASTERCARD, "5415620495970009", "06/2021", "12/2024", "742");

$socio1->agregarTarjeta($tarjeta1);
$socio1->agregarTarjeta($tarjeta2);
$socio1->agregarTarjeta($tarjeta3);

$socio2 = new Socio();
$socio2->documento = "48456876";
$socio2->nombre = "Bernabe Paz";
$socio2->correo = "bernabe@corre.com";
$socio2->celular = "1145326787";
$socio2->agregarTarjeta(new Tarjeta(Tarjeta::VISA, "4969508071710316", "03/2021", "08/2025", "865"));
$socio2->agregarTarjeta(new Tarjeta(Tarjeta::MASTERCARD, "5149107669552238", "07/2020", "04/2025", "554"));
$socio2->darDeBaja("18/05/2023");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Socios</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Socios</h1>
            </div>
        </div>
        <div class="col-12">
            <?php $socio1->imprimir();
            echo "<br>";
            $socio2->imprimir();
            ?>
        </div>
    </main>

</body>

</html>