<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    $num = readline("Dame un numero entero: ");

    while ($num >= 0) {
        if ($num%2 != 0){
            print("$num\n");
         }
        $num--;
    }
?>
