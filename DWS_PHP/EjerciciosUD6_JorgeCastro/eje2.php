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
    $idioma = $_GET['idioma'];
    $color = $_GET['color'];
    $ciudad = $_GET['ciudad'];

    $arrayDatos = [$nombre, $idioma, $color, $ciudad];

    $stringDatos = $nombre . "," . $idioma . "," . $color . "," . $ciudad;

    setcookie("datosAnt", $stringDatos, time() + (24 * 60 * 60), "/");

    $datosCookie = $_COOKIE["datosAnt"];
    $array_datos_cookie = explode(",", $datosCookie);

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

    <form action="eje2.php" method="get">
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
        <label for="">Color:</label>
        <select name="color" id="">
            <option value="Rojo">Rojo</option>
            <option value="Azul">Azul</option>
            <option value="Verde">Verde</option>
        </select>
        <br>
        <br>
        <label for="">Ciudad:</label>
        <input type="text" name="ciudad">
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
    <h2>Datos Actuales:</h2>
    <?php 
        for ($i=0; $i < count($arrayDatos); $i++) { 
            print("<p>" . $arrayDatos[$i] . "</p>");
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