<?php 

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
     */

    $var = readline("Dame 5 números separados por espacios: ");
    $v = explode(" ", $var);

    $sum = 0;

    foreach ($v as $valor) {
        $sum += $valor;
    }

    $media = $sum / 5;
    $redondeado = round($media);

    print "Media sin redondear: $media\n" . "Media redondeada: $redondeado\n";

    //$num1 = readline('Dame el 1º número: ');
    //$num2 = readline('Dame el 2º número: ');
    //$num3 = readline('Dame el 3º número: ');
    //$num4 = readline('Dame el 4º número: ');
    //$num5 = readline('Dame el 5º número: ');
    //$media = ($num1 + $num2 + $num3 + $num4 + $num5) / 5; 
    //$redondeado = round($media);

    //print "Los números introducidos son: $num1, $num2, $num3, $num4, $num5\n" . "Media sin redondear: $media\n" . "Media redondeada: $redondeado\n";

?>