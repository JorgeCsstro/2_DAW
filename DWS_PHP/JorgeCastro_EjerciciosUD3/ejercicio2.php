<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        2. Dada la fecha del sistema, indicar las horas, minutos y segundos junto con el día de la semana
    */

    // Pongo zona horaria en España
    date_default_timezone_set("Europe/Madrid");

    // Dia y hora actual
    $hoy = date("l, H:i:s");
    
    // Imprime resultado
    print("$hoy\n");

?>