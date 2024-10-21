<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        16. Realiza un programa que resuelva una ecuación de primer grado (del tipo 2(ax - b)=0)
    */

    // Función para resolver equación de 1er grado
    function resolverEcuacion($n1, $n2) {
        if ($n1 == 0) {
            if ($n2 == 0) {
                return "La solucion es infinita";
            } else {
                return "Imposible de hacer";
            }
        } else {
            $x = $n2 / $n1;
            return "La solución es: x = " . $x;
        }
    }
    
    $n1 = readline("Dame el número a de la equación: ");
    $n2 = readline("Dame el número b de la equación: ");
    
    // Imprime los resultados
    print(resolverEcuacion($n1, $n2) . "\n");

?>
