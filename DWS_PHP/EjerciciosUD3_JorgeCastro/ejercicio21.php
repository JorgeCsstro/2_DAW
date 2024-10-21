<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        21. Escribe un programa que diga cuál es la penúltima cifra de un número entero introducido por
        teclado. Se permiten números de hasta 5 cifras. Puedes usar la función creada para el ejercicio 19
    */
    
    $num = readline("Dame un número: ");

    // Divide el string y lo pone en un array
    $numArr = str_split($num);

    // Comprueba que si hay "penúltimo" número o es menor que 5 imprima el penúltimo numero
    if (count($numArr) > 5 || count($numArr) == 1) {
        // Imprime error
        print("No es posible el número \n");

    }else{
        // Coge el penúltimo número
        $penu = $numArr[count($numArr)-2];

        // Imprime el penúltimo número
        print("El penúltimo número es $penu\n");

    }
?>
