<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

if (isset($_GET['enviar'])) {

    $char = $_GET['char'];
    // Comprobador de carácteres
    if (ctype_lower($char)) {
        print("Soy un carácter de letra Minúscula<br>");
    } elseif (ctype_upper($char)) {
        print("Soy un carácter de letra Mayúcula<br>");
    } elseif (ctype_digit($char)) {
        print("Soy un carácter numérico<br>");
    } elseif (ctype_space($char)) {
        print("Soy un carácter blanco<br>");
    } elseif (preg_match('/[^a-zA-Z0-9.:,;]/', $char) > 0) {
        print("Soy un carácter especial<br>");
    } elseif (ctype_punct($char)) {
        print("Soy un carácter de puntuación<br>");
    }
}

?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 - Jorge Castro</title>
</head>

<body>

    <form action="eje5.php" method="get">
        <h1>Ejercicio 5 - Jorge Castro</h1>
        <label for="">Carácter: </label>
        <input type="text" name="char" id="char" maxlength="1">
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>

</body>

</html>