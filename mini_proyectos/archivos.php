<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function print_f($variable)
{
    if (is_array($variable)) {
        $archivo = fopen("datos.txt", "a+");
        foreach ($variable as $value) {
            fwrite($archivo, $value . "\n");
        }
        fclose($archivo);
    } else {
        $archivo = fopen("datos.txt", "a+");
        fwrite($archivo, $variable . "\n");
        fclose($archivo);

        // file_put_contents("datos.txt", $variable);
    }
}

$aNotas = array(8, 5, 7, 9, 10);
$msg = "Esto es un mensaje";

print_f($aNotas);
print_f($msg);
