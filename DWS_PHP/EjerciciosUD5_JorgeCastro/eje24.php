<?php

/*
24. Escribe un formulario de recogida de datos que conste de dos páginas: En la primera página
    se solicitan los datos y se muestran errores tras validarlos. En la segunda página se muestra toda
    la información introducida por el usuario si no hay errores errores. Los datos a introducir son:
    Nombre, Apellidos, Edad, Peso (entre 10 y 150), Sexo, Estado Civil (Soltero, Casado, Viudo,
    Divorciado, Otro) Aficiones: Cine, Deporte, Literatura, Música, Cómics, Series, Videojuegos.
    Debe tener los botones de Enviar y Borrar

    header("Location: personal.php?nombre=" . $nombre)
*/

if (isset($_GET['enviar'])) {

    $errores = 0;
    $nombre = $_GET['nombre'];
    $apellidos = $_GET['apellidos'];
    $edad = $_GET['edad'];
    $peso = $_GET['peso'];
    $sexo = $_GET['sexo'];
    $estado = $_GET['estado'];
    $aficiones = $_GET['aficiones'];

    if (!preg_match('/^[A-Za-z]*$/', $nombre)) {
        $errores++;
    }
    if (!preg_match('/^[A-Za-z]*$/', $apellidos)) {
        $errores++;
    }
    if (!preg_match('/^[0-9]*$/', $edad)) {
        $errores++;
        print "<p>Hola</p>";
    }
    if (!preg_match('/^[0-9]*$/', $peso) || $peso < 10 || $peso > 150) {
        $errores++;
        print "<p>Hola</p>";
    }
    if (empty($sexo)) {
        $errores++;
        print "<p>Hola</p>";
    }

}

?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 24 - Jorge Castro</title>
</head>

<body>

    <h1>Ejercicio 24 - Jorge Castro</h1>

    <form action="eje24.php" method="get">
        <label for="">Nombre:</label>
        <input type="text" name="nombre" maxlength="50">
        <br>
        <br>
        <label for="">Apellidos:</label>
        <input type="text" name="apellidos" maxlength="100">
        <br>
        <br>
        <label for="">Edad:</label>
        <input type="text" name="edad">
        <br>
        <br>
        <label for="">Peso:</label>
        <input type="text" name="peso" min="10" max="150">
        <br>
        <br>
        <label for="">Sexo:</label>
        <input type="radio" name="sexo" value="Hombre">Hombre
        <input type="radio" name="sexo" value="Mujer">Mujer
        <input type="radio" name="sexo" value="Otro">Otro
        <br>
        <br>
        <label for="">Estado Civil:</label>
        <select name="estado">
            <option value="Soltero">Soltero</option>
            <option value="Casado">Casado</option>
            <option value="Viudo">Viudo</option>
            <option value="Divorciado">Divorciado</option>
            <option value="Otro">Otro</option>
        </select>
        <br>
        <br>
        <label for="">Aficiones:</label>
        <select name="aficiones[]" multiple>
            <option value="Cine">Cine</option>
            <option value="Deporte">Deporte</option>
            <option value="Literatura">Literatura</option>
            <option value="Musica">Musica</option>
            <option value="Comics">Comics</option>
            <option value="Series">Series</option>
            <option value="Videojuegos">Videojuegos</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
        <input type="reset" value="Borrar" name="borrar">
    </form>
</body>

</html>