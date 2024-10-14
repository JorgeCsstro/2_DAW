<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        5. Diseña un programa que determine la cantidad total a pagar por una llamada telefónica de
        acuerdo a las siguientes premisas: Toda llamada que dure menos de 3 minutos tiene un coste de
        10 céntimos. Cada minuto adicional a partir de los 3 primeros es un paso de contador y cuesta 5
        céntimos.
    */

    // Funcion para el dinero que cuesta la llamada
    function llamadaCoste($minutos) {
        $coste = 0;
        $cont = 0;

        if ($minutos >= 3) {
            $coste = ($minutos - 3) * 5 + 10;
            return $coste;

        }else{
            $coste = 10;
            return $coste;

        }
    }
    
    $r = readline("Dime cuantos minutos has estado en la llamada: ");

    // Imprime resultado
    print("Te ha costado la llamada: " . llamadaCoste($r) . " céntimos\n");

    ?>