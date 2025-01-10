<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

/*
    24. Escribe un formulario de recogida de datos que conste de dos páginas: En la primera página
        se solicitan los datos y se muestran errores tras validarlos. En la segunda página se muestra toda
        la información introducida por el usuario si no hay errores errores. Los datos a introducir son:
        Nombre, Apellidos, Edad, Peso (entre 10 y 150), Sexo, Estado Civil (Soltero, Casado, Viudo,
        Divorciado, Otro) Aficiones: Cine, Deporte, Literatura, Música, Cómics, Series, Videojuegos.
        Debe tener los botones de Enviar y Borrar
*/

    
    // Cojo los valores del formulario
    $nombre = $_GET['nombre'];
    $apellidos = $_GET['apellidos'];
    $edad = $_GET['edad'];
    $peso = $_GET['peso'];
    $sexo = $_GET['sexo'];
    $estado = $_GET['estado'];
    $aficiones = $_GET['aficiones'];
    
    // Muestro los valores
    print(
            "<br><i>Nombre:</i> <b>" . strtoupper($nombre) . "</b>" .
            "<br><i>Apellidos:</i> <b>" . strtoupper($apellidos) . "</b>" .
            "<br><i>Edad:</i> <b>" . strtoupper($edad) . "</b>" .
            "<br><i>Peso:</i> <b>" . strtoupper($peso) . "</b>" .
            "<br><i>Sexo:</i> <b>" . strtoupper($sexo) . "</b>" .
            "<br><i>Estado:</i> <b>" . strtoupper($estado) . "</b>" .
            "<br><i>Aficiones:</i> <b>" . strtoupper(implode(", ", $aficiones)) . "</b>"
    );

?>