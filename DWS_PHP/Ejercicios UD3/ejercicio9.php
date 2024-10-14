<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        9. Genera un número entre 1 y 15 y calcula su factorial. Nota: El factorial de un número es la
        multiplicación de él mismo con sus anteriores. Ejemplo 3!=3*2*1=6
    */

    // Genera número random
    $rando = rand(1,15);

    $num = $rando;

    // Calcula factorial
    for ($i=$rando-1; $i > 1; $i--) { 
        
        $num = $num * $i;

    }

    // Imprime resultado
    print("El factorial de $rando = $num \n");

?>
