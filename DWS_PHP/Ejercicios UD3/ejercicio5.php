<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
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

    echo "Te ha costado la llamada: " . llamadaCoste($r) . " céntimos\n";

    ?>