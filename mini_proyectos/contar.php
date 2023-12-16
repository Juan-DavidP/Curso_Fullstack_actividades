<?php

$aNotas = array(9, 8, 9.50, 4, 7, 8);

//Se declara la funcion para contar los elementos de un array
function contar($aArray)
{
    //Se inicializa un contador
    $contador =0;
    //Ciclo que servira para recorrer el array
    foreach ($aArray as $aElmento) {
        $contador++;
        // echo $aElmento."\n <br>";
    }
    return $contador;
}

echo contar($aNotas);

