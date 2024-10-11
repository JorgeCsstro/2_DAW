<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    $num = readline("Dame un número: ");

    $numArr = str_split($num);

    if (count($numArr) > 5 || count($numArr) == 1) {
        print("No es posible el número \n");

    }else{
        $penu = $numArr[count($numArr)-2];

        print("El penúltimo número es $penu\n");

    }
?>
