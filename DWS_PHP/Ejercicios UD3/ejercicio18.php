<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    $num = readline("Dame un número: ");

    $numArr = str_split($num);

    if (count($numArr)%2 == 0) {
        print("Los números del medio son: " . $numArr[(count($numArr) / 2 - 1)] . " y " . $numArr[(count($numArr) / 2)] . "\n");

    }else {
        
        print("El número del medio es: " . $numArr[(count($numArr) / 2 - 0.5)]  . "\n");

    }
?>
