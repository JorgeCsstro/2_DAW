<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

/*
    11. Aplica la sesión en el ejercicio 23 de la UD5 para poder pasar los datos en lugar de construir la
        url para enviarlos.
        
*/

if (isset($_GET['enviar'])) {
    
    // Cojo los valores del formulario
    $nombre = $_GET['nombre'];
    $email = $_GET['email'];
    $nivel = $_GET['nivel'];
    $situacion = $_GET['situacion'];
    $hobbies = $_GET['hobbies'];
    
    // Muestro los valores
    print(
            "<br><i>Nombre:</i> <b>" . strtoupper($nombre) . "</b>" .
            "<br><i>Email:</i> <b>" . $email . "</b>" . 
            "<br><i>Nivel de estudios:</i> <b>" . $nivel . "</b>" .
            "<br><i>Situación:</i> <b>" . strtoupper(implode(", ", $situacion)) . "</b>" .
            "<br><i>Hobbies:</i> <b>" . strtoupper(implode(", ", $hobbies)) . "</b>"
    );
}

?>