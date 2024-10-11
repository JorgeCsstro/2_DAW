<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    $num = readline("Dame un número: ");

    if ($num%2 == 0 && $num%3 == 0) {
        print("El número es par y divisible entre 3\n");

    }elseif ($num%2 == 0) {
        print("El número es par\n");

    }elseif ($num%3 == 0) {
        print("El número es divisible entre 3\n");

    }else {
        print("Ninguna de las soluciones posibles\n");

    }
?>
