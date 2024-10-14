<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        11. Diseña un programa para imprimir los números impares menores que N.
    */

    $num = readline("Dame un numero entero: ");

    // Genera y imprime los números impares
    while ($num >= 0) {
        if ($num%2 != 0){
            print("$num\n");
         }
        $num--;
    }
?>
