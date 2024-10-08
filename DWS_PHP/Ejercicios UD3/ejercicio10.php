<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    $rando = rand(1,20);

    $num = $rando;

    for ($i=$rando-1; $i >= 1; $i--) { 
        
        $num = $num + $i;

    }

    print("El sumatorio de $rando = $num \n");

?>
