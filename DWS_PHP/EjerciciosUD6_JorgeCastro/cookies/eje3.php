<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

/*

    3.  Usa el formulario (Ejercicio 1 UD5) del selector de operación y las operaciones de suma, resta,
        división y multiplicación de modo que se guarde en la Cookie los números y las operaciones
        elegidas y muestre el resultado de la operación indicando cuáles han sido los números, las
        operaciones elegidas y el resultado en la ejecución actual (formulario) y los números y las
        elegidas en la operación anterior a la actual (cookie).

*/

// Cuando se ha apretado a "enviar"
if (isset($_GET['enviar'])) {

    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $operaciones = $_GET['operaciones'];
    $ope = "";

    // Si los 2 apartados introducidos són números
    if (is_numeric($num1) && is_numeric($num2)) {
        
        // Creo dos cookies para almacenar los datos actuales
        setcookie("num1", $num1, time() + (24 * 60 * 60), "/");
        setcookie("num2", $num2, time() + (24 * 60 * 60), "/");

        // Por cada operación pondrá una línea con el resultado
        for ($i = 0; $i < count($operaciones); $i++) {
            switch ($operaciones[$i]) {
                case '+':
                    $ope = "Resultado de la suma: " . $num1 . "+" . $num2 . " = " . $num1 + $num2;
                    setcookie("OpeAnt", "Resultado de la suma: " . $num1 . "+" . $num2 . " = " . $num1 + $num2, time() + (24 * 60 * 60), "/");
                    break;
                case '-':
                    $ope ="Resultado de la resta: " . $num1 . "-" . $num2 . " = " . $num1 - $num2;
                    setcookie("OpeAnt", "Resultado de la resta: " . $num1 . "-" . $num2 . " = " . $num1 - $num2, time() + (24 * 60 * 60), "/");
                    break;
                case '*':
                    $ope = "Resultado de la multiplicación: " . $num1 . "*" . $num2 . " = " . $num1 * $num2;
                    setcookie("OpeAnt", "Resultado de la multiplicación: " . $num1 . "*" . $num2 . " = " . $num1 * $num2, time() + (24 * 60 * 60), "/");
                    break;
                case '/':
                    // Errores para división
                    if ($num2 == 0) {
                        $ope = "Error de division: No se puede dividir entre 0";
                        setcookie("OpeAnt", "Error de division: No se puede dividir entre 0", time() + (24 * 60 * 60), "/");
                        break;
                    } else {
                        $ope ="Resultado de la división: " . $num1 . "/" . $num2 . " = " . $num1 / $num2;
                        setcookie("OpeAnt", "Resultado de la división: " . $num1 . "/" . $num2 . " = " . $num1 / $num2, time() + (24 * 60 * 60), "/");
                        break;
                    }
            }
        }
        // Cojo el valor de la operación hecha
        $datosCookie = $_COOKIE["OpeAnt"];
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
    <h2>Datos Actuales:</h2>
    <?php 
        print("<p>" . $ope . "</p>");
    ?>
    <h2>Datos Anteriores:</h2>
    <?php 
        print("<p>" . $datosCookie . "</p>");
    ?>

</body>

</html>