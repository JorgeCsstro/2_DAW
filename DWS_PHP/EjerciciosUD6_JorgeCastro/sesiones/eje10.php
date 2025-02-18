<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 22 - Jorge Castro</title>
</head>

<body>

<!--
    10. Usa el formulario del ejercicio 10 de Cookies con selección de si se desea publicidad o no de
        modo que uses la sesión para mostrar el nombre del usuario y si desea o no publicidad del
        usuario actual y además muestre usuario y elección del anterior.
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