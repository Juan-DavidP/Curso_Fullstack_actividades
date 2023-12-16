<?php

$miAuto = array(
    "pantente" => "AA123 HB",
    "marca" => "Ford"
);

foreach ($miAuto as $clave => $valor) {
    echo "La $clave es : $valor <br>";
}


foreach ($miAuto as $valor) {
    echo $valor;
}