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
        $incidencia = $_GET['incidencia'];
        $descIncidencia = $_GET['descIncidencia'];

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
                "<br><b>Tipo de Incidencia:</b> " . strtoupper($incidencia) . 
                "<br><b>Descripción de la Incidencia:</b> " . strtoupper($descIncidencia));
    }
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jorge Castro - Formulario de registro 4</title>
</head>

<body>

    <h1>Jorge Castro - Formulario de registro 4</h1>

    <form action="ejercicio4.php" method="get">
        <fieldset>
            <legend>Datos Personales</legend>
            <label for="">Nombre:</label>
            <input type="text" name="nombre" id="nombre" maxlength="50" placeholder="Escriba su Nombre">
            <br>
            <br>
            <label for="">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" maxlength="200" placeholder="Escriba sus Apellidos">
            <br>
            <br>
            <label for="">E-Mail:</label>
            <input type="text" name="email" maxlength="250" placeholder="usuario@empresa.com">
            <br>
            <br>
            <label for="">Usuario:</label>
            <input type="text" name="user" maxlength="5" placeholder="Escriba su nombre de usuario">
            <br>
            <br>
            <label for="">Password:</label>
            <input type="password" name="pass" maxlength="15" placeholder="Escriba su password">
            <br>
            <br>
            <label for="">Sexo:</label>
            <input type="radio" name="sexo" value="Hombre">Hombre
            <input type="radio" name="sexo" value="Mujer">Mujer
        </fieldset>
        <br>
        <fieldset>
            <legend>Datos de contacto</legend>
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
        </fieldset>
        <br>
        <fieldset>
            <legend>Datos de la incidencia:</legend>
            <label for="">Tipo:</label>
            <select name="incidencia">
                <option value="telef_Fijo">Teléfono fijo</option>
                <option value="telef_Móvil">Teléfono móvil</option>
                <option value="internet">Internet</option>
                <option value="tele">Televisión</option>
            </select>
            <br>
            <br>
            <label for="">Descripción de la incidencia:</label>
            <textarea name="descIncidencia" cols="40" rows="4" placeholder="Describa la incidencia . . ."></textarea>
        </fieldset>
        <br>
        <fieldset>
            <input type="reset" value="Limpiar">
            <input type="submit" value="Enviar" name="enviar">
        </fieldset>
    </form>
</body>
</html>