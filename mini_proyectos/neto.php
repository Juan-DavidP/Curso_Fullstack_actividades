<?php

function calcularNeto($bruto)
{
    $salNeto = $bruto - ($bruto * 0.17);
    return $salNeto;
}

echo "El salario neto es de ". calcularNeto(180000). "<br>";
echo "El salario neto es de ". calcularNeto(200000);
