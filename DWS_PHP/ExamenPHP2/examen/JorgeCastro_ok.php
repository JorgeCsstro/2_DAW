<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

$nombre = $_GET['nombre'];
$email = $_GET['email'];
$usuario = $_GET['usuario'];
$contrasena = $_GET['contrasena'];
$afectado = $_GET['afectado'];
$poblacion = $_GET['poblacion'];
$elementos = $_GET['elementos'];
$necesidades = $_GET['necesidades'];
$lopdgdd = $_GET['lopdgdd'];
$destination = $_GET['destination'];
$nombreFoto = $_GET['nombreFoto'];

print "<h1 class='head'>Sus datos han sido enviados correctamente - JorgeCastro</h1>";
print "<p><i>Nombre:</i> <b>" . strtoupper($nombre) . "</b></p>";
print "<p><i>Email:</i> <b>" . strtoupper($email) . "</b></p>";
print "<p><i>Usuario:</i> <b>" . strtoupper($usuario) . "</b></p>";
print "<p><i>Contraseña:</i> <b>" . strtoupper($contrasena) . "</b></p>";
print "<p><i>Afectado:</i> <b>" . strtoupper($afectado) . "</b></p>";
print "<p><i>Poblacion:</i> <b>" . strtoupper($poblacion) . "</b></p>";
print "<p><i>Elementos Afectados:</i> <b>" . strtoupper(implode(", ", $elementos)) . "</b></p>";
print "<p><i>Necesidades:</i> <b>" . strtoupper(implode(", ", $necesidades)) . "</b></p>";
print "<p><i>Nombre del fichero:</i> <b>" . strtoupper($nombreFoto) . "</b></p>";
print "<img src='./$destination'>";

?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Examen - Jorge Castro</title>
    <style>
        .head{ color: blue;}
    </style>
</head>
<body>
    
</body>
</html>