<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    /*
        1. Elabora un programa que dado un carácter determine si es:
            1. una letra mayúscula
            2. una letra minúscula
            3. un carácter numérico
            4. un carácter blanco
            5. un carácter de puntuación
            6. un carácter especial
    */

    // Caracter a comprobar
    $char = readline('Dame un carácter: ');

    // Comrobaciones de los carácteres y imprime resultado
    if (ctype_lower($char)) {
        print("Soy un carácter de letra Minúscula\n");

    }elseif (ctype_upper($char)) {
        print ("Soy un carácter de letra Mayúcula\n");

    }elseif (ctype_digit($char)) {
        print ("Soy un carácter numérico\n");

    }elseif (ctype_space($char)) {
        print ("Soy un carácter blanco\n");

    }elseif (preg_match('/[^a-zA-Z0-9.:,;]/', $char) > 0) {
        print ("Soy un carácter especial\n");

    }elseif (ctype_punct($char)) {
        print ("Soy un carácter de puntuación\n");

    }
?>