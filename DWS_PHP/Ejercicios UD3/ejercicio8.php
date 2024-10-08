<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    $r = readline("Dime un número para hacerte la tabla de multiplicar: ");

    for ($i=1; $i <= 10; $i++) { 
        
        print("$r * $i = " . $r * $i . "\n");

    }

?>