<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 22 - Jorge Castro</title>
</head>

<body>

<!--
    10. Usa el formulario (Ejercicio 22 UD5) que guarde en una Cookie la preferencia del usuario de si
        desea o no recibir publicidad y que muestre la opción anterior y la nueva elegida en caso de que
        la modifique.
-->

    <h1>Ejercicio 22 - Jorge Castro</h1>

    <form action="publicidad.php" method="get">
        <label for="">E-Mail:</label>
        <input type="email" name="email" maxlength="250">
        <br>
        <br>
        <input type="checkbox" name="publi" checked>Quiero recibir publicidad
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
        <input type="reset" value="Borrar" name="borrar">
    </form>
</body>

</html>