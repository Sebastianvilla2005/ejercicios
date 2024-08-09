<?php

function generarFibonacci($numero) {
    $fibonacci = [0, 1];  // Inicializar los dos primeros valores de Fibonacci
    
    while (count($fibonacci) <= $numero) {
        $fibonacci[] = end($fibonacci) + prev($fibonacci);  // Suma de los dos últimos elementos
    }

    return array_slice($fibonacci, 0, $numero + 1);  // Limitar el array al tamaño solicitado
}

$numero = readline("Ingresa el número: ");
$fibonacciSecuencia = generarFibonacci($numero);

echo "Secuencia de Fibonacci hasta el número $numero:\n";
echo implode(", ", $fibonacciSecuencia) . "\n";

?>

