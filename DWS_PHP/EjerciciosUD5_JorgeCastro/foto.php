<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

/*
    25. Crea una Web para obtener los siguientes datos: Nombre completo, Contraseña (mínimo 6
        caracteres), Nivel de Estudios(Sin estudios, Educación Secundaria Obligatoria, Bachillerato,
        Formación Profesional, Estudios Universitarios), Nacionalidad (Española, Otra), Idiomas
        (Español, Inglés, Francés, Alemán Italiano), Email, Adjuntar Foto (sólo extensiones jpg, gif y
        png, tamaño máximo 50 KB). Además de las comprobaciones de validación, se debe comprobar
        que sube fichero, que el fichero tiene extensión (puedes usar explode()) y ésta es válida, que hay
        directorio donde guardarlo y que se genera con nombre único. Si todo ha ido bien, redirige al
        usuario a una página donde se le indique que se ha procesado con éxito e incluye tu nombre y
        grupo de clase.
*/

$nombre = $_GET['nombre'];
$contrasena = $_GET['contrasena'];
$nivel = $_GET['nivel'];
$nacionalidad = $_GET['nacionalidad'];
$idiomas = $_GET['idiomas'];
$email = $_GET['email'];
$destination = $_GET['destination'];

print "<h1>Archivo subido con éxito</h1>";
            print "<p><b>Nombre:</b> $nombre</p>";
            print "<p><b>Contraseña:</b> $contrasena</p>";
            print "<p><b>Nivel de Estudios:</b> $nivel</p>";
            print "<p><b>Nacionalidad:</b> $nacionalidad</p>";
            print "<p><b>Idiomas:</b>" . implode(", ", $idiomas) . "</p>";
            print "<p><b>Email:</b> $email</p>";
            print "<p><b>Ruta imagen:</b> $destination</p>";
            print "<img src='./$destination'>";

?>