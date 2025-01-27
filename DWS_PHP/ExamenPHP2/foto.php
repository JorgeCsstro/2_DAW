<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

// Retrieve data from the GET request and display it.
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