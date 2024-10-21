<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        10. Genera un número entre 1 y 20 y calcula su sumatorio. Nota: El sumatorio de un número es la
        suma de él mismo con sus anteriores. Ejemplo ∑3=3+2+1=6
    */

    // Genera número random
    $rando = rand(1,20);

    $num = $rando;

    // Calcula sumatorio
    for ($i=$rando-1; $i >= 1; $i--) { 
        
        $num = $num + $i;

    }

    print("El sumatorio de $rando = $num \n");

?>
