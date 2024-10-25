<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    /*
        6. Realiza un programa que pida 8 números enteros, los almacene en un vector junto con la
        palabra “par” o “impar” según proceda y los muestre. Además debe indicar la cantidad de
        números en cada caso y el porcentaje de pares e impares.
    */
    
    $rea = readline("Dime 8 números separados por espacios: ");

    $numArr = explode(" ", $rea);

    for ($i=0; $i < count($numArr); $i++) {
        // Para saber si es impar o par
        if ($numArr[$i] % 2) {
            print("Número $i: es IMPAR\n");
        }else{
            print("Número $i: es PAR\n");
        }
    }

    

?>
