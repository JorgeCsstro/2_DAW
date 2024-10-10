<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

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

    function elevarTodo($base, $expo){

        $todasPotencias = [];
        $suma = 0;

        for ($i=0; $i <= $expo; $i++) { 
        
            $elevado = elevar($base, $i);
            
            array_push($todasPotencias, $elevado);
    
            print("$base ^ $i = " . $todasPotencias[$i] . "\n");
    
            $suma += $todasPotencias[$i];
    
        }

        print("Suma de todas las potencias: $suma\n");

    }

    $num = readline("Dame 2 números separados por espacios (1º el que quieres elevar y 2º el valor por el que elevas): ");

    $numArr = explode(" ", $num);

    $base = floor($numArr[0]);
    $expo = floor($numArr[1]);

    elevarTodo($base, $expo);

?>
