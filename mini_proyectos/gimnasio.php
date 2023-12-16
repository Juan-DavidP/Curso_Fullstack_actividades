<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona
{
    protected $documento;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function __construct($documento, $nombre, $correo, $celular)
    {
        $this->documento = $documento;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->celular = $celular;
    }
}

class Alumno extends Persona
{
    private $fechaNac;
    private $peso;
    private $altura;
    private $aptoFisico;
    private $asistencia;

    public function __construct($documento, $nombre, $correo, $celular, $fechaNac)
    {
        parent::__construct($documento, $nombre, $correo, $celular);
        $this->fechaNac = $fechaNac;
        $this->peso = 0.0;
        $this->altura = 0.0;
        $this->aptoFisico = false;
        $this->asistencia = 0.0;
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function setFichaMedica($altura, $peso, $aptoFisico)
    {
        $this->altura = $altura;
        $this->peso = $peso;
        $this->aptoFisico = $aptoFisico;
    }
}

class Entrenador extends Persona
{
    private $aClases;

    public function __construct($documento, $nombre, $correo, $celular)
    {
        parent::__construct($documento, $nombre, $correo, $celular);
        $this->aClases = array();
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->propiedad = $valor;
    }

    public function asignarClases($clase)
    {
        $this->aClases[] = $clase;
    }
}

class Clase
{
    private $nombre;
    private $entrenador;
    private $aAlumnos;

    public function __construct()
    {
        $this->aAlumnos = array();
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function asignarEntrenador($entrenador)
    {
        $this->entrenador = $entrenador;
    }

    public function inscribirAlumno($alumno)
    {
        $this->aAlumnos[] = $alumno;
    }

    public function imprimirListado()
    {
        echo "<table class='table border table-striped table-hover'>";
        echo "<tr><th class='text-center table-dark' colspan='4'> Clase:" . $this->nombre . "</th></tr>";
        echo "<tr><th colspan='2'>Entrenador: </th> <td colspan='2'>" . $this->entrenador->nombre . "</td></tr>";
        echo  "<tr><th colspan='4'>Alumnos inscritos: </th></tr>";
        echo "<tr> <th>Documento</th> <th>Nombre</th><th>Correo</th><th>Celular</th>";

        foreach ($this->aAlumnos as $alumno) {
            echo "<tr><td>" . number_format($alumno->documento, 0, ",", ".") . "</td> <td>" . $alumno->nombre . "</td> <td>" . $alumno->correo . "</td> <td>" . $alumno->celular . "</td>";
        }
        echo "</table> <br>";
    }
}


//Programa

$entrenador1 = new Entrenador("34987789", "Miguel Ocampo", "miguel@mail.com", "11678634");
$entrenador2 = new Entrenador("28987589", "Andrea Zarate", "andrea@mail.com", "11768654");

$alumno1 = new Alumno("40787657", "Dante Moreno", "dante@mail.com", "1145632457", "1997-08-28");
$alumno1->setFichaMedica(90, 178, true);
$alumno1->asistencia = 78;

$alumno2 = new Alumno("46766547", "Dario Turchi", "dario@mail.com", "1145632457", "1986-11-21");
$alumno2->setFichaMedica(73, 168, false);
$alumno2->asistencia = 68;

$alumno3 = new Alumno("39765454", "Facundo Faganano", "facundo@mail.com", "1145632457", "1993-02-06");
$alumno3->setFichaMedica(90, 187, true);
$alumno3->asistencia = 88;

$alumno4 = new Alumno("41687536", "Gastón Aguilar", "gaston@mail.com", "1145632457", "1999-11-02");
$alumno4->setFichaMedica(70, 169, false);
$alumno4->asistencia = 98;

$clase1 = new Clase();
$clase1->nombre = "Funcional";
$clase1->asignarEntrenador($entrenador1);
$clase1->inscribirAlumno($alumno1);
$clase1->inscribirAlumno($alumno3);
$clase1->inscribirAlumno($alumno4);


$clase2 = new Clase();
$clase2->nombre = "Zumba";
$clase2->asignarEntrenador($entrenador2);
$clase2->inscribirAlumno($alumno1);
$clase2->inscribirAlumno($alumno2);
$clase2->inscribirAlumno($alumno3);

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Gimnasio</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <h1 class="text-center">Gimnasio</h1>
        </div>
        <div class="col-12"> <?php $clase1->imprimirListado();
                                $clase2->imprimirListado(); ?> </div>

    </main>

</body>

</html>