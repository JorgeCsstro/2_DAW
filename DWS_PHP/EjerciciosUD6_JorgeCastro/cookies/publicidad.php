<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

/*
    10. Usa el formulario (Ejercicio 22 UD5) que guarde en una Cookie la preferencia del usuario de si
        desea o no recibir publicidad y que muestre la opción anterior y la nueva elegida en caso de que
        la modifique.
*/

if (isset($_GET['enviar'])) {
    
    // Cojo los valores del formulario
    $email = $_GET['email'];
    $publi = isset($_GET['publi']) ? "SI deseo recibir publicidad interesante" : "NO deseo recibir la mejor publicidad del mundo";
    
    $arrayDatos = [$email, $publi];

    $stringDatos = $email . "," . $publi;

    // Creo una cookie para guardar los datos
    setcookie("datosAnt", $stringDatos, time() + (24 * 60 * 60), "/");

    // Los pongo en un array
    $datosCookie = $_COOKIE["datosAnt"];
    $array_datos_cookie = explode(",", $datosCookie);

    // Muestro los valores
    print "<h2>Datos Actuales:</h2>";
    for ($i=0; $i < count($arrayDatos); $i++) { 
        print("<p>" . $arrayDatos[$i] . "</p>");
    }

    print "<h2>Datos Anteriores:</h2>";
    for ($i=0; $i < count($array_datos_cookie); $i++) { 
        print("<p>" . $array_datos_cookie[$i] . "</p>");
    }

    print '<br><button onclick="history.back()">Volver</button>';
}

?>