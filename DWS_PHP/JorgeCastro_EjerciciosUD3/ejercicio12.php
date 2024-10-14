<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        12. Crea un programa para leer las notas de los alumnos de una clase, y que informe del número de
        alumnos cuya nota sea mayor de la media de la clase.
    */

    $notas = readline("Dame las notas de los alumnos separados por comas: ");

    // Separa las notas y las añade a un array
    $notasArr = explode(",", $notas);

    $media = 0;

    $encimaMedia = 0;
    $debajoMedia = 0;

    // Suma todas las notas
    for ($i=0; $i < count($notasArr); $i++) { 
        
        $media += $notasArr[$i];

    }

    // Y hace la media
    $media = $media / count($notasArr);

    // Comprueba los alumos por encima de la media y por debajo de la media
    for ($i=0; $i < count($notasArr); $i++) { 
        
        if ($notasArr[$i] > $media) {
            
            $encimaMedia++;

        }else {

            $debajoMedia++;

        }
    }

    // Imprime resultado
    print("Alumnos por encima de la media: $encimaMedia\n Alumnos por debajo de la media: $debajoMedia\n");
?>
