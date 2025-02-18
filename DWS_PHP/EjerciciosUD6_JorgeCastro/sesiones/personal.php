<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

/*
    12. Aplica la sesión en el ejercicio 24 de la UD5 para poder pasar los datos en lugar de construir la
        url para enviarlos.
*/

session_start(); // Iniciar la sesión

if (isset($_SESSION['nombre'])) {
    $nombre = $_SESSION['nombre'];
    $apellidos = $_SESSION['apellidos'];
    $edad = $_SESSION['edad'];
    $peso = $_SESSION['peso'];
    $sexo = $_SESSION['sexo'];
    $estado = $_SESSION['estado'];
    $aficiones = $_SESSION['aficiones'];

    print(
            "<br><i>Nombre:</i> <b>" . strtoupper($nombre) . "</b>" .
            "<br><i>Apellidos:</i> <b>" . strtoupper($apellidos) . "</b>" .
            "<br><i>Edad:</i> <b>" . strtoupper($edad) . "</b>" .
            "<br><i>Peso:</i> <b>" . strtoupper($peso) . "</b>" .
            "<br><i>Sexo:</i> <b>" . strtoupper($sexo) . "</b>" .
            "<br><i>Estado:</i> <b>" . strtoupper($estado) . "</b>" .
            "<br><i>Aficiones:</i> <b>" . strtoupper(implode(", ", $aficiones)) . "</b>"
    );

    session_unset();
    session_destroy();
} else {
    header("Location: eje12.php");
    exit();
}

?>