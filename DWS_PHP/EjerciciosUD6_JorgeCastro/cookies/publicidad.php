<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

/*
    22. Escribe un formulario que solicite una dirección de correo y que la confirme e indique si
    acepta recibir publicidad. Añade botón Enviar y Borrar. Cuando enviemos, iremos a otra página
    donde se le indique el email y si ha aceptado recibir publicidad o no. El botón borrar se
    mantendrá en el mismo formulario inicial pero limpiará todos los campos.
*/

if (isset($_GET['enviar'])) {
    
    // Cojo los valores del formulario
    $email = $_GET['email'];
    $publi = isset($_GET['publi']) ? "SI deseo recibir publicidad interesante" : "NO deseo recibir la mejor publicidad del mundo";
    
    $arrayDatos = [$email, $publi];

    $stringDatos = $email . "," . $publi;

    setcookie("datosAnt", $stringDatos, time() + (24 * 60 * 60), "/");

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