<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

/*
    11. Aplica la sesión en el ejercicio 23 de la UD5 para poder pasar los datos en lugar de construir la
        url para enviarlos.
        
*/

session_start(); // Iniciar la sesión

if (isset($_POST['enviar'])) {
    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['nivel'] = $_POST['nivel'];
    $_SESSION['situacion'] = $_POST['situacion'];
    $_SESSION['hobbies'] = $_POST['hobbies'];

    $nombre = $_SESSION['nombre'];
    $email = $_SESSION['email'];
    $nivel = $_SESSION['nivel'];
    $situacion = $_SESSION['situacion'];
    $hobbies = $_SESSION['hobbies'];

    
    // Muestro los valores
    print(
            "<br><i>Nombre:</i> <b>" . strtoupper($nombre) . "</b>" .
            "<br><i>Email:</i> <b>" . $email . "</b>" . 
            "<br><i>Nivel de estudios:</i> <b>" . $nivel . "</b>" .
            "<br><i>Situación:</i> <b>" . strtoupper(implode(", ", $situacion)) . "</b>" .
            "<br><i>Hobbies:</i> <b>" . strtoupper(implode(", ", $hobbies)) . "</b>"
    );
}else {
    header("Location: eje11.php");
    exit();
}

?>