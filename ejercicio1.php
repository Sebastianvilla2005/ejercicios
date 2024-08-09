<?php

function esPalindromo($texto) 
{
    $texto = strtolower(preg_replace("/[^a-z0-9]/i", "", $texto));
    return $texto === strrev($texto);
}

$textoPalabras = readline("Ingresa la Palabra: ");

echo esPalindromo($textoPalabras) ? "Es un Palíndromo" : "No es Palíndromo";

?>

