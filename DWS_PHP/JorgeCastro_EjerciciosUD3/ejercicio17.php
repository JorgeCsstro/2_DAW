<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    /*
        17. Realiza un programa que diga si un número introducido por teclado es par y/o divisible entre 3
    */

    $num = readline("Dame un número: ");

    // Comprobaciones y imprir resultados
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
