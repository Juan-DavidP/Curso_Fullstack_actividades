<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "Uso de for <br>";


// for ($i=0; $i <= 100 ; $i+=2) { 
//     echo $i." ";
// }

for ($i = 0; $i <= 100; $i++) {
    if ($i % 2 == 0) {
        echo $i . "\n";
        if ($i >= 60) {

            break;
        }
    }
}


/* for ($i = 0; $i <= 100; $i++) {
    if ($i <= 60) {
        if ($i % 2 == 0) {
        echo $i . "\n";
        }
    }
}*/

echo "<br>";
echo "<br>";

echo "Uso de while <br>";
$contador = 0;
while ($contador <= 100) {
    echo $contador . " ";
    $contador++;
}

echo "<br>";
echo "<br>";

echo "Uso de do while <br>";

$contador = 0;
do {
    echo $contador . " ";
    $contador++;
} while ($contador <= 100);
