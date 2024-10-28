<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

if (isset($_GET['enviar'])) {

    $conversor = $_GET['conversor'];
    $dinero = $_GET['dinero'];

    // Conversion de pesetas a euros
    if ($conversor == "pesAeu") {
        
        $conversion = $dinero / 166.386;

        print($dinero . " pesetas son " . $conversion . "€<br>\n");

    // Conversion de euros a pesetas
    } elseif ($conversor == "euApes") {

        $conversion = $dinero * 166.386;

        print($dinero . "€ son " . $conversion . " pesetas<br>");
    }
}

?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Jorge Castro</title>
</head>

<body>

    <form action="eje3.php" method="get">
        <h1>Ejercicio 3 - Jorge Castro</h1>
        <label for="">Dinero (Pesetas o Euros):</label>
        <input type="text" name="dinero" id="dinero">
        <br>
        <br>
        <label for="">Conversor:</label>
        <select name="conversor" id="">
            <option value="pesAeu">Pesetas a €</option>
            <option value="euApes">€ a Pesetas</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>

</body>

</html>