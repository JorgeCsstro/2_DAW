<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    $hoy = date("d");

    if ($hoy <= 15) {
        print("Primera quincena\n");
    }else {
        print("Segunda quincena\n");
    }

?>