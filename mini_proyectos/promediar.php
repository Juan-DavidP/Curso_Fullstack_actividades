<?php
function promediar($aArray)
{
    $cantidadElementos = count($aArray);
    $valor = 0;
    foreach ($aArray as $elemento) {
        $valor += $elemento;
    }
    return $valor / $cantidadElementos;
}

$aNotas = array(8, 4, 3, 9, 1);
$aSueldos = array(800.30, 400.87, 500.45, 300, 900.70, 100, 900, 1800);


echo "El promedio de notas es: ". promediar($aNotas) . "<br>";
echo "El promedio de los sueldos es: ". promediar($aSueldos) . "<br>";