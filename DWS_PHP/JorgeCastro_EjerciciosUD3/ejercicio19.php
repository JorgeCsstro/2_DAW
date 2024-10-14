<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    /*
        19. Realiza un programa que nos diga cuántos dígitos tiene un número dado
    */

    $num = readline("Dame un número: ");

    // Divide el string y lo pone en un array
    $numArr = str_split($num);

    // Imprime los resultados
    print("Los número tiene: " . count($numArr) . " dígitos\n");
?>
