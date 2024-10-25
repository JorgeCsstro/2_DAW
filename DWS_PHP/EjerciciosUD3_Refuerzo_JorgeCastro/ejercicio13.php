<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

    /*
        13. Diseñar la función operaMatriz, a la que se le pasa dos matrices de enteros positivos mayores de
        0 y la operación que se desea realizar: sumar, restar, multiplicar o dividir (mediante un carácter:
        's', 'r', 'm', 'd'). La función debe imprimir las matrices originales, indicar la operación a realizar y
        la matriz con los resultados
    */

    // Funciones de operaciones
    function sumaMatrices($matriz1, $matriz2){
        $resultado = [];
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $resultado[$i][$j] = $matriz1[$i][$j] + $matriz2[$i][$j];
            }
        }
        return $resultado;
    }

    function restMatrices($matriz1, $matriz2){
        $resultado = [];
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $resultado[$i][$j] = $matriz1[$i][$j] - $matriz2[$i][$j];
            }
        }
        return $resultado;
    }

    function multMatrices($matriz1, $matriz2){
        $resultado = [];
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $resultado[$i][$j] = $matriz1[$i][$j] * $matriz2[$i][$j];
            }
        }
        return $resultado;
    }

    function divMatrices($matriz1, $matriz2){
        $resultado = [];
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $resultado[$i][$j] = $matriz1[$i][$j] / $matriz2[$i][$j];
                $resultado = floor((int)$resultado);
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

    function operaMatriz($matriz1, $matriz2){

        $operador = readline("Dime el operador (s, r, m, d): ");

        switch ($operador) {
            case 's':
                print("\nMatriz1 es:\n");
                printMatriz($matriz1);
                print("\nMatriz2 es:\n");
                printMatriz($matriz2);

                $suma = sumaMatrices($matriz1, $matriz2);
                print("\n Suma de las matrizes es:\n");
                printMatriz($suma);
                break;

            case 'r':
                print("\nMatriz1 es:\n");
                printMatriz($matriz1);
                print("\nMatriz2 es:\n");
                printMatriz($matriz2);

                $rest = restMatrices($matriz1, $matriz2);
                print("\n Resta de las matrizes es:\n");
                printMatriz($rest);
                break;

            case 'm':
                print("\nMatriz1 es:\n");
                printMatriz($matriz1);
                print("\nMatriz2 es:\n");
                printMatriz($matriz2);

                $mult = multMatrices($matriz1, $matriz2);
                print("\n Multiplicación de las matrizes es:\n");
                printMatriz($mult);
                break;

            case 'd':
                print("\nMatriz1 es:\n");
                printMatriz($matriz1);
                print("\nMatriz2 es:\n");
                printMatriz($matriz2);

                $div = divMatrices($matriz1, $matriz2);
                print("\n División de las matrizes es:\n");
                printMatriz($div);
                break;
            default:
                # code...
                break;
        }

    }

    // Creo ambas matrices
    $matriz1 = [];
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $matriz1[$i][$j] = rand(1, 10);
        }
    }
    $matriz2 = [];
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $matriz2[$i][$j] = rand(1, 10);
        }
    }

    operaMatriz($matriz1, $matriz2);

?>