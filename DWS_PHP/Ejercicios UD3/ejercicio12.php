<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    $notas = readline("Dame las notas de los alumnos separados por comas: ");

    $notasArr = explode(",", $notas);

    $media = 0;

    $encimaMedia = 0;
    $debajoMedia = 0;

    for ($i=0; $i < count($notasArr); $i++) { 
        
        $media += $notasArr[$i];

    }

    $media = $media / count($notasArr);

    for ($i=0; $i < count($notasArr); $i++) { 
        
        if ($notasArr[$i] > $media) {
            
            $encimaMedia++;

        }else {

            $debajoMedia++;

        }
    }

    print("Alumnos por encima de la media: $encimaMedia\n Alumnos por debajo de la media: $debajoMedia\n");
?>
