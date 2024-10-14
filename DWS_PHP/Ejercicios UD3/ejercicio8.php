<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        8. Crea la tabla de multiplicar a partir de un número
    */

    $r = readline("Dime un número para hacerte la tabla de multiplicar: ");

    // Crea tabla de multiplicar con un for
    for ($i=1; $i <= 10; $i++) { 
        
        // Imprime resultado
        print("$r * $i = " . $r * $i . "\n");

    }

?>