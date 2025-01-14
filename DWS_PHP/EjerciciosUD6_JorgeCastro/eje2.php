<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

/*
    2.  Crea un formulario en el que se le pida al usuario los siguientes datos: nombre y preferencia de
        idioma, color y ciudad. Crea una Cookie que almacene estos datos y que, al recargar la página
        por realizar una nueva selección de datos (y posiblemente usuario) muestre los datos
        introducidos en el formulario junto con los datos obtenidos de la Cookie
*/

if (isset($_GET['enviar'])) {

    $nombre = $_GET['nombre'];
    $saldes = $_GET['saldes'];

    setcookie($nombre, $saldes, time() + (24 * 60 * 60), "/");

}

?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 - Jorge Castro</title>
</head>

<body>

    <h1>Ejercicio 2 - Jorge Castro</h1>

    <form action="eje1.php" method="get">
        <label for="">Nombre:</label>
        <input type="text" name="nombre">
        <br>
        <br>
        <label for="">Idioma</label>
        <select name="idioma" id="">
            <option value="Español">Español</option>
            <option value="Italiano">Italiano</option>
            <option value="Inglés">Inglés</option>
            <option value="Francés">Francés</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>

</html>