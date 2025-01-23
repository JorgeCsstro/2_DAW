<?php
/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

/*
    18. Escribe un programa para que, a criterio del usuario, obtenga la media, la moda (número más
    frecuente) o la mediana (el número de en medio o el promedio de los dos centrales si son pares)
    de los números que introduzca el usuario, Se podrán seleccionar de una a todas las opciones
    calculadas pero se deben mostrar todas para que el usuario las marque o desmarque
*/

// Calcular media
function calcularMedia($numeros) {
    return array_sum($numeros) / count($numeros);
}

// Calcular moda
function calcularModa($numeros) {
    $frecuencias = array_count_values($numeros);
    $maxFrecuencia = max($frecuencias);
    $moda = array_keys($frecuencias, $maxFrecuencia);
    return $moda;
}

// Calcular mediana
function calcularMediana($numeros) {
    sort($numeros);
    $n = count($numeros);
    if ($n % 2 == 0) {
        return ($numeros[$n / 2 - 1] + $numeros[$n / 2]) / 2;
    } else {
        return $numeros[floor($n / 2)];
    }
}

if (isset($_GET['enviar'])) {
    $numerosInput = $_GET['numeros'];
    $opciones = $_GET['opciones'];

    // Convertimos los números en un array
    $numeros = array_map('intval', explode(',', $numerosInput));

    $stringDatos = "";

    // Print los resultados seleccionados
    if (in_array('media', $opciones)) {
        $media = calcularMedia($numeros);
        $stringDatos = "Media: $media,";
    }
    if (in_array('moda', $opciones)) {
        $moda = calcularModa($numeros);
        $stringDatos = $stringDatos . "Moda: " . implode(', ', $moda) . ",";
    }
    if (in_array('mediana', $opciones)) {
        $mediana = calcularMediana($numeros);
        $stringDatos = $stringDatos . "Mediana: $mediana";
    }
    $array_datos_actuales = explode(",", $stringDatos);

    setcookie("datosAnt", $stringDatos, time() + (24 * 60 * 60), "/");

    $datosCookie = $_COOKIE["datosAnt"];
    $array_datos_cookie = explode(",", $datosCookie);
    
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
    <label for="numeros">Dígame todos los números que quiera (separados por comas):</label>
    <input type="text" name="numeros" id="numeros">
    <br>
    <label for="opciones">Seleccione opciones:</label>
    <br>
    <select multiple size="3" name="opciones[]" id="opciones">
        <option value="media">Media</option>
        <option value="moda">Moda</option>
        <option value="mediana">Mediana</option>
    </select>
    <br><br>
    <input type="submit" value="Enviar" name="enviar">
</form>
<h2>Datos Actuales:</h2>
    <?php 
        for ($i=0; $i < count($array_datos_actuales); $i++) { 
            print("<p>" . $array_datos_actuales[$i] . "</p>");
        }
    ?>
    <h2>Datos Anteriores:</h2>
    <?php 
        for ($i=0; $i < count($array_datos_cookie); $i++) { 
            print("<p>" . $array_datos_cookie[$i] . "</p>");
        }
    ?>
</body>
</html>