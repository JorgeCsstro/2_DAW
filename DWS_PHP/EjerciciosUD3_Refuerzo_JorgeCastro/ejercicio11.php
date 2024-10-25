<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

    /*
        11. Crear y rellenar una tabla de tamaño 10x10, mostrar la suma de cada fila y de cada columna
    */

    // Genero tabla
    $tabla = [];
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
            $tabla[$i][$j] = rand(1, 10);
        }
    }

    // Cuento las filas y columnas
    $numFilas = count($tabla);
    $numColumnas = count($tabla[0]);

    // Imprimir la tabla con las sumas de las filas
    for ($i = 0; $i < $numFilas; $i++) {
        $sumaFila = 0;
        for ($j = 0; $j < $numColumnas; $j++) {
            print($tabla[$i][$j] . "\t"); // Pongo tabulacion en cada fila para que no se quede distorsionada
            $sumaFila += $tabla[$i][$j];
        }
        print("| $sumaFila\n");
    }

    // Imprimir separador para las sumas de columnas
    for ($j = 0; $j < $numColumnas; $j++) {
        print("----\t");
    }
    print("\n");

    // Imprimir el resultado de la suma de la columna
    for ($j = 0; $j < $numColumnas; $j++) {
        $sumaColumna = 0;
        for ($i = 0; $i < $numFilas; $i++) {
            $sumaColumna += $tabla[$i][$j];
        }
        print($sumaColumna . "\t");
    }
    print("\n");

?>