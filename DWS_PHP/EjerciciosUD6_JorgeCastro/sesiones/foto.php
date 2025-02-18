<?php
session_start(); // Iniciar la sesión

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

/*
    13. Aplica la sesión en el ejercicio 25 de la UD5 para poder pasar los datos en lugar de construir la
        url para enviarlos (de la foto sólo enviaremos nombre, extensión, ruta y tamaño).
*/

if (isset($_SESSION['nombre'])) {
    $nombre = $_SESSION['nombre'];
    $contrasena = $_SESSION['contrasena'];
    $nivel = $_SESSION['nivel'];
    $nacionalidad = $_SESSION['nacionalidad'];
    $idiomas = $_SESSION['idiomas'];
    $email = $_SESSION['email'];
    $foto = $_SESSION['foto'];

    // Mostrar los datos
    echo "<h1>Archivo subido con éxito</h1>";
    echo "<p><b>Nombre:</b> $nombre</p>";
    echo "<p><b>Contraseña:</b> $contrasena</p>";
    echo "<p><b>Nivel de Estudios:</b> $nivel</p>";
    echo "<p><b>Nacionalidad:</b> $nacionalidad</p>";
    echo "<p><b>Idiomas:</b>" . implode(", ", $idiomas) . "</p>";
    echo "<p><b>Email:</b> $email</p>";
    echo "<p><b>Nombre de la imagen:</b> {$foto['nombre']}</p>";
    echo "<p><b>Extensión de la imagen:</b> {$foto['extension']}</p>";
    echo "<p><b>Ruta de la imagen:</b> {$foto['ruta']}</p>";
    echo "<p><b>Tamaño de la imagen:</b> {$foto['tamano']} bytes</p>";

    // Borrar sesion cuando ha acabado de dar los datos
    session_unset();
    session_destroy();
} else {
    header("Location: eje13.php");
    exit();
}
