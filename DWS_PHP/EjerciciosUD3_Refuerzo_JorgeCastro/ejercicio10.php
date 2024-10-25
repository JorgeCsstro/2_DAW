<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

    /*
        10. Crear y rellenar por teclado dos matrices de tamaño 3x3, sumarlas y mostrar su suma.
    */

    // Función para sumar las matrices
    function sumarMatrices($matriz1, $matriz2){
        $resultado = [];
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $resultado[$i][$j] = $matriz1[$i][$j] + $matriz2[$i][$j];
            }
        }
        return $resultado;
    }

    // Función para imprimir la matriz
    function printMatriz($matriz){
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                print($matriz[$i][$j] . " ");
            }
            print("\n");
        }
    }

    // Creo ambas matrices
    $matriz1 = [];
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $matriz1[$i][$j] = readline("Elemento [$i][$j] de matriz1: ");
        }
    }
    $matriz2 = [];
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $matriz2[$i][$j] = readline("Elemento [$i][$j] de matriz2: ");
        }
    }

    $resultado = sumarMatrices($matriz1, $matriz2);

    print("La suma de las matrices es:\n");
    printMatriz($resultado);

?>