<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    /*
        20. Elabora un programa que lea un número entero y escriba el número resultante de invertir el
        orden de sus cifras. Puedes usar la función creada para el ejercicio 19
    */

    $num = readline("Dame un número: ");

    // Voltea el string de los números
    $rever = strrev($num);

    // Imprime los resultados
    print("Los número al revés es: $rever \n");
?>
