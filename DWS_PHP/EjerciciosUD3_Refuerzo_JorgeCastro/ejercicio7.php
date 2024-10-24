<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    /*
        7. Define tres arrays de 20 números enteros cada uno, con nombres “numero”, “cuadrado” y
        “cubo”. Carga el array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado” se
        deben almacenar los cuadrados de los valores que hay en el array “numero”. En el array “cubo”
        se deben almacenar los cubos de los valores que hay en “numero”. A continuación, muestra el
        contenido de los tres arrays dispuesto en tres columnas
    */
    
    $numeros =  [rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100), 
                rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100), 
                rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100), 
                rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100)];

    $cuadrado = [];

    $cubo = [];

    for ($i=0; $i < count($numeros); $i++) { 
        
        $cua = $numeros[$i] * $numeros[$i];

        $cuadrado[] = $cua;

    }

    for ($i=0; $i < count($numeros); $i++) { 
        
        $cub = $numeros[$i] * $numeros[$i] * $numeros[$i];

        $cubo[] = $cub;

    }

    // He encontrado nuevas funciones para imprimir: str_pad añade un padding entre strings / str_repeat repite un string durante x veces
    echo str_pad("Numeros", 15) . str_pad("Cuadrado", 15) . str_pad("Cubo", 15) . "\n";
    echo str_repeat("-", 45) . "\n";

    // Pon los datos en las columnas
    for ($i = 0; $i < count($numeros); $i++) {
        echo str_pad($numeros[$i], 15) . str_pad($cuadrado[$i], 15) . str_pad($cubo[$i], 15) . "\n";
    }



?>
