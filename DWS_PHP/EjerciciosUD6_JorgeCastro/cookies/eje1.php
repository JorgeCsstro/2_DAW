<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

/*
    1.  Crea un formulario sencillo donde el usuario indique su nombre y seleccione si quiere un
        saludo o despedida. Se debe almacenar en una Cookie el usuario y el saludo y al pulsar Enviar,
        se debe indicar los valores actuales (usuario y saludo o despedida elegidos) y los valores del
        usuario anterior y acción elegida almacenadas en la Cookie
*/

if (isset($_GET['enviar'])) {

    $nombre = $_GET['nombre'];
    $saldes = $_GET['saldes'];

    $arrayDatos = [$nombre, $saldes];

    $stringDatos = $nombre . "," . $saldes;

    // Creo una cookie para almacenar los datos actuales
    setcookie("datosAnterior", $stringDatos, time() + (24 * 60 * 60), "/");

    // Hago array con los datos de la cookie anterior
    $datosCookie = $_COOKIE["datosAnterior"];
    $array_datos_cookie = explode(",", $datosCookie);

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