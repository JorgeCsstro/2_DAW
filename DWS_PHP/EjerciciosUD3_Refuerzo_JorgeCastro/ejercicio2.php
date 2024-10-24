<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    /*
        2. Escribe un programa que dada una nota (entera) indique su correspondencia en el boletín
        (Ejemplo 5 sería SUFICIENTE)
    */

    $nota = readline("Dime una nota: ");

    if ($nota <= 4) {
        print("INSUFICIENTE\n");
    }elseif ($nota == 5) {
        print("SUFICIENTE\n");
    }elseif ($nota == 6) {
        print("BIEN\n");
    }elseif ($nota == 7 || $nota == 8) {
        print("NOTABLE\n");
    }elseif ($nota == 9) {
        print("SOBRESALIENTE\n");
    }else{
        print("EXCELENTE\n");
    }

?>
