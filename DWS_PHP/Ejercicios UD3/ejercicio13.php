<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    function elevar($base, $expo){

        $elevado = $base;
        while ($expo > 1) {
            $elevado = $elevado * $base;
            $expo--;
        }
        return $elevado;

    }

    $num = readline("Dame 2 números separados por espacios (1º el que quieres elevar y 2º el valor por el que elevas): ");

    $numArr = explode(" ", $num);

    $base = floor($numArr[0]);
    $expo = floor($numArr[1]);

    $elevado = elevar($base, $expo);

    print("$base ^ $expo = $elevado\n");

?>
