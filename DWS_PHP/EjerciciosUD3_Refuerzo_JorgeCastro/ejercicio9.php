<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    /*
        8. Leer por teclado y rellenar dos vectores de 10 números enteros y mezclarlos en un tercer vector
        de la forma: el 1º de A, el 1º de B, el 2º de A, el 2º de B, etc.
    */

    $matriz = [];
    
    // Creo la matriz
    for ($n = 0; $n < 5; $n++) {
        for ($m = 0; $m < 5; $m++) {
            $matriz[$n][$m] = $n + $m;
        }
    }
    
    // Mostrar el contenido de la matriz
    echo "Contenido de la matriz 5x5:\n";
    for ($n = 0; $n < 5; $n++) {
        for ($m = 0; $m < 5; $m++) {
            echo $matriz[$n][$m] . "\t"; // Mostrar el valor con tabulación
        }
        echo "\n"; // Salto de línea después de cada fila
    }
    



?>
