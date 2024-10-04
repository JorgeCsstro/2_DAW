<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    $pesetas = readline("Dame una cantidad de Pesetas: ");

    $conversion = $pesetas / 166.386;

    print($pesetas . " pesetas son " . $conversion . "€\n");

?>