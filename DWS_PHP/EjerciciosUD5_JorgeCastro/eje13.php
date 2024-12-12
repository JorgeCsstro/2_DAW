

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jorge Castro - Formulario de registro</title>
</head>

<body>

<!--
    13. Formulario 1, petición por GET y mostrar en NombreAlumnoForm1OK.php los resultados
    indicando el campo en cursiva y el contenido en negrita
-->

    <h1>Jorge Castro - Formulario de registro</h1>

    <form action="NombreAlumnoForm1OK.php" method="get">
        <label for="">Nombre:</label>
        <input type="text" name="nombre" id="nombre" maxlength="50">
        <br>
        <br>
        <label for="">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" maxlength="200">
        <br>
        <br>
        <label for="">Sexo:</label>
        <input type="radio" name="sexo" value="Hombre">Hombre
        <input type="radio" name="sexo" value="Mujer">Mujer
        <br>
        <br>
        <label for="">E-Mail:</label>
        <input type="text" name="email" maxlength="250">
        <br>
        <br>
        <label for="">Provincia:</label>
        <select name="provincia">
            <option value="Alicante">Alicante</option>
            <option value="Castellon">Castellón</option>
            <option value="Valencia">Valencia</option>
        </select>
        <br>
        <br>
        <input type="checkbox" name="noti"checked>Deseo recibir información sobre novedades y ofertas
        <br>
        <br>
        <input type="checkbox" name="condi">Declaro haber leído y aceptar las condiciones generales 
        del programa y la normativa sobre protección de datos
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>

</body>

</html>