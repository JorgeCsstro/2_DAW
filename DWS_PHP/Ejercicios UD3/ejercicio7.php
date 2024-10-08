<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    date_default_timezone_set("Europe/Madrid");

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

    $hora_actual = date('H');
    $minuto_actual = date('i');
    $segundo_actual = date('s');

    if (validaHora($hora[0], $hora[1], $hora[2])) {
        
        if ($hora[0] > $hora_actual 
        || $hora[0] = $hora_actual && $hora[1] > $minuto_actual
        || $hora[0] = $hora_actual && $hora[1] = $minuto_actual && $hora[2] > $segundo_actual) {
            
            $horas = $hora[0] - $hora_actual;
            $minutos = $hora[1] - $minuto_actual;
            $segundos = $hora[2] - $segundo_actual;
        }else{
            
            $horas = $hora_actual - $hora[0];
            $minutos = $minuto_actual - $hora[1];
            $segundos = $segundo_actual - $hora[2];
        }

        printf("Quedan: %02d:%02d:%02d\n", $horas, $minutos, $segundos);

    } else {
        echo "La hora no es válida.\n";
    }
?>
