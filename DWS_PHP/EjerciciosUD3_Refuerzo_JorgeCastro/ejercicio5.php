<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    /*
        5. Realiza el control de acceso a una caja fuerte. La combinación será un número de 4 cifras. El
        programa nos pedirá la combinación para abrirla. Si no acertamos, se nos mostrará el mensaje
        “Lo siento, esa no es la combinación” y si acertamos se nos dirá “La caja fuerte se ha abierto
        satisfactoriamente”. Tendremos cuatro oportunidades para abrir la caja fuerte.
    */
    
    // Random de combinación
    $numArr =   [rand(0,9), rand(0,9), rand(0,9), rand(0,9)];

    $combinacion = implode("", $numArr);

    // Imprime resultados 
    print("Combinación: $combinacion\n");
    
    for ($i=0; $i < 4; $i++) { 
        $combi = readline("Dime la clave: ");

        if ($combi == $combinacion) {
            print("La caja fuerte se ha abierto satisfactoriamente\n");
            $i = 4;
        }else{
            print("Lo siento, esa no es la combinación\n");
        }
    }

    

?>
