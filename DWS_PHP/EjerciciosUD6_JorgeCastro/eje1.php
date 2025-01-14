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

    setcookie($nombre, $saldes, time() + (24 * 60 * 60), "/");

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
</body>

</html>