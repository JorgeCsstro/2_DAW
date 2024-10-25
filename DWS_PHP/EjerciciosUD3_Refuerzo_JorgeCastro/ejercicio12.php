<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

    /*
        12. Crear un programa para introducir números por teclado mientras su suma no alcance o iguale a
        1000. Cuando ésto ocurra, debes mostrar los números introducidos, cuántos son, el total de la
        suma y la media de todos ellos.
    */

    $todos = [];
    $suma = 0;
    $media = 0;

    while ($suma <= 1000) {
        $newNum = readline("Dame algún número: ");
        // Sumo el número nuevo
        $suma += $newNum;
        // Si no pasa de 1000 lo pondrá en el array
        if ($suma <= 1000) {
            $todos[] = $newNum;
        
        // Y si se pasa de 1000 imprimirá todos los datos
        }else{
            $suma -= $newNum;
            print("Los números introducidos son: ");
            for ($i=0; $i < count($todos); $i++) { 
                print($todos[$i] . " ");
            }

            print("\nHay: " . count($todos) . " números\n");

            print("La suma de los números es: $suma\n");

            $media = $suma / count($todos);
            print("La media de todos los números es: $media\n");

            // Para salir del while
            $suma = 9999;

        }
    }

?>