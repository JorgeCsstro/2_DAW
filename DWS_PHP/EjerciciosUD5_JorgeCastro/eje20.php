<?php

/**
 * @author Jorge Castro
 */

/*
    20. Realiza un programa que pida una hora por teclado y que muestre luego el saludo, esto es:
    buenos días, buenas tardes o buenas noches según la hora. Se utilizarán los tramos de 6 a 12, de
    13 a 20 y de 21 a 5 respectivamente. Sólo se tienen en cuenta las horas, los minutos no se deben
    introducir por teclado.
*/

    // Solicita la hora al usuario
    echo "Introduce una hora (0-23): ";
    $hora = trim(fgets(STDIN));

    // Verifica que la hora es válida
    if (is_numeric($hora) && $hora >= 0 && $hora <= 23) {
        if ($hora >= 6 && $hora <= 12) {
            echo "Buenos días\n";
        } elseif ($hora >= 13 && $hora <= 20) {
            echo "Buenas tardes\n";
        } else {
            echo "Buenas noches\n";
        }
    } else {
        echo "Dame una hora valida entre 0 y 23\n";
    }
?>
