<?php 

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    $num = readline("Dame 5 números separados por espacios: ");
    $numArray = explode(" ", $num);

    $sum = 0;

    foreach ($numArray as $n) {
        $sum += $n;
    }

    $media = $sum / 5;
    $redondeado = round($media);

    print "Media sin redondear: $media\n" . "Media redondeada: $redondeado\n";

?>