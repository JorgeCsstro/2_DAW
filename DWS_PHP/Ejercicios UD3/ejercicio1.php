<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    $char = readline('Dame un carácter: ');

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