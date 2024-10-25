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

    // Pido números para los arrays
    $reaA = readline("Dime 10 números separados por espacios (Vector A): ");
    $arrA = explode(" ", $reaA);

    $reaB = readline("Dime 10 números separados por espacios (Vector B): ");
    $arrB = explode(" ", $reaB);

    $arrC = [];

    // Agrego al arrC datos de ambos array a intervalos (arrA, arrB, arrA, arrB...)
    for ($i = 0; $i < 10; $i++) {
        $arrC[] = $arrA[$i];
        $arrC[] = $arrB[$i];
    }

    echo "El vector C es:\n";
    printArr($arrC);
?>
