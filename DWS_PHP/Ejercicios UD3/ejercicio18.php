<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    /*
        18. Escribe un programa que diga cuál es la cifra que está en el centro (o las dos del centro si el
        número de cifras es par) de un número entero introducido por teclado
    */

    $num = readline("Dame un número: ");

    // Divide el string y lo pone en un array
    $numArr = str_split($num);

    // Para poner los números del medio si hay pares o el número del medio si hay impares
    if (count($numArr)%2 == 0) {
        print("Los números del medio son: " . $numArr[(count($numArr) / 2 - 1)] . " y " . $numArr[(count($numArr) / 2)] . "\n");

    }else {
        print("El número del medio es: " . $numArr[(count($numArr) / 2 - 0.5)]  . "\n");

    }
?>
