<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

if (isset($_GET['enviar'])) {

    $fecha = $_GET['fecha'];
    
    if (is_numeric($fecha) && $fecha >= 0 && $fecha <= 31) {
        
        echo(($fecha <= 15) ? "Primera quincena <br>" : "Segunda quincena <br>");
    }else{

        echo("Fecha no válida");

    }
}


?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 - Jorge Castro</title>
</head>

<body>

    <form action="eje2.php" method="get">
        <h1>Ejercicio 2 - Jorge Castro</h1>
        <label for="">Fecha:</label>
        <input type="text" name="fecha" id="fecha">
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>

</body>

</html>