<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    /*
        24. Con los trabajadores del ejercicio anterior, calcular el salario actual y el salario aumentado un
        porcentaje indicado por la variable 
    */

    $empresa = [];

    $empl = readline("Dame los nombres de los empleados con su salario (ej: Juan-3000, Fran-2400, etc): ");
    $porcentaje = readline("Dame el % de aumento (ej: 10 para 10%): ");

    // Creo un arry separando por los ", "
    $empleados = explode(", ", $empl);
    
    foreach ($empleados as $empleado) {
        
        // Crear un array temporal con el nombre del empleado y su salario
        list($emp, $salario) = explode("-", $empleado);
    
        // Guarda los datos de la lista temporal en el array empresa
        $empresa[$emp] = $salario;
    }

    // Recorrer el array de empleados y calcular el salario con aumento
    foreach ($empresa as $emp => $salario) {
        $aumento = $salario * ($porcentaje / 100);
        $salarioAumentado = $salario + $aumento;

        // Imprime los resultados
        print("$emp: \nSalario actual: $salario\nSalario con aumento: $salarioAumentado\n\n");
    }

?>
