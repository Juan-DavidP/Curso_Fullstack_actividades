<?php

function numMaximo($aArray){
    $max= "";
    foreach ($aArray as $elemento) {
        if ($max < $elemento) {
            $max = $elemento;
        }
    }
    return $max;
}

$aNotas = array(8, 4, 3, 9, 1);
$aSueldos = array(800.30, 400.87, 500.45, 300, 900.70, 100, 900, 1800);


echo "La nota más alta es: ". numMaximo($aNotas) . "<br>";
echo "El sueldo más alto es: ". numMaximo($aSueldos) . "<br>";
