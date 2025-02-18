<?php
session_start(); // Start the session

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

/*
    10. Usa el formulario del ejercicio 10 de Cookies con selección de si se desea publicidad o no de
        modo que uses la sesión para mostrar el nombre del usuario y si desea o no publicidad del
        usuario actual y además muestre usuario y elección del anterior.
*/

if (isset($_GET['enviar'])) {
    
    // Cojo los valores del formulario
    $email = $_GET['email'];
    $publi = isset($_GET['publi']) ? "SI deseo recibir publicidad interesante" : "NO deseo recibir la mejor publicidad del mundo";

    $arrayDatos = [$email, $publi];

    // Recupero los datos anteriores desde la sesión (si existen)
    if (!empty($_SESSION["datosAntEJ10"])) {
        $datosAnteriores = $_SESSION["datosAntEJ10"];
    }


    // Guardo los nuevos datos en la sesión
    $_SESSION["datosAntEJ10"] = $arrayDatos;

    // Muestro los valores actuales
    if (!empty($arrayDatos)) {
        print "<h2>Datos Actuales:</h2>";
        foreach ($arrayDatos as $dato) {
            print("<p>" . $dato . "</p>");
        }
    }

    // Muestro los valores anteriores
    if (!empty($datosAnteriores)) {
        print "<h2>Datos Anteriores:</h2>";
        foreach ($datosAnteriores as $dato) {
            print("<p>" . $dato . "</p>");
        }
    }

    print '<br><button onclick="history.back()">Volver</button>';
}
?>
