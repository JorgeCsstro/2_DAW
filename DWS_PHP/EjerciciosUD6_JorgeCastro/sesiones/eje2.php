<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

/*
    2.  Usa el formulario del ejercicio 2 de Cookies con selección de color, idioma y ciudad de modo
        que uses la sesión para mostrar el nombre del usuario, color, idioma y ciudad actuales y además
        muestre el nombre del usuario, color, idioma y ciudad anterior.
*/

session_start();

if (isset($_GET['enviar'])) {

    $nombre = $_GET['nombre'];
    $idioma = $_GET['idioma'];
    $color = $_GET['color'];
    $ciudad = $_GET['ciudad'];

    $arrayDatos = [$nombre, $idioma, $color, $ciudad];

    $_SESSION['datosActualesEJ2'] = $arrayDatos;

    if (isset($_SESSION['datosActualesAnteriorEJ2'])) {
        $_SESSION['datosAnteriorEJ2'] = $_SESSION['datosActualesAnteriorEJ2'];
    }

    $_SESSION['datosActualesAnteriorEJ2'] = $arrayDatos;

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

    <!--Imprimo todos los datos-->
    
    <?php 
        if (isset($_SESSION['datosActualesEJ2'])) {
            print "<h2>Datos Actuales:</h2>";
            $arrayDatos = $_SESSION['datosActualesEJ2'];
            foreach ($arrayDatos as $dato) {
                print("<p>" . $dato . "</p>");
            }
        }
        
        if (isset($_SESSION['datosAnteriorEJ2'])) {
            print "<h2>Datos Anteriores:</h2>";
            foreach ($_SESSION['datosAnteriorEJ2'] as $dato) {
                print("<p>" . $dato . "</p>");
            }
        }
    ?>
</body>

</html>