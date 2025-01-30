<?php
// Iniciar la sesión
session_start();

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

/*
    1. Usa el formulario del ejercicio 1 de Cookies de saludo o despedida de modo que uses la sesión
    para mostrar el usuario y saludo actuales y además muestre el usuario y saludo anterior.
*/

if (isset($_GET['enviar'])) {

    // Obtener los datos del formulario
    $nombre = $_GET['nombre'];
    $saldes = $_GET['saldes'];

    // Almacenar los valores actuales en la sesión
    $_SESSION['nombre'] = $nombre;
    $_SESSION['saludo_despedida'] = $saldes;

    // Si existen los datos anteriores en la cookie, los guardamos en la sesión
    if (isset($_COOKIE['datosAnterior'])) {
        $datosCookie = $_COOKIE['datosAnterior'];
        $array_datos_cookie = explode(",", $datosCookie);
        $_SESSION['nombre_anterior'] = $array_datos_cookie[0];
        $_SESSION['saludo_despedida_anterior'] = $array_datos_cookie[1];
    } else {
        // Si no existen datos anteriores en la cookie, inicializamos variables vacías
        $_SESSION['nombre_anterior'] = '';
        $_SESSION['saludo_despedida_anterior'] = '';
    }

    // Guardamos los datos actuales en la cookie como los datos anteriores
    $datos = $nombre . "," . $saldes;
    setcookie("datosAnterior", $datos, time() + (24 * 60 * 60), "/");

    // Mostrar los datos actuales
    $arrayDatos = [$nombre, $saldes];
    
}

?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Jorge Castro</title>
</head>

<body>

    <h1>Ejercicio 1 - Jorge Castro</h1>

    <form action="eje1.php" method="get">
        <label for="">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <br>
        <label for="">Saludo o Despedida:</label>
        <select name="saldes" required>
            <option value="saludo">Saludo</option>
            <option value="despedida">Despedida</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>

</body>

<?php
    print("<h2>Datos Actuales:</h2>");
    foreach ($arrayDatos as $dato) {
        print ("<p>" . htmlspecialchars($dato) . "</p>");
    }

    // Mostrar los datos anteriores desde la sesión
    print("<h2>Datos Anteriores:</h2>");
    for ($i=0; $i < count($array_datos_cookie); $i++) { 
        print("<p>" . $array_datos_cookie[$i] . "</p>");
    }
?>

</html>
