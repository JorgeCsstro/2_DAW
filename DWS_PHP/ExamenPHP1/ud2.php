<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    // readline coje lo que pones en terminal

    $nombre = readline('Dame un nombre: ');

    // Ejemplo de operacion

    $num1 - $num2;

    // Redondear

    $redondeado = round($num1);

    // Crear array a partir de un string

    $num = readline("Dame 5 números separados por espacios: ");
    $numArray = explode(" ", $num);

    $sum = 0;

    // Contar con foreach
    foreach ($numArray as $n) {
        $sum += $n;
    }

    // sort y rsort de array
    sort($numArray);
    rsort($numArray);

    // dia de hoy

    $hoy = date("d");

    // Random

    $rando = rand(10, 90);

?>