<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

/*
    1. Usa el formulario del ejercicio 1 de Cookies de saludo o despedida de modo que uses la sesión
        para mostrar el usuario y saludo actuales y además muestre el usuario y saludo anterior.
*/

session_start();

if (isset($_GET['enviar'])) {

    $nombre = $_GET['nombre'];
    $saldes = $_GET['saldes'];

    $arrayDatos = [$nombre, $saldes];

    $_SESSION['datosActualesEJ1'] = $arrayDatos;

    if (isset($_SESSION['datosActualesAnteriorEJ1'])) {
        $_SESSION['datosAnteriorEJ1'] = $_SESSION['datosActualesAnteriorEJ1'];
    }

    $_SESSION['datosActualesAnteriorEJ1'] = $arrayDatos;
}

?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Jorge Castro</title>
</head>

<body>

    <h1>Ejercicio 1 - Jorge Castro</h1>

    <form action="eje1.php" method="get">
        <label for="">Nombre:</label>
        <input type="text" name="nombre">
        <br>
        <br>
        <label for="">Saludo o Despedida:</label>
        <select name="saldes" id="">
            <option value="saludo">Saludo</option>
            <option value="despedida">Despedida</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
    
    <!--Imprimo todos los datos-->
    <?php 
        if (isset($_SESSION['datosActualesEJ1'])) {
            print "<h2>Datos Actuales:</h2>";
            $arrayDatos = $_SESSION['datosActualesEJ1'];
            foreach ($arrayDatos as $dato) {
                print("<p>" . $dato . "</p>");
            }
        }
        
        if (isset($_SESSION['datosAnteriorEJ1'])) {
            print "<h2>Datos Anteriores:</h2>";
            foreach ($_SESSION['datosAnteriorEJ1'] as $dato) {
                print("<p>" . $dato . "</p>");
            }
        }
    ?>
</body>

</html>
