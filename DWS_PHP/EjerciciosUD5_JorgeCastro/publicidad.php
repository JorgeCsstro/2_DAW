<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

/*
    13. Formulario 1, petición por GET y mostrar en NombreAlumnoForm1OK.php los resultados
    indicando el campo en cursiva y el contenido en negrita
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