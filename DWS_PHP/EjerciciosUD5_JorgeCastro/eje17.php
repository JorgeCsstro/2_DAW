<?php
/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

/*
    17. Escribe un programa que dadas 10 palabras en inglés muestre su traducción al castellano a su
    derecha en una tabla. El usuario debe seleccionar la/s palabra/s a traducir (podría
    seleccionarlas todas)
*/

if (isset($_GET['enviar'])) {

    // Cojo los valores del formulario
    $palabrasSeleccionadas = $_GET['palabras'];

    // Diccionario para las traducciones
    $diccionario = [
        "Hello" => "Hola",
        "House" => "Casa",
        "Dog" => "Perro",
        "Water" => "Agua",
        "Friend" => "Amigo",
        "Love" => "Amor",
        "School" => "Escuela",
        "Night" => "Noche",
        "Happy" => "Feliz",
        "Work" => "Trabajo",
    ];

    // Genero la tabla
    print("<table border='1' style='border-collapse: collapse; width: 50%; text-align: left;'>");
    print("<div><tr><th>Inglés</th><th>Español</th></tr></div>");
    print("<div>");
    foreach ($palabrasSeleccionadas as $palabra) {
        $ingles = array_search($palabra, $diccionario);
        echo "<tr><td>{$ingles}</td><td>{$palabra}</td></tr>";
    }
    echo "</div></table>";
}
?>

<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ejercicio 17 - Jorge Castro</title>
</head>

<body>
<form action="eje17.php" method="get">
    <h1>Ejercicio 17 - Jorge Castro</h1>
    <label for="">Seleccione palabras para traducir:</label>
    <select multiple size="10" name="palabras[]">
        <option value="Hola">Hello</option>
        <option value="Casa">House</option>
        <option value="Perro">Dog</option>
        <option value="Agua">Water</option>
        <option value="Amigo">Friend</option>
        <option value="Amor">Love</option>
        <option value="Escuela">School</option>
        <option value="Noche">Night</option>
        <option value="Feliz">Happy</option>
        <option value="Trabajo">Work</option>
    </select>
    <br><br>
    <input type="submit" value="Enviar" name="enviar">
</form>
</body>
</html>
