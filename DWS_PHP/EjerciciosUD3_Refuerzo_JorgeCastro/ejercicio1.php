<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    /*
        1. Escribe un programa en que dado un número del 1 a 7 escriba el correspondiente nombre del
        día de la semana.
    */

    $rando = rand(1, 7);

    switch ($rando) {
        case 1:
            print("Lunes");
            break;
        case 2:
            print("Martes");
            break;
        case 3:
            print("Miércoles");
            break;
        case 4:
            print("Jueves");
            break;
        case 5:
            print("Viernes");
            break;
        case 6:
            print("Sábado");
            break;
        case 7:
            print("Domingo");
            break;
    }

?>
