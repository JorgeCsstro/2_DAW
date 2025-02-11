<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11 - Jorge Castro</title>
</head>

<body>

    <!--
    11. Aplica la sesión en el ejercicio 23 de la UD5 para poder pasar los datos en lugar de construir la
        url para enviarlos.
-->

    <h1>Ejercicio 11 - Jorge Castro</h1>

    <form action="datos.php" method="get">
        <label for="">Nombre completo:</label>
        <input type="text" name="nombre" maxlength="40">
        <br>
        <label for="">E-Mail:</label>
        <input type="email" name="email" maxlength="250">
        <br>
        <br>
        <label for="nivel">Nivel académico:</label>
        <br>
        <select name="nivel" id="nivel">
            <option value="eso">Educación Secundaria Obligatoria (ESO)</option>
            <option value="bachillerato">Bachillerato</option>
            <option value="fp-basica">Formación Profesional Básica</option>
            <option value="fp-grado-medio">Formación Profesional de Grado Medio</option>
            <option value="fp-grado-superior">Formación Profesional de Grado Superior</option>
            <option value="grado-universitario">Grado Universitario</option>
            <option value="master">Máster Universitario</option>
            <option value="doctorado">Doctorado</option>
        </select>
        <br>
        <br>
        <label for="">Situacion: </label>
        <br>
        <select multiple size="4" name="situacion[]">
            <option value="estudiando">Estudiando</option>
            <option value="trabajando">Trabajando</option>
            <option value="buscando">Buscando empleo</option>
            <option value="desempleado">Desempleado</option>
        </select>
        <br>
        <br>
        <label for="">Hobbies:</label>
        <br>
        <input type="checkbox" name="hobbies[]" value="videojuegos">Videojuegos
        <input type="checkbox" name="hobbies[]" value="musica">Musica
        <input type="checkbox" name="hobbies[]" value="ejercicio">Ejercicio
        <label for="">Otro:</label>
        <input type="text" id="otroTexto" name="hobbies[]">
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>

</html>