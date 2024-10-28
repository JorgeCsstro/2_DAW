<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

if (isset($_GET['enviar'])) {

    $tarifaOrdinaria = 12;
    $tarifaExtra = 16;
    $horasOrdinarias = 40;

    $horasTrabajadas = $_GET['horas'];

    if ($horasTrabajadas <= $horasOrdinarias) {
        $salario = $horasTrabajadas * $tarifaOrdinaria;
        print("El salario es: " . $salario);
    } else {
        $horasExtras = $horasTrabajadas - $horasOrdinarias;
        $salario = ($horasOrdinarias * $tarifaOrdinaria) + ($horasExtras * $tarifaExtra);
        print("El salario es: " . $salario);
    }
}

?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - Jorge Castro</title>
</head>

<body>

    <form action="eje4.php" method="get">
        <h1>Ejercicio 4 - Jorge Castro</h1>
        <label for="">Horas de trabajo: </label>
        <input type="text" name="horas" id="horas">
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>

</body>

</html>