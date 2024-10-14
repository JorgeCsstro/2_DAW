<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        15. Crea una función llamada permutaciones que reciba un vector $V y que cambie la posición de
        los elementos dicho vector haciendo permutaciones. Las permutaciones se harán entre los
        elementos $V[$N-1] y $V[0], $V[$N-2] y $V[1] , $V[$N-3] y $V[2] etc. siendo $N el tamaño
        del vector.
    */

    // Función para imprimir el array volteado
    function permutaciones($V){

        $rever = array_reverse($V);

        print("El array volteado es: [");
        for ($i=0; $i < count($rever)-1; $i++) { 
            
            print($rever[$i] . ", ");

        }
        print($rever[count($rever)-1] . "]\n");
    }

    
    $num = readline("Dame los números que quieras separados por espacios: ");

    // Crea array con los numeros
    $vec = explode(" ", $num);

    // Imprime los resultados
    permutaciones($vec);

?>
