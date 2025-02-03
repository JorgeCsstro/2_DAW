<?php
session_start();
/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

/*
    8.  Usa el formulario del ejercicio 8 de Cookies con selección de zona horaria para mostrar la hora
        y zona elegidas de modo que uses la sesión para mostrar la zona horaria y hora actuales y
        además muestre la zona horaria y hora de la selección anterior.
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
        $stringDatos .= "Moda: " . implode(', ', $moda) . ",";
    }
    if (in_array('mediana', $opciones)) {
        $mediana = calcularMediana($numeros);
        $stringDatos .= "Mediana: $mediana";
    }

    // Guardar en sesión
    $_SESSION['datosAnt'] = $_SESSION['datosActuales'] ?? '';
    $_SESSION['datosActuales'] = $stringDatos;
}

// Obtener datos de la sesión
$datosActuales = $_SESSION['datosActuales'] ?? 'No hay cálculos actuales';
$datosAnteriores = $_SESSION['datosAnt'] ?? 'No hay cálculos anteriores';
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

<!--Imprimo todos los datos-->
<h2>Datos Actuales:</h2>
<p><?php echo $datosActuales; ?></p>

<h2>Datos Anteriores:</h2>
<p><?php echo $datosAnteriores; ?></p>
</body>
</html>
