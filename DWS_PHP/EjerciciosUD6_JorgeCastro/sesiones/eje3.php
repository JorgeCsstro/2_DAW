<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

/*

    3.  Usa el formulario del ejercicio 3 de Cookies del selector de operación de modo que uses la
        sesión para mostrar el resultado de la operación indicando cuáles han sido los números, las
        operaciones elegidas y el resultado en la ejecución actual y los números y las operaciones
        elegidas en la ejecución anterior a la actual

*/

session_start();

// Cuando se ha apretado a "enviar"
if (isset($_GET['enviar'])) {

    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $operaciones = $_GET['operaciones'];
    $ope = "";

    // Si los 2 apartados introducidos són números
    if (is_numeric($num1) && is_numeric($num2)) {

        $arrayNums = [$num1, $num2];

        // Por cada operación pondrá una línea con el resultado
        for ($i = 0; $i < count($operaciones); $i++) {
            switch ($operaciones[$i]) {
                case '+':
                    $ope = "Resultado de la suma: " . $num1 . "+" . $num2 . " = " . $num1 + $num2;
                    $_SESSION['opeActualEJ3'] = $ope;
                    break;
                case '-':
                    $ope ="Resultado de la resta: " . $num1 . "-" . $num2 . " = " . $num1 - $num2;
                    $_SESSION['opeActualEJ3'] = $ope;
                    break;
                case '*':
                    $ope = "Resultado de la multiplicación: " . $num1 . "*" . $num2 . " = " . $num1 * $num2;
                    $_SESSION['opeActualEJ3'] = $ope;
                    break;
                case '/':
                    // Errores para división
                    if ($num2 == 0) {
                        $ope = "Error de division: No se puede dividir entre 0";
                        $_SESSION['opeActualEJ3'] = $ope;
                        break;
                    } else {
                        $ope ="Resultado de la división: " . $num1 . "/" . $num2 . " = " . $num1 / $num2;
                        $_SESSION['opeActualEJ3'] = $ope;
                        break;
                    }
            }
        }
        // Cojo el valor de la operación hecha
        if (isset($_SESSION['opeActualesAnteriorEJ3'])) {
            $_SESSION['opeAnteriorEJ3'] = $_SESSION['opeActualesAnteriorEJ3'];
            $_SESSION['numsAnteriorEJ3'] = $_SESSION['numsActualesAnteriorEJ3'];
        }
    
        $_SESSION['opeActualesAnteriorEJ3'] = $_SESSION['opeActualEJ3'];
        $_SESSION['numsActualesAnteriorEJ3'] = $arrayNums;
    } else {
        echo ("Por favor introduzca números <br>");
    }
}


?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Jorge Castro</title>
</head>

<body>

    <form action="eje3.php" method="get">
        <h1>Ejercicio 3 - Jorge Castro</h1>
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

    <!--Imprimo todos los datos-->
    <?php 
        if (isset($_SESSION['opeActualEJ3'])) {
            print "<h2>Datos Actuales:</h2>";
            print("<p>" . $_SESSION['opeActualEJ3'] . "</p>");
        }

        if (isset($_SESSION['opeAnteriorEJ3'])) {
            print "<h2>Datos Anteriores:</h2>";
            print("<p>" . $_SESSION['opeAnteriorEJ3'] . "</p>");
        }
    ?>

</body>

</html>