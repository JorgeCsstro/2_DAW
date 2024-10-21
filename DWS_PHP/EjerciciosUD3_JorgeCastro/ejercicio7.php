<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        7. Calcula, dada la fecha y hora actual y la fecha y hora deseada, cuántas horas y minutos quedan
        para dicho momento.
    */

    // Hora de España
    date_default_timezone_set("Europe/Madrid");

    // Comprobación si la hora está correcta
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

    // Array con la hora, minuto y segundo
    $hora = explode(":", $r);

    // Hora actual
    $hora_actual = date('H');
    $minuto_actual = date('i');
    $segundo_actual = date('s');

    if (validaHora($hora[0], $hora[1], $hora[2])) {
        
        // Para calcular el tiempo que falta, y si la hora puesta es mayor a la actual le suma 24 para que ponga las horas que quedan
        // NOTA: No me ha salido bien completamente
        if ($hora[0] > $hora_actual 
        || $hora[0] = $hora_actual && $hora[1] > $minuto_actual
        || $hora[0] = $hora_actual && $hora[1] = $minuto_actual && $hora[2] > $segundo_actual) {
            
            $horas =  $hora_actual + 24 - $hora[0];
            $minutos = $minuto_actual - $hora[1];
            $segundos = $segundo_actual - $hora[2];
        }else{
            
            $horas = $hora[0] - $hora_actual;
            $minutos = $hora[1] - $minuto_actual;
            $segundos = $hora[2] - $segundo_actual;
        }

        // Imprime resultado
        printf("Quedan: %02d:%02d:%02d\n", $horas, $minutos, $segundos);

    } else {
        // Imprime error
        echo "La hora no es válida.\n";
    }
?>
