<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    /*
        3. Escribe un programa que calcule la media aritmética de 7 notas y la muestre junto con su
        correspondencia en el boletín que has realizado en el ejercicio anterior
    */

    function printArr($arr){

        print("Las notas són: [");
        for ($i=0; $i < count($arr)-1; $i++) { 
            
            print($arr[$i] . ", ");

        }
        print($arr[count($arr)-1] . "]\n");
    }
    
    // random de notas
    $notasArr =   [rand(0,10), rand(0,10), rand(0,10), rand(0,10), rand(0,10), rand(0,10), rand(0,10)];

    $total = 0;

    // 
    for ($i=0; $i < count($notasArr); $i++) { 
        
        $total += $notasArr[$i];

    }

    $media = $total / count($notasArr);

    // Imprime resultados 
    printArr($notasArr);
    print("La media es: $media\n");

?>
