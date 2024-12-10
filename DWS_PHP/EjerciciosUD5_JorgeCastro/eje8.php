<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        8. Ejercicio 7 Calcula, dada dos fechas inicio y final introducidas por el usuario (puede ser la
        actual y otra deseada), cuántos días, horas y minutos hay de diferencia entre dichas horas.

    */

    // Hora de España
    date_default_timezone_set("Europe/Madrid");

    if (isset($_GET['enviar'])) {

        // Función para calcular la diferencia entre dos fechas
        function calcularDiferencia($f_inicial, $f_final) {

            // Convertir las fechas en objetos DateTime
            $inicio = new DateTime($f_inicial);
            $fin = new DateTime($f_final);
        
            // Calcular la diferencia
            $diferencia = $inicio->diff($fin);
        
            // Extraer días, horas y minutos
            $dias = $diferencia->days;
            $horas = $diferencia->h;
            $minutos = $diferencia->i;
        
            // Verificar si la fecha de inicio es mayor que la final (diferencia negativa)
            if ($inicio <= $fin) {
                $dias = $dias;
                $horas = $horas;
                $minutos = $minutos;

                // Devuelvo los dias, horas y minutos
                print("La diferencia entre la fecha inicial y la final es: " . $dias . " Días, " . $horas . " Horas, " . $minutos . " Minutos");
            }else{

                print("La fecha inicial es posterior a la fecha final");

            }
        }

        $f_inicial = $_GET['f_inicial'];
        $f_final = $_GET['f_final'];
        
        $diferencia = calcularDiferencia($f_inicial, $f_final);
    }
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8 - Jorge Castro</title>
</head>

<body>
    <form action="eje8.php" method="get">
        <h1>Ejercicio 8 - Jorge Castro</h1>
        <label for="">Dame la fecha de INICIAL (ej: YYYY-MM-DD HH:MM):</label>
        <input type="text" name="f_inicial" id="f_inicial">
        <br>
        <br>
        <label for="">Dame la fecha de FINAL (ej: YYYY-MM-DD HH:MM):</label>
        <input type="text" name="f_final" id="f_final">
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>

</html>
