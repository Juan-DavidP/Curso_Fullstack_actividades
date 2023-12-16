<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$valor = rand(1,5);

if ($valor == 1 || $valor == 3 ||$valor == 5) {
    echo "El número es $valor impar";
}
else{
    echo "El número es $valor par";
}

echo $valor == 1 ||  $valor == 3 || $valor == 5? "el número $valor es impar": "el numero $valor es par";

if ($valor % 2 == 0) {
   echo "el número $valor es par";
}
else{
    echo "el número $valor es impar";
}
?>