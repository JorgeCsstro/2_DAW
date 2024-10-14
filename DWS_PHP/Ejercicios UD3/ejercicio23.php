<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    /*
        23. Dado un vector asociativo de trabajadores con su salario creado solicitando al usuario el nombre
        y salario de cada trabajador, crea usando funciones el salario máximo, el salario mínimo y el
        salario medio.
    */

    $empresa = [];

    $empl = readline("Dame los nombres de los empleados con su salario (ej: Juan-3000, Fran-2400, etc): ");

    // Creo un array separando por los ", "
    $empleados = explode(", ", $empl);
    
    foreach ($empleados as $empleado) {
        
        // Crear un array temporal con el nombre del empleado y su salario
        list($emp, $salario) = explode("-", $empleado);
    
        // Guarda los datos de la lista temporal en el array empresa
        $empresa[$emp] = $salario;
    }
    
    // Coge todos los salarios y los guarda en un array
    $salarios = array_values($empresa);
    
    // Coge el salario máximo y mínimo del array
    $max = max($salarios);
    $min = min($salarios);

    // Hace la media sumando todos los salarios del array y dividiendo por cuantos salarios tiene
    $media = array_sum($salarios) / count($salarios);
    
    // Imprime los resultados
    print("El salario máximo es: $max\n");
    print("El salario mínimo es: $min\n");
    print("El salario medio es: $media\n");

?>

