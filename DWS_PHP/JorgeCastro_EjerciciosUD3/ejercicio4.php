<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        4. Elabora un programa para determinar si una hora leída en la forma horas, minutos y segundos
        está correctamente expresada.
    */

    // Comprobación de la hora
    function validaHora($horas, $minutos, $segundos) {
        if ($horas < 0 || $horas > 23 || 
        $minutos < 0 || $minutos > 59 || 
        $segundos < 0 || $segundos > 59) {
            return false;
        }else{
            return true;
        }
    }
    
    $r = readline("Dime una hora separada por ':' (ej: 06:54:23): ");

    // Separa la hora en un array
    $hora = explode(":", $r);
    
    // Devolver resultados
    if (validaHora($hora[0], $hora[1], $hora[2])) {
        // Imprime resultado
        echo "La hora es válida.\n";

    } else {
        // Imprime error
        echo "La hora no es válida.\n";

    }
    ?>