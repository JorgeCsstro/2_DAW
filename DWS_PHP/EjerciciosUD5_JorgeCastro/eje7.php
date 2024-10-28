<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

if (isset($_GET['enviar'])) {

    // Funcion para el dinero que cuesta la llamada
    function llamadaCoste($minutos) {
        $coste = 0;

        if ($minutos >= 3) {
            $coste = ($minutos - 3) * 5 + 10;
            return $coste;

        }else{
            $coste = 10;
            return $coste;

        }
    }

    $llamadas = $_GET['llamadas'];
    $arrLlamadas = explode(" - ", $llamadas);

    if (count($arrLlamadas) != 5) {
        print("Dame 5 llamadas");
    }else{
        for ($i=1; $i <= count($arrLlamadas); $i++) { 
            print("Te ha costado la llamada " . $i . ": " . llamadaCoste($arrLlamadas[$i-1]) . " céntimos<br>");
        }
    }
}

?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7 - Jorge Castro</title>
</head>

<body>
    <form action="eje7.php" method="get">
        <h1>Ejercicio 7 - Jorge Castro</h1>
        <label for="">Dame 5 tiempos de llamadas en minutos, separadas por " - ": </label>
        <input type="text" name="llamadas" id="llamadas">
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>

</html>