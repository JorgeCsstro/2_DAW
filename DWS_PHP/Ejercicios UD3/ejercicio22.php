<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        22. Escribe un programa que lea una lista de diez números y determine cuántos son positivos, y
        cuántos son negativos (muestra los números, la cantidad de positivos y negativos y el porcentaje
        de cada grupo)
    */

    // Imprime el array en una linea de una forma más bonita
    function printArr($arr){

        print("Los números són: [");
        for ($i=0; $i < count($arr)-1; $i++) { 
            
            print($arr[$i] . ", ");

        }
        print($arr[count($arr)-1] . "]\n");
    }
    
    // random de números
    $numArr =   [rand(-10,10), rand(-10,10), rand(-10,10), rand(-10,10), 
                rand(-10,10), rand(-10,10), rand(-10,10), 
                rand(-10,10), rand(-10,10), rand(-10,10)];
    
    $positivos = 0;
    $negativos = 0;

    // Para contar los positivos y negativos
    for ($i=0; $i < count($numArr); $i++) { 
        
        if ($numArr[$i] < 0) {
            $negativos++;

        }else{
            $positivos++;

        }
    }

    // Porcentaje de negativos y positivos
    $porcentajePositivo = $positivos / count($numArr) * 100;
    $porcentajeNegativo = $negativos / count($numArr) * 100;

    // Imprime resultados 
    printArr($numArr);
    print("Hay $positivos positivos y $negativos negativos\n");
    print("Los porcentajes son: $porcentajePositivo% positivos y $porcentajeNegativo% negativos\n");


?>
