<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        14. Escribe una función que calcule todas las potencias de un número hasta llegar al exponente
        indicado, las almacene en un vector y muestre el resultado de cada potencia indicando además
        la suma de todas las potencias incluyendo la del exponente indicado.
    */

    // Funcion para elevar numeros
    function elevar($base, $expo){

        $elevado = 1;
        if ($expo == 0) {
            return $elevado;
        }else {
            $elevado = $base;
            while ($expo > 1) {
                $elevado = $elevado * $base;
                $expo--;
            }
            return $elevado;
        }
    }

    // Elevar el número por todos los exponentes hasta llegar al que has indicado
    function elevarTodo($base, $expo){

        $todasPotencias = [];
        $suma = 0;

        for ($i=0; $i <= $expo; $i++) { 
        
            $elevado = elevar($base, $i);
            
            array_push($todasPotencias, $elevado);
    
            // Imprimir base ^ potencia
            print("$base ^ $i = " . $todasPotencias[$i] . "\n");
    
            $suma += $todasPotencias[$i];
    
        }

        // Imprimir suma de todas la potencias
        print("Suma de todas las potencias: $suma\n");

    }

    $num = readline("Dame 2 números separados por espacios (1º el que quieres elevar y 2º el valor por el que elevas): ");

    $numArr = explode(" ", $num);

    $base = floor($numArr[0]);
    $expo = floor($numArr[1]);

    // Imprime los resultados
    elevarTodo($base, $expo);

?>
