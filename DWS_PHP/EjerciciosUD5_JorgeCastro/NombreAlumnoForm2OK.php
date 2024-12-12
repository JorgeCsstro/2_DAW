<?php
    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        14. Formulario 2, petición por POST y mostrar en NombreAlumnoForm2OK.php los resultados
        indicando el campo en cursiva y el contenido en negrita
    */

    if (isset($_POST['enviar'])) {
        
        // Cojo los valores del formulario
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $sexo = $_POST['sexo'];
        $provincia = $_POST['provincia'];
        $situacion = $_POST['situacion'];
        $comentario = $_POST['comentario'];

        // Si he seleccionado o no la casilla
        $noti = isset($_POST['noti']) ? "SI deseo recibir novedades y ofertas" : "NO deseo recibir novedades y ofertas";
        $condi = isset($_POST['condi']) ? "SI he aceptado las condiciones de uso" : "NO he aceptado las condiciones de uso";
        
        // Muestro los valores
        print(  "<i>Nombre:</i> <b>" . strtoupper($nombre) . "</b>" .
                "<br><i>Apellidos:</i> <b>" . strtoupper($apellidos) . "</b>" .
                "<br><i>Email:</i> <b>" . strtoupper($email) . "</b>" .
                "<br><i>User:</i> <b>" . strtoupper($user) . "</b>" .
                "<br><i>Password:</i> <b>" . strtoupper($pass) . "</b>" .
                "<br><i>Sexo:</i> <b>" . strtoupper($sexo) . "</b>" .
                "<br><i>Provincia:</i> <b>" . strtoupper($provincia) . "</b>" .
                "<br><i>Situacion:</i> <b>" . strtoupper(implode(" - ", $situacion)) . "</b>" .
                "<br><i>Comentario:</i> <b>" . strtoupper($comentario) . "</b>" .
                "<br><i>Notificaciones:</i> <b>" . strtoupper($noti) . "</b>" .
                "<br><i>Condiciones:</i> <b>" . strtoupper($condi)) . "</b>";
    }
?>
