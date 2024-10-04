<?php 

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
     */
    
    $num1 = readline('Dame el primer número: ');
    $num2 = readline('Dame el segundo número: ');
    
    $suma = $num1 . "+" . $num2 . " = " . $num1 + $num2;
    $resta = $num1 . "-" . $num2 . " = " . $num1 - $num2;
    $multi = $num1 . "*" . $num2 . " = " . $num1 * $num2;
    $div = $num1 . "/" . $num2 . " = " . $num1 / $num2;
    
    print "Los número introducidos son: $num1 y $num2\n" . "Suma: $suma\n" . "Resta: $resta\n" . "Multiplicación: $multi\n" . "División: $div\n";
    
?>