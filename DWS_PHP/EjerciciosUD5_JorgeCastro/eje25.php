<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 25 - Jorge Castro</title>
</head>

<body>

<!--
    25. Crea una Web para obtener los siguientes datos: Nombre completo, Contraseña (mínimo 6
        caracteres), Nivel de Estudios(Sin estudios, Educación Secundaria Obligatoria, Bachillerato,
        Formación Profesional, Estudios Universitarios), Nacionalidad (Española, Otra), Idiomas
        (Español, Inglés, Francés, Alemán Italiano), Email, Adjuntar Foto (sólo extensiones jpg, gif y
        png, tamaño máximo 50 KB). Además de las comprobaciones de validación, se debe comprobar
        que sube fichero, que el fichero tiene extensión (puedes usar explode()) y ésta es válida, que hay
        directorio donde guardarlo y que se genera con nombre único. Si todo ha ido bien, redirige al
        usuario a una página donde se le indique que se ha procesado con éxito e incluye tu nombre y
        grupo de clase.
-->

    <h1>Ejercicio 25 - Jorge Castro</h1>

    <form action="foto.php" method="post" enctype="multipart/form-data">
        <label for="">Nombre:</label>
        <input type="text" name="nombre" maxlength="50">
        <br>
        <br>
        <label for="">Contraseña:</label>
        <input type="password" name="contrasena" minlength="6">
        <br>
        <br>
        <label for="">Nivel de estudios:</label>
        <select name="nivel">
            <option value="Sin estudios">Sin estudios</option>
            <option value="ESO">ESO</option>
            <option value="Bachillerato">Bachilllerato</option>
            <option value="FP">FP</option>
            <option value="Estudios Universitarios">Estudios Universitarios</option>
        </select>
        <br>
        <br>
        <label for="">Nacionalidad:</label>
        <select name="nacionalidad">
            <option value="Espanola">Española</option>
            <option value="Otra">Otra</option>
        </select>
        <br>
        <br>
        <label for="">Idiomas:</label>
        <select name="idiomas[]" multiple>
            <option value="Espanol" selected>Español</option>
            <option value="Ingles">Inglés</option>
            <option value="Frances">Francés</option>
            <option value="Aleman">Alemán</option>
            <option value="Italiano">Italiano</option>
        </select>
        <br>
        <br>
        <label for="">Email:</label>
        <input type="email" name="email" maxlength="100">
        <br>
        <br>
        <label for="foto">Adjuntar Foto:</label>
        <input type="file" name="foto" id="foto" required accept=".jpg, .jpeg, .gif, .png">
        <small>(Solo extensiones jpg, gif y png, tamaño máximo 50 KB)</small>
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
        <input type="reset" value="Borrar" name="borrar">
    </form>
</body>

</html>