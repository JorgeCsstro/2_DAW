<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 22 - Jorge Castro</title>
</head>

<body>

<!--
    22. Escribe un formulario que solicite una dirección de correo y que la confirme e indique si
    acepta recibir publicidad. Añade botón Enviar y Borrar. Cuando enviemos, iremos a otra página
    donde se le indique el email y si ha aceptado recibir publicidad o no. El botón borrar se
    mantendrá en el mismo formulario inicial pero limpiará todos los campos.
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