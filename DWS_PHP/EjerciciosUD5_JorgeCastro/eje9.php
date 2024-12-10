<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        9. Ejercicio 8. Crea la tabla de multiplicar de un número indicado por el usuario siendo que el
        multiplicador se podrá seleccionar entre 1 y 10. Se multiplicará desde 1 al multiplicador
        seleccionado.

    */

    if (isset($_GET['enviar'])) {

        $num = $_GET['num'];
        $mult = $_GET['mult'];
        
        // Imprime la tabla hasta el número introducido en el select
        for ($i=1; $i <= $mult; $i++) { 
        
            // Imprime resultado
            print("$num * $i = " . $num * $i . "<br>");
        }
    }
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9 - Jorge Castro</title>
</head>

<body>
    <form action="eje9.php" method="get">
        <h1>Ejercicio 9 - Jorge Castro</h1>
        <label for="">Número a multiplicar</label>
        <input type="text" name="num" id="num">
        <br>
        <br>
        <label for="">Hasta cual número quieres multiplicar?</label>
        <select name="mult">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>                
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>

</html>
