
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
        <select multiple size="2" name="horario">
            <option value=" De8a14"> De 8 a 14 horas</option>
            <option value="De14a18"> De 14 a 18 horas</option>
            <option value="De18a21"> De 18 a 21 hora</option>
        </select>
        <br>
        <br>
        <label for="">¿Como nos ha conocido?</label>
        <br>
        <input type="checkbox" name="amigo" value="Si">Un amigo
        <input type="checkbox" name="web" value="Si">Web
        <input type="checkbox" name="prensa" value="Si">Prensa
        <input type="checkbox" name="otros" value="Si">Otros
        <br>
        <br>
        <label for="">Comentario:</label>
        <textarea name="comentario" cols="60" rows="6"></textarea>
        <br>
        <br>
        <input type="checkbox" name="noti" value="Si" checked>Deseo recibir información sobre novedades y ofertas
        <br>
        <br>
        <input type="checkbox" name="condi" value="Si">Declaro haber leído y aceptar las condiciones generales 
        del programa y la normativa sobre protección de datos
        <br>
        <br>
        <input type="reset" value="Limpiar">
        <input type="submit" value="Enviar">
        
    </form>
</body>
</html>