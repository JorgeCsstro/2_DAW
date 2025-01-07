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
    
    // Muestro los valores
    print(
            "<br><i>Email:</i> <b>" . strtoupper($email) . "</b>" .
            "<br><i>Publicidad:</i> <b>" . strtoupper($publi) . "</b>"
    );
}

?>