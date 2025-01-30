<?php
/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

/*
    9.  Usa el formulario (Ejercicio 21 UD5) de zona horaria donde se indique la zona horaria y
        muestre la hora y la zona elegidas guardando estos datos en una Cookie. Se deben mostrar la
        hora y la zona actual y la hora y la zona anterior (cookie).
 */

if (isset($_GET['enviar'])) {
    $zonas = $_GET['opciones'] ?? [];

    // Creo un string con todas las zonas separadas por comas
    $stringDatos = implode(",", $zonas);

    // Creo una cookie con las zonas anteriores
    setcookie("HorasAnt", $stringDatos, time() + (24 * 60 * 60), "/");
}

// Saco los datos de la cookie y las pongo en un array
$datosCookie = $_COOKIE["HorasAnt"] ?? '';
$array_datos_cookie = explode(",", $datosCookie);

?>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ejercicio 9 - Jorge Castro</title>
</head>

<body>
<form action="eje9.php" method="get">
    <h1>Ejercicio 9 - Jorge Castro</h1>
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

<!--Imprimo todos los datos-->
<h2>Horas Actuales:</h2>
<?php
if (!empty($zonas)) {
    echo "<table border='1'>";
    echo "<tr><th>Zona Horaria</th><th>Hora Actual</th></tr>";

    foreach ($zonas as $zona) {
        $dateTime = new DateTime("now", new DateTimeZone($zona));
        echo "<tr><td>{$zona}</td><td>" . $dateTime->format('H:i:s') . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "<p>No seleccionaste ninguna zona horaria.</p>";
}
?>

<h2>Horas Anteriores:</h2>
<?php
if (!empty($datosCookie)) {
    echo "<table border='1'>";
    echo "<tr><th>Zona Horaria</th><th>Hora Actual</th></tr>";

    foreach ($array_datos_cookie as $zona) {
        $dateTime = new DateTime("now", new DateTimeZone($zona));
        echo "<tr><td>{$zona}</td><td>" . $dateTime->format('H:i:s') . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "<p>No hay datos guardados de zonas horarias anteriores.</p>";
}
?>
</body>
</html>
