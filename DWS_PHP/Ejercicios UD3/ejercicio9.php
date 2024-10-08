<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    $rando = rand(1,15);

    $num = $rando;

    for ($i=$rando-1; $i > 1; $i--) { 
        
        $num = $num * $i;

    }

    print("El factorial de $rando = $num \n");

?>
