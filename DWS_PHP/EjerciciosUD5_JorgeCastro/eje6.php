<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

if (isset($_GET['enviar'])) {

    $tiempo = $_GET['tiempo'];

    function validaHora($horas, $minutos, $segundos) {
        if ($horas < 0 || $horas > 23 || 
        $minutos < 0 || $minutos > 59 || 
        $segundos < 0 || $segundos > 59) {
            return false;
        }else{
            return true;
        }
    }
    
    // Separa la hora en un array
    $hora = explode(":", $tiempo);
    
    // Devolver resultados
    if (validaHora($hora[0], $hora[1], $hora[2])) {
        // Imprime resultado
        print("La hora es válida.<br>");

    } else {
        // Imprime error
        print("La hora no es válida.<br>");

    }
}

?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6 - Jorge Castro</title>
</head>

<body>

    <form action="eje6.php" method="get">
        <h1>Ejercicio 6 - Jorge Castro</h1>
        <label for="">Hora (ej: 01:43:12): </label>
        <input type="text" name="tiempo" id="tiempo">
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>

</body>

</html>