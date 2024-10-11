<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
     */

    $empresa = [];

    $empl = readline("Dame los nombres de los empleados con su salario (ej: Juan-3000, Fran-2400, etc): ");

    $empleados = explode(", ", $empl);

    foreach ($empleados as $empleado) {
        
        // Crea un array temporal con el nombre del empleado y su salario
        list($emp, $salario) = explode("-", $empleado);

        // Guarda los datos de la lista temporal en el array empresa
        $empresa[$emp] = (int)$salario;
    }

    // 
    print_r($empresa);

    

?>

