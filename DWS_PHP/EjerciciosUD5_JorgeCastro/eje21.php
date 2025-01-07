<?php
/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

 /*
    21. Realiza un programa donde el usuario seleccione una zona horaria de un máximo de 20 y le
    muestre la hora actual de dicha zona horaria
 */

if (isset($_GET['enviar'])) {
    $zonas = $_GET['opciones'] ?? [];
    if (!empty($zonas)) {
        echo "<h2>Horas</h2>";
        echo "<table border='1'";
        echo "<tr><th>Zona Horaria</th><th>Hora Actual</th></tr>";

        // Muestra todas las horas de las diferentes zonas horarias
        foreach ($zonas as $zona) {
            $dateTime = new DateTime("now", new DateTimeZone($zona));
            echo "<tr><td>" . $zona . "</td><td>" . $dateTime->format('H:i:s') . "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No seleccionaste ninguna zona horaria.</p>";
    }
}
?>

<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ejercicio 21 - Jorge Castro</title>
</head>

<body>
<form action="eje21.php" method="get">
    <h1>Ejercicio 21 - Jorge Castro</h1>
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
</body>
</html>
