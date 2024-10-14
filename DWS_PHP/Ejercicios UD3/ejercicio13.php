<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        13. Escribe una función que calcule A elevado a B, siendo A y B números enteros.
    */

    // Elevar la base por el exponente pasado
    function elevar($base, $expo){

        $elevado = $base;
        while ($expo > 1) {
            $elevado = $elevado * $base;
            $expo--;
        }
        return $elevado;

    }

    $num = readline("Dame 2 números separados por espacios (1º el que quieres elevar y 2º el valor por el que elevas): ");

    // Separa ambos numeros y los añade a un array
    $numArr = explode(" ", $num);

    // Los pasa a enteros
    $base = floor($numArr[0]);
    $expo = floor($numArr[1]);

    // Los eleva
    $elevado = elevar($base, $expo);

    // Imprime resultado
    print("$base ^ $expo = $elevado\n");

?>
