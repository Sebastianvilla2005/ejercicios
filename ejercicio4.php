<?php
function sumaDigitos($numero)
{
    $suma = 0;
    while ($numero != 0) {
        $digito = $numero % 10;
        $suma += $digito;
        $numero = floor($numero / 10);
    }
    return $suma;
}

$numero = 1234;
echo "La suma de los dígitos de $numero es: " . sumaDigitos($numero) . "\n";

