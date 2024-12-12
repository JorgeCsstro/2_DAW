<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        11. Ejercicio 24 Con los trabajadores del ejercicio anterior, calcular el salario actual y el salario
        aumentado un porcentaje indicado por el usuario
    */

    if (isset($_GET['enviar'])) {
        $empresa = ['Juan' => 3000, 'Fran' => 2000, 'Pedro' => 4000];
        $porcentaje = $_GET['porcentaje'] ?? 0; // Get the percentage, default to 0 if not provided

        // Recorrer el array de empleados y calcular el salario con aumento
        foreach ($empresa as $emp => $salario) {
            $aumento = $salario * $porcentaje / 100;
            $salarioAumentado = $salario + $aumento;

            // Imprime los resultados
            print("$emp: <br>");
            print("Salario actual: $salario<br>");
            print("Salario con aumento: $salarioAumentado<br><br>");
        }
    }
?>


<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11 - Jorge Castro</title>
</head>

<body>
    <form action="eje11.php" method="get">
        <h1>Ejercicio 11 - Jorge Castro</h1>
        <label for="">Porcentaje de aumento de salario:</label>
        <input type="number" name="porcentaje" required>
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>

</html>
