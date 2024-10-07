<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
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

    $hora = explode(":", $r);
    
    if (validaHora($hora[0], $hora[1], $hora[2])) {
        echo "La hora es válida.\n";
    } else {
        echo "La hora no es válida.\n";
    }
    ?>