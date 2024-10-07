<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    $r = readline("Dame una hora en segundos (A partir de las 00:00): ");
    $horas = 0;
    $minutos = 0;
    $segundos = 0;

    while($r >= 3600) {    
        $horas++;
        $r = $r - 3600;
    }

    while ($r >= 60) {
        $minutos++;
        $r = $r - 60;
    }

    $segundos = $r;

    printf("%02d:%02d:%02d\n", $horas, $minutos, $segundos)

?>