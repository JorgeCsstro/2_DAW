<?php
    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    if (isset($_GET['enviar'])) {
        
        // Cojo los valores del formulario
        $nombre = $_GET['nombre'];
        $apellidos = $_GET['apellidos'];
        $sexo = $_GET['sexo'];
        $email = $_GET['email'];
        $provincia = $_GET['provincia'];

        // Si he seleccionado o no la casilla
        $noti = isset($_GET['noti']) ? "SI deseo recibir novedades y ofertas" : "NO deseo recibir novedades y ofertas";
        $condi = isset($_GET['condi']) ? "SI he aceptado las condiciones de uso" : "NO he aceptado las condiciones de uso";
        
        // Muestro los valores
        print(  "<b>Nombre:</b> " . strtoupper($nombre) .
                "<br><b>Apellidos:</b> " . strtoupper($apellidos) . 
                "<br><b>Sexo:</b> " . strtoupper($sexo) . 
                "<br><b>Email:</b> " . strtoupper($email) . 
                "<br><b>Provincia:</b> " . strtoupper($provincia) . 
                "<br><b>Notificaciones:</b> " . strtoupper($noti) . 
                "<br><b>Condiciones:</b> " . strtoupper($condi));
    }
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jorge Castro - Formulario de registro</title>
</head>

<body>

    <h1>Jorge Castro - Formulario de registro</h1>

    <form action="ejercicio1.php" method="get">
        <label for="">Nombre:</label>
        <input type="text" name="nombre" id="nombre" maxlength="50">
        <br>
        <br>
        <label for="">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" maxlength="200">
        <br>
        <br>
        <label for="">Sexo:</label>
        <input type="radio" name="sexo" value="Hombre">Hombre
        <input type="radio" name="sexo" value="Mujer">Mujer
        <br>
        <br>
        <label for="">E-Mail:</label>
        <input type="text" name="email" maxlength="250">
        <br>
        <br>
        <label for="">Provincia:</label>
        <select name="provincia">
            <option value="Alicante">Alicante</option>
            <option value="Castellon">Castellón</option>
            <option value="Valencia">Valencia</option>
        </select>
        <br>
        <br>
        <input type="checkbox" name="noti"checked>Deseo recibir información sobre novedades y ofertas
        <br>
        <br>
        <input type="checkbox" name="condi">Declaro haber leído y aceptar las condiciones generales 
        del programa y la normativa sobre protección de datos
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>

</body>

</html>