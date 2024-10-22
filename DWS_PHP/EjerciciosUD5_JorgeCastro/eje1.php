<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

// Cuando se ha apretado a "enviar"
if (isset($_GET['enviar'])) {

    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $operaciones = $_GET['operaciones'];

    if (is_numeric($num1) && is_numeric($num2)) {
        for ($i = 0; $i < count($operaciones); $i++) {
            switch ($operaciones[$i]) {
                case '+':
                    print("Resultado de la suma: " . $num1 . "+" . $num2 . " = " . $num1 + $num2 . "<br>");
                    break;
                case '-':
                    print("Resultado de la resta: " . $num1 . "-" . $num2 . " = " . $num1 - $num2 . "<br>");
                    break;
                case '*':
                    print("Resultado de la multiplicación: " . $num1 . "*" . $num2 . " = " . $num1 * $num2 . "<br>");
                    break;
                case '/':
                    if ($num2 == 0) {
                        print("Resultado de la división: No se puede dividir entre 0 <br>");
                        break;
                    } else {
                        print("Resultado de la división: " . $num1 . "/" . $num2 . " = " . $num1 / $num2 . "<br>");
                        break;
                    }
            }
        }
    } else {
        echo ("Por favor introduzca números <br>");
    }
}


?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Jorge Castro</title>
</head>

<body>

    <form action="eje1.php" method="get">
        <h1>Ejercicio 1 - Jorge Castro</h1>
        <label for="">Número 1:</label>
        <input type="text" name="num1" id="num1">
        <br>
        <br>
        <label for="">Número 2:</label>
        <input type="text" name="num2" id="num2">
        <br>
        <br>
        <label for="">Operaciones: </label>
        <select multiple size="4" name="operaciones[]">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>

</body>

</html>