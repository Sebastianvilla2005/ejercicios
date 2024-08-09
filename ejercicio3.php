<?php
function ordenarArray($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                // Intercambiar los elementos
                [$arr[$j], $arr[$j + 1]] = [$arr[$j + 1], $arr[$j]];
            }
        }
    }
    return $arr;
}

$numeros = [64, 34, 25, 12, 22, 11, 90];
echo "Arreglo original: ";
print_r($numeros);

$arreglo_ordenado = ordenarArray($numeros);
echo "Arreglo ordenado: ";
print_r($arreglo_ordenado);
?>

