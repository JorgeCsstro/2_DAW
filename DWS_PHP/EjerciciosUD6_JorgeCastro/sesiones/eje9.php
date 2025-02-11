<?php
session_start();
/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
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
        $stringDatos = "Media: $media, ";
    }
    if (in_array('moda', $opciones)) {
        $moda = calcularModa($numeros);
        $stringDatos .= "Moda: " . implode(', ', $moda) . ", ";
    }
    if (in_array('mediana', $opciones)) {
        $mediana = calcularMediana($numeros);
        $stringDatos .= "Mediana: $mediana";
    }

    // Guardar en sesión
    $_SESSION['calcAnt'] = $_SESSION['calcActuales'];
    $_SESSION['calcActuales'] = $stringDatos;
}

// Obtener datos de la sesión
$calcActuales = $_SESSION['calcActuales'];
$calcAnt = $_SESSION['calcAnt'];
?>

<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ejercicio 9 - Jorge Castro</title>
</head>

<body>
<form action="" method="get">
    <h1>Ejercicio 9 - Jorge Castro</h1>
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

<?php 
    if (!empty($calcActuales)) {
        echo "<h2>Datos Actuales:</h2>";
        echo "<p>$calcActuales</p>";
    }

    if (!empty($calcAnt)) {
        echo "<h2>Datos Anteriores:</h2>";
        echo "<p>$calcAnt</p>";
    }
?>
</body>
</html>
