<?php
    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    if (isset($_GET['enviar'])) {
        
        // Cojo los valores del formulario
        $nombre = $_GET['nombre'];
        $apellidos = $_GET['apellidos'];
        $email = $_GET['email'];
        $user = $_GET['user'];
        $pass = $_GET['pass'];
        $sexo = $_GET['sexo'];
        $provincia = $_GET['provincia'];
        $horario = $_GET['horario'];
        $conocido = $_GET['conocido'];
        $comentario = $_GET['comentario'];

        // Si he seleccionado o no la casilla
        $noti = isset($_GET['noti']) ? "SI deseo recibir novedades y ofertas" : "NO deseo recibir novedades y ofertas";
        $condi = isset($_GET['condi']) ? "SI he aceptado las condiciones de uso" : "NO he aceptado las condiciones de uso";

        // Muestro los valores
        print(  "<b>Nombre:</b> " . strtoupper($nombre) .
                "<br><b>Apellidos:</b> " . strtoupper($apellidos) . 
                "<br><b>Email:</b> " . strtoupper($email) . 
                "<br><b>User:</b> " . strtoupper($user) . 
                "<br><b>Password:</b> " . strtoupper($pass) . 
                "<br><b>Sexo:</b> " . strtoupper($sexo) . 
                "<br><b>Provincia:</b> " . strtoupper($provincia) . 
                "<br><b>Horario:</b> " . strtoupper(implode(" - ", $horario)) . 
                "<br><b>¿Como nos ha conocido?:</b> " . strtoupper(implode(", ", $conocido)) . 
                "<br><b>Comentario:</b> " . strtoupper($comentario) . 
                "<br><b>Notificaciones:</b> " . strtoupper($noti) . 
                "<br><b>Condiciones:</b> " . strtoupper($condi));
    }
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jorge Castro - Formulario de registro 3</title>
</head>

<body>

    <h1>Jorge Castro - Formulario de registro 3</h1>

    <form action="ejercicio3.php" method="get">
        <label for="">Nombre:</label>
        <input type="text" name="nombre" id="nombre" maxlength="50">
        <br>
        <br>
        <label for="">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" maxlength="200">
        <br>
        <br>
        <label for="">E-Mail:</label>
        <input type="text" name="email" maxlength="250">
        <br>
        <br>
        <label for="">Usuario:</label>
        <input type="text" name="user" maxlength="5">
        <br>
        <br>
        <label for="">Password:</label>
        <input type="password" name="pass" maxlength="15">
        <br>
        <br>
        <label for="">Sexo:</label>
        <input type="radio" name="sexo" value="Hombre">Hombre
        <input type="radio" name="sexo" value="Mujer">Mujer   
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
        <label for="">Horario de contacto:</label>
        <select multiple size="2" name="horario[]">
            <option value="De 8 a 14"> De 8 a 14 horas</option>
            <option value="De 14 a 18"> De 14 a 18 horas</option>
            <option value="De 18 a 21"> De 18 a 21 hora</option>
        </select>
        <br>
        <br>
        <label for="">¿Como nos ha conocido?</label>
        <br>
        <input type="checkbox" name="conocido[]" value="amigo">Un amigo
        <input type="checkbox" name="conocido[]" value="web">Web
        <input type="checkbox" name="conocido[]" value="prensa">Prensa
        <input type="checkbox" name="conocido[]" value="otros">Otros
        <br>
        <br>
        <label for="">Comentario:</label>
        <textarea name="comentario" cols="60" rows="6"></textarea>
        <br>
        <br>
        <input type="checkbox" name="noti" checked>Deseo recibir información sobre novedades y ofertas
        <br>
        <br>
        <input type="checkbox" name="condi">Declaro haber leído y aceptar las condiciones generales 
        del programa y la normativa sobre protección de datos
        <br>
        <br>
        <input type="reset" value="Limpiar">
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>
</html>