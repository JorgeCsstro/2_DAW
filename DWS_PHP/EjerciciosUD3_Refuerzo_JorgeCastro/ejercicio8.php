<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    /*
        8. Leer por teclado y rellenar dos vectores de 10 números enteros y mezclarlos en un tercer vector
        de la forma: el 1º de A, el 1º de B, el 2º de A, el 2º de B, etc.
    */

    function printArr($arr){

        print("El vector es: [");
        for ($i=0; $i < count($arr)-1; $i++) { 
            
            print($arr[$i] . ", ");

        }
        print($arr[count($arr)-1] . "]\n");
    }

    $reaA = readline("Dime 10 números separados por espacios (Vector A): ");

    $vecA = explode(" ", $reaA);

    $reaB = readline("Dime 10 números separados por espacios (Vector B): ");

    $vecB = explode(" ", $reaB);

    $vecC = [];

    for ($i = 0; $i < 10; $i++) {
        $vecC[] = $vecA[$i];    // Agregar el elemento de A
        $vecC[] = $vecB[$i];    // Agregar el elemento de B
    }

    echo "El vector C es:\n";
    printArr($vecC);



?>
