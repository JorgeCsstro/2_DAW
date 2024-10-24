<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    /*
        4. Muestra los múltiplos de 5 entre 0 y 100 usando:
            a) bucle for
            b) bucle while
            c) bucle do-while
    */

    $i = 0;

    print("**BUCLE FOR**\n");

    for ($i=0; $i <= 100; $i++) { 
        
        $multi = 5 * $i;

        print("5 * $i = $multi\n");

    }

    $i = 0;

    print("**BUCLE WHILE**\n");

    while ($i <= 100) {

        $multi = 5 * $i;

        print("5 * $i = $multi\n");

        $i++;

    }

    $i = 0;

    print("**BUCLE DO-WHILE**\n");

    do {
        $multi = 5 * $i;

        print("5 * $i = $multi\n");

        $i++;
    } while ($i <= 100);

?>
