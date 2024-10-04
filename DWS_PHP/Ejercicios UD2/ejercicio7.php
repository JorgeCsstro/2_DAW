<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    $num = readline("Dame 3 números separados por espacios: ");
    $numArray = explode(" ", $num);

    rsort($numArray);

    if($numArray[0] == $numArray[1] && $numArray[0] == $numArray[2]){
        print("Todos los números son iguales: $numArray[0] = $numArray[1] = $numArray[2]\n");

    }elseif ($numArray[0] == $numArray[1] && $numArray[0] > $numArray[2]) {
        print("Los 2 primeros números son iguales: $numArray[0] = $numArray[1] > $numArray[2]\n");

    }elseif ($numArray[0] > $numArray[1] && $numArray[1] == $numArray[2]) {
        print("Los 2 últimos números son iguales: $numArray[0] > $numArray[1] = $numArray[2]\n");
    
    }else{
        print("$numArray[0] > $numArray[1] > $numArray[2]\n");

    }

?>