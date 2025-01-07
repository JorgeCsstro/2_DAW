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

    // Print los resultados seleccionados
    print "<h2>Resultados:</h2>";
    if (in_array('media', $opciones)) {
        $media = calcularMedia($numeros);
        print "<p><strong>Media:</strong> $media</p>";
    }
    if (in_array('moda', $opciones)) {
        $moda = calcularModa($numeros);
        print "<p><strong>Moda:</strong> " . implode(', ', $moda) . "</p>";
    }
    if (in_array('mediana', $opciones)) {
        $mediana = calcularMediana($numeros);
        print "<p><strong>Mediana:</strong> $mediana</p>";
    }
    
}
?>

<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ejercicio 18 - Jorge Castro</title>
</head>

<body>
<form action="eje18.php" method="get">
    <h1>Ejercicio 18 - Jorge Castro</h1>
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
</body>
</html>