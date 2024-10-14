<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        6. Escribe un programa que lea tres números positivos y compruebe si son iguales. Por ejemplo:
        * Si la entrada fuese 5 5 5, la salida debería ser “hay tres números iguales a 5“.
        * Si la entrada fuese 4 6 4, la salida debería ser “hay dos números iguales a 4“.
        * Si la entrada fuese 0 1 2, la salida debería ser “no hay números iguales“
    */

    // Comprobar si los números son iguales o no y devolver resultados
    function comprobacion($numeros) {
        $cont = 0;
        $igual = 0;

        $n = explode(" ", $numeros);

        if ($n[0] == $n[1]) {
            $igual = $n[0];
            $cont++;
        }

        if ($n[0] == $n[2]) {
            $igual = $n[0];
            $cont++;
        }

        if ($n[1] == $n[2]) {
            $igual = $n[1];
            $cont++;
        }

        if ($cont == 0) {
            return "No hay números iguales\n";
        }elseif ($cont == 1) {
            return "Hay dos números iguales a " . $igual . "\n";
        }else{
            return "Hay tres números iguales a " . $igual . "\n";
        }

    }
    
    $r = readline("Dime 3 númernos positivos separados por espacios: ");

    // Imprime resultado
    print(comprobacion($r));

    ?>