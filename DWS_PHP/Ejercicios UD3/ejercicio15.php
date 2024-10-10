<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    function permutaciones($V){

        $rever = array_reverse($V);

        print("El array volteado es: [");
        for ($i=0; $i < count($rever)-1; $i++) { 
            
            print($rever[$i] . ", ");

        }
        print($rever[count($rever)-1] . "]\n");
    }

    
    $num = readline("Dame los números que quieras separados por espacios: ");

    $vec = explode(" ", $num);

    permutaciones($vec);

?>
