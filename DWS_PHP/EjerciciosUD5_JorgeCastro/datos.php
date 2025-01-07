<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

/*
    23. Escribe un formulario de recogida de datos que conste de dos páginas: En la primera página
    se solicitan los datos y se muestran errores tras validarlos. En la segunda página se muestra toda
    la información introducida por el usuario si no hay errores errores. Los datos a recoger son datos
    personales, nivel de estudios (desplegable), situación actual (selección múltiple: estudiando,
    trabajando, buscando empleo, desempleado) y hobbies (marcar de varios mostrados y poner otro
    con opción a introducir texto)
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