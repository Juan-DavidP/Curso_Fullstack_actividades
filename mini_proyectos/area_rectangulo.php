<?php
//Definición

function calcularAreaRect($base, $altura){
    $areaRecta = $base * $altura;
    return $areaRecta;
}

//Uso
echo "El área es " . calcularAreaRect(100, 0.60). "<br>";
echo "El área es " . calcularAreaRect(800, 300);
?>