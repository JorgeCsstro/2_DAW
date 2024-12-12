<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        12. Ejercicio 5. Realiza el control de acceso a una caja fuerte. La combinación será un número de
        4 cifras. El programa nos pedirá la combinación para abrirla. Si no acertamos, se nos mostrará el
        mensaje “Lo siento, esa no es la combinación” en color rojo y si acertamos se nos dirá “La caja
        fuerte se ha abierto satisfactoriamente” en color verde. Tendremos cuatro oportunidades para
        abrir la caja fuerte.
    */

    // Random de combinación
    $numArr =   [4, 4, 4, 4];
        
    $combinacion = implode("", $numArr);

    // Imprime clave caja
    print("Combinación: $combinacion<br>");

    if (isset($_GET['enviar'])) {
        
        $clave = $_GET['clave'];

        if ($clave == $combinacion) {
            print('<p style="color:green";>La caja fuerte se ha abierto satisfactoriamente</p>');
        }else{
            print('<p style="color:red";> Lo siento, esa no es la combinación</p>');
        }
    }
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12 - Jorge Castro</title>
</head>

<body>
    <form action="eje12.php" method="get">
        <h1>Ejercicio 12 - Jorge Castro</h1>
        <label for="">Clave caja:</label>
        <input type="text" name="clave" required>
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>

</html>
