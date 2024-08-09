<?php
function FierroAlv()
{
    foreach (range(1, 100) as $i) {
        $output = '';

        if ($i % 3 == 0) {
            $output .= "Peso";
        }

        if ($i % 5 == 0) {
            $output .= "Pluma";
        }

        echo ($output === '' ? $i : $output) . "\n";
    }
}

FierroAlv();

