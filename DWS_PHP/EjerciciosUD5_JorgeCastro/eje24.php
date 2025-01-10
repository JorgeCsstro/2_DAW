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

$errores = 0;
$erroresArray = [
    'nombre' => '',
    'apellidos' => '',
    'edad' => '',
    'peso' => '',
    'sexo' => '',
    'estado' => '',
    'aficiones' => '',
];

if (isset($_GET['enviar'])) {

    $nombre = $_GET['nombre'];
    $apellidos = $_GET['apellidos'];
    $edad = $_GET['edad'];
    $peso = $_GET['peso'];
    $sexo = $_GET['sexo'] ?? '';
    $estado = $_GET['estado'] ?? '';
    $aficiones = $_GET['aficiones'] ?? '';

    if (empty($nombre)) {
        $errores++;
        $erroresArray['nombre'] = "Rellena el campo de Nombre";
    } elseif (!preg_match('/^[A-Za-z]*$/', $nombre)) {
        $errores++;
        $erroresArray['nombre'] = "Pon letras";
    }

    if (empty($apellidos)) {
        $errores++;
        $erroresArray['apellidos'] = "Rellena el campo de Apellidos";
    } elseif (!preg_match('/^[A-Za-z]*$/', $apellidos)) {
        $errores++;
        $erroresArray['apellidos'] = "Pon letras";
    }

    if (empty($edad)) {
        $errores++;
        $erroresArray['edad'] = "Rellena el campo de Edad";
    } elseif (!preg_match('/^[0-9]*$/', $edad)) {
        $errores++;
        $erroresArray['edad'] = "Pon números";
    }

    if (empty($peso)) {
        $errores++;
        $erroresArray['peso'] = "Rellena el campo de Peso";
    } elseif (!preg_match('/^[0-9]*$/', $peso) || $peso < 10 || $peso > 150) {
        $errores++;
        $erroresArray['peso'] = "Peso tiene que ser un número entre 10 y 150";
    }

    if (empty($sexo)) {
        $errores++;
        $erroresArray['sexo'] = "Rellena el campo de Sexo";
    }

    if (empty($estado)) {
        $errores++;
        $erroresArray['estado'] = "Rellena el campo Estado Civil";
    }

    if (empty($aficiones)) {
        $errores++;
        $erroresArray['aficiones'] = "Selecciona al menos una afición";
    }

    if ($errores < 1) {
        header("Location: personal.php?nombre=$nombre" . "&apellidos=$apellidos" . "&edad=$edad" . "&peso=$peso" . "&sexo=$sexo" . "&estado=$estado" . "&aficiones[]=" . implode('&aficiones[]=', $aficiones));
    }

    
}

?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 24 - Jorge Castro</title>
    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }
        div{
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <h1>Ejercicio 24 - Jorge Castro</h1>

    <form action="eje24.php" method="get">
        <label for="">Nombre:</label>
        <div>
            <input type="text" name="nombre" maxlength="50">
            <span class="error"><?= $erroresArray['nombre'] ?></span>
        </div>

        <label for="">Apellidos:</label>
        <div>
            <input type="text" name="apellidos" maxlength="100">
            <span class="error"><?= $erroresArray['apellidos'] ?></span>
        </div>

        <label for="">Edad:</label>
        <div>
            <input type="text" name="edad">
            <span class="error"><?= $erroresArray['edad'] ?></span>
        </div>

        <label for="">Peso:</label>
        <div>
            <input type="text" name="peso" min="10" max="150">
            <span class="error"><?= $erroresArray['peso'] ?></span>
        </div>

        <label for="">Sexo:</label>
        <div>
            <input type="radio" name="sexo" value="Hombre">Hombre
            <input type="radio" name="sexo" value="Mujer">Mujer
            <input type="radio" name="sexo" value="Otro">Otro
            <span class="error"><?= $erroresArray['sexo'] ?></span>
        </div>

        <label for="">Estado Civil:</label>
        <div>
            <input type="radio" name="estado" value="Soltero">Soltero
            <input type="radio" name="estado" value="Casado">Casado
            <input type="radio" name="estado" value="Viudo">Viudo
            <input type="radio" name="estado" value="Divorciado">Divorciado
            <input type="radio" name="estado" value="Otro">Otro
            <span class="error"><?= $erroresArray['estado'] ?></span>
        </div>

        <label for="">Aficiones:</label>
        <div>
            <select name="aficiones[]" multiple>
                <option value="Cine">Cine</option>
                <option value="Deporte">Deporte</option>
                <option value="Literatura">Literatura</option>
                <option value="Musica">Musica</option>
                <option value="Comics">Comics</option>
                <option value="Series">Series</option>
                <option value="Videojuegos">Videojuegos</option>
            </select>
            <span class="error"><?= $erroresArray['aficiones'] ?></span>
        </div>

        <div></div>
        <div>
            <input type="submit" value="Enviar" name="enviar">
            <input type="reset" value="Borrar" name="borrar">
        </div>
    </form>
</body>

</html>
