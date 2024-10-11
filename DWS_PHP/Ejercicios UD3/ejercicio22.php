<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    function printArr($arr){

        print("Los numeros són: [");
        for ($i=0; $i < count($arr)-1; $i++) { 
            
            print($arr[$i] . ", ");

        }
        print($arr[count($arr)-1] . "]\n");
    }
    
    $numArr =   [rand(-10,10), rand(-10,10), rand(-10,10), rand(-10,10), 
                rand(-10,10), rand(-10,10), rand(-10,10), 
                rand(-10,10), rand(-10,10), rand(-10,10)];
    
    $positivos = 0;
    $negativos = 0;

    for ($i=0; $i < count($numArr); $i++) { 
        
        if ($numArr[$i] < 0) {
            $negativos++;

        }else{
            $positivos++;

        }
    }

    $porcentajePositivo = $positivos / count($numArr) * 100;
    $porcentajeNegativo = $negativos / count($numArr) * 100;

    printArr($numArr);

    print("Hay $positivos positivos y $negativos negativos\n");

    print("Los porcentajes son: $porcentajePositivo% positivos y $porcentajeNegativo% negativos\n");


?>
