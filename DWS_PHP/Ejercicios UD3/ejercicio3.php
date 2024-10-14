<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        3. Crea un programa que reciba una hora expresada en segundos transcurridos desde las 12 de la
        noche y la convierta en horas, minutos y segundos
    */

    $r = readline("Dame una hora en segundos (A partir de las 00:00): ");
    $horas = 0;
    $minutos = 0;
    $segundos = 0;

    // Pasa los segundos a horas y minutos
    while($r >= 3600) {    
        $horas++;
        $r = $r - 3600;
    }

    while ($r >= 60) {
        $minutos++;
        $r = $r - 60;
    }

    $segundos = $r;

    // Imprime resultado
    printf("%02d:%02d:%02d\n", $horas, $minutos, $segundos)

?>