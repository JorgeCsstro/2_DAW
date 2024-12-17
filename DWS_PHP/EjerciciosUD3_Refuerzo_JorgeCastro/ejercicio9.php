<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    /*
        9. Crear una matriz de tamaño 5x5 y rellenarla de la siguiente forma: la posición M[n,m] debe
        contener n+m. Después se debe mostrar su contenido.
    */

    $matriz = [];
    
    // Creo la matriz
    for ($n = 0; $n < 3; $n++) {
        for ($m = 0; $m < 3; $m++) {
            $matriz[$n][$m] = $n + $m;
        }
    }
    
    // Print de la matriz
    for ($n = 0; $n < 3; $n++) {
        for ($m = 0; $m < 3; $m++) {
            print($matriz[$n][$m] . "\t");
        }
        print("\n");
    }
    
?>
