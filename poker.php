<?php
// Función para repartir cartas
function repartirCartas() {
    $palos = ['Corazones', 'Diamantes', 'Tréboles', 'Picas'];
    $valores = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
    $mazo = [];

    // Generar el mazo de cartas
    foreach ($palos as $palo) {
        foreach ($valores as $valor) {
            $mazo[] = "$valor de $palo";
        }
    }

    // Mezclar el mazo
    shuffle($mazo);

    // Seleccionar 5 cartas
    return array_slice($mazo, 0, 5);
}

// Función para mostrar cartas
function mostrarCartas($cartas) {
    foreach ($cartas as $carta) {
        echo $carta . " ";
    }
    echo "\n";
}

// Función para evaluar la mano
function evaluarMano($cartas) {
    $valores = [];
    $palos = [];
    
    foreach ($cartas as $carta) {
        list($valor, , $palo) = explode(' ', $carta);
        $valores[] = $valor;
        $palos[] = $palo;
    }

    $valorCuenta = array_count_values($valores);
    $paloCuenta = array_count_values($palos);
    $valoresUnicos = array_keys($valorCuenta);
    
    // Convertir valores a un rango numérico para evaluación
    $valorConversion = ['2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10, 'J' => 11, 'Q' => 12, 'K' => 13, 'A' => 14];
    $valoresNumericos = array_map(function($valor) use ($valorConversion) {
        return $valorConversion[$valor];
    }, $valores);
    sort($valoresNumericos);

    // Evaluar combinaciones
    if (count($paloCuenta) == 1) {
        // Flush o Escalera de color
        if ($valoresNumericos == range(min($valoresNumericos), min($valoresNumericos) + 4)) {
            if (min($valoresNumericos) == 10) {
                return "Escalera Real";
            }
            return "Escalera de color";
        }
        return "Color";
    }
    
    if ($valoresNumericos == range(min($valoresNumericos), min($valoresNumericos) + 4)) {
        return "Escalera";
    }

    if (in_array(4, $valorCuenta)) {
        return "Póker";
    }

    if (in_array(3, $valorCuenta) && in_array(2, $valorCuenta)) {
        return "Full House";
    }

    if (in_array(3, $valorCuenta)) {
        return "Trío";
    }

    if (count(array_filter($valorCuenta, function($v) { return $v == 2; })) == 2) {
        return "Dos Pares";
    }

    if (in_array(2, $valorCuenta)) {
        return "Par";
    }

    return "Carta Alta: " . array_search(max($valoresNumericos), $valorConversion);
}

// Programa principal
$cartas = repartirCartas();
echo "Cartas del jugador: ";
mostrarCartas($cartas);
echo "Evaluación de la mano: " . evaluarMano($cartas) . "\n";
?>



