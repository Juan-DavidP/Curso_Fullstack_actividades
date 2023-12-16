<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona
{
    protected $documento;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;

    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }
    public function getDocumento()
    {
        return $this->documento;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }
    public function getEdad()
    {
        return $this->edad;
    }

    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;
    }
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    function imprimir()
    {
    }

    public function __destruct()
    {
        echo "<br>";
        echo "destrunyendo el objeto " . $this->nombre . "<br>";
    }
}

class Alumno extends Persona
{
    public $acta;
    public $notaPortafolio;
    public $notaPhp;
    public $notaProyecto;

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
        $this->notaPortafolio = 0.0;
        $this->notaPhp = 0.0;
        $this->notaProyecto = 0.0;
    }
    public function imprimir()
    {
        echo "alumno: " . $this->nombre . "<br>";
        echo "documento: " . $this->documento . "<br>";
        echo "nota del portafolio: " . $this->notaPortafolio . "<br>";
        echo "promedio: " . $this->calcularPromedio() . "<br>";
        echo "<br>";
    }
    private function calcularPromedio()
    {
        return ($this->notaPortafolio + $this->notaPhp + $this->notaProyecto) / 3;
    }
}

class Docente extends Persona
{
    public $especialidad;

    const ESPECIALIDAD_WP = "Wordpress";
    const ESPECIALIDAD_ECO = "Economía aplicada";
    const ESPECIALIDAD_BBDD = "Base de datos";

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
        echo "docente: " . $this->nombre . "<br>";
        echo "documento: " . $this->documento . "<br>";
        echo "especialidad: " . $this->especialidad . "<br>";
    }
    private function imprimirEspecialidadesHabilitadas()
    {
        echo "Las especialidade habilitadas son: <br>";
        echo self::ESPECIALIDAD_WP . "<br>";
        echo self::ESPECIALIDAD_ECO . "<br>";
        echo self::ESPECIALIDAD_BBDD . "<br>";
    }
}

//programa

$alumno1 = new Alumno();
$alumno1->setNombre("Juan");
$alumno1->notaPortafolio = 10.0;
$alumno1->notaPhp = 10.0;
$alumno1->notaProyecto = 10.0;
$alumno1->imprimir();

$alumno2 = new Alumno();
$alumno2->setNombre("David");
$alumno2->notaPortafolio = 9.0;
$alumno2->notaPhp = 9.5;
$alumno2->notaProyecto = 10.0;
$alumno2->imprimir();


$doncente1 = new Docente();
$doncente1->setNombre("Juan Pelaez");
$doncente1->especialidad = Docente::ESPECIALIDAD_WP;
$doncente1->imprimir();
