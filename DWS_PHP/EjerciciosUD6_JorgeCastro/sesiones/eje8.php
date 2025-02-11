<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

session_start();

if (isset($_GET['enviar'])) {
    $zonas = $_GET['opciones'] ?? [];

    $stringDatos = implode(",", $zonas);

    if (isset($_SESSION['HorasActual'])) {
        $_SESSION['HorasAnt'] = $_SESSION['HorasActual'];
    }

    $_SESSION['HorasActual'] = $stringDatos;
}

$datosSessionActual = $_SESSION['HorasActual'] ?? '';
$array_datos_actual = $datosSessionActual ? explode(",", $datosSessionActual) : [];

$datosSessionAnterior = $_SESSION['HorasAnt'] ?? '';
$array_datos_anterior = $datosSessionAnterior ? explode(",", $datosSessionAnterior) : [];
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
        <label for="opciones">Seleccione zonas horarias:</label>
        <br>
        <select multiple size="10" name="opciones[]" id="opciones">
            <option value="Europe/Madrid">Madrid</option>
            <option value="Europe/London">Londres</option>
            <option value="Europe/Paris">París</option>
            <option value="Europe/Berlin">Berlín</option>
            <option value="Asia/Tokyo">Tokio</option>
            <option value="America/New_York">Nueva York</option>
            <option value="Australia/Sydney">Sídney</option>
            <option value="America/Los_Angeles">Los Ángeles</option>
            <option value="Europe/Moscow">Moscú</option>
            <option value="Asia/Shanghai">Pekín</option>
            <option value="Asia/Dubai">Dubái</option>
            <option value="America/Mexico_City">Ciudad de México</option>
            <option value="America/Sao_Paulo">Sao Paulo</option>
            <option value="America/Toronto">Toronto</option>
            <option value="Asia/Singapore">Singapur</option>
            <option value="Asia/Seoul">Seúl</option>
            <option value="America/Argentina/Buenos_Aires">Buenos Aires</option>
            <option value="Europe/Istanbul">Estambul</option>
            <option value="Africa/Nairobi">Nairobi</option>
            <option value="Asia/Bangkok">Bangkok</option>
        </select>
        <br><br>
        <input type="submit" value="Enviar" name="enviar">
    </form>

    <?php
    if (!empty($array_datos_actual)) {
        print "<h2>Horas Actuales:</h2>";
        print "<table border='1'>";
        print "<tr><th>Zona Horaria</th><th>Hora Actual</th></tr>";

        foreach ($array_datos_actual as $zona) {
            $dateTime = new DateTime("now", new DateTimeZone($zona));
            print "<tr><td>{$zona}</td><td>" . $dateTime->format('H:i:s') . "</td></tr>";
        }

        print "</table>";
    } else {
        print "<p>No seleccionaste ninguna zona horaria.</p>";
    }

    if (!empty($array_datos_anterior)) {
        print "<h2>Horas Anteriores:</h2>";
        print "<table border='1'>";
        print "<tr><th>Zona Horaria</th><th>Hora Anterior</th></tr>";

        foreach ($array_datos_anterior as $zona) {
            $dateTime = new DateTime("now", new DateTimeZone($zona));
            print "<tr><td>{$zona}</td><td>" . $dateTime->format('H:i:s') . "</td></tr>";
        }

        print "</table>";
    } else {
        print "<p>No hay datos guardados de zonas horarias anteriores.</p>";
    }
    ?>
</body>

</html>