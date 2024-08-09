<?php 

function consultarSaldo($saldo) {
    echo "\nEl saldo actual en tu tarjeta es: $saldo\n";
}

function retirarDinero(&$saldo, &$cajero) {
    echo "\nIntroduce el monto que deseas retirar (10000, 50000, 100000, 150000, o más): ";
    $montoretiro = readline();

    if ($montoretiro == 10000 || $montoretiro == 50000 || $montoretiro >= 50000) {
        if ($montoretiro <= $saldo && $montoretiro <= $cajero) {
            $saldo -= $montoretiro;
            $cajero -= $montoretiro;
            echo "\nRetiro exitoso de $montoretiro. Nuevo saldo en tu tarjeta: $saldo\n";
            echo "Saldo restante en el cajero: $cajero\n";
        } else {
            echo "\nNo tienes suficiente saldo o el cajero no tiene suficiente dinero para realizar este retiro.\n";
            echo "Tu saldo actual: $saldo\n";
            echo "Saldo en el cajero: $cajero\n";
        }
    } else {
        echo "\nEl monto ingresado no es permitido. Por favor, ingresa 10000, 50000 o un monto mayor o igual a 50000.\n";
    }
}

function recargarCajero(&$cajero) {
    echo "\nIntroduce el monto que deseas recargar al cajero: ";
    $montorecarga = readline();
    $cajero += $montorecarga;
    echo "\nRecarga exitosa de $montorecarga. Nuevo saldo en el cajero: $cajero\n";
}

function depositarDinero(&$saldo) {
    echo "\nIntroduce el monto que deseas depositar en tu tarjeta: ";
    $montodeposito = readline();
    $saldo += $montodeposito;
    echo "\nDepósito exitoso de $montodeposito. Nuevo saldo en tu tarjeta: $saldo\n";
}

$saldo = readline("Introduce el saldo inicial de tu tarjeta: "); 
$cajero = 1000000;  

echo "Saldo inicial en tu tarjeta: $saldo\n"; 
echo "Saldo inicial en el cajero: $cajero\n"; 

while (true) {
    echo "\nMenú de opciones:\n";
    echo "1. Consultar saldo\n";
    echo "2. Retirar dinero\n";
    echo "3. Recargar cajero\n";
    echo "4. Depositar dinero en la tarjeta\n";
    echo "5. Salir\n";
    echo "Selecciona una opción: ";
    $opcion = readline();

    switch ($opcion) {
        case 1:
            consultarSaldo($saldo);
            break;
        case 2:
            retirarDinero($saldo, $cajero);
            break;
        case 3:
            recargarCajero($cajero);
            break;
        case 4:
            depositarDinero($saldo);
            break;
        case 5:
            echo "\nGracias por usar nuestro servicio Bancolombia. Saldo final en tu tarjeta: $saldo\n";
            echo "Saldo final en el cajero: $cajero\n";
            exit;
        default:
            echo "\nOpción no válida. Por favor, selecciona una opción del 1 al 5.\n";
            break;
    }
}

?>


