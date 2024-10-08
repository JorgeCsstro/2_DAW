<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
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

    echo comprobacion($r);

    ?>