<?php

session_start();

if (isset($_GET['enviar'])) {
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $operaciones = $_GET['operaciones'];

    if (is_numeric($num1) && is_numeric($num2)) {
        $arrayNums = [$num1, $num2];

        if (!isset($_SESSION['opeActualEJ3'])) {
            $_SESSION['opeActualEJ3'] = [];
        }
        if (!isset($_SESSION['opeAnteriorEJ3'])) {
            $_SESSION['opeAnteriorEJ3'] = [];
        }

        $resultados = [];

        foreach ($operaciones as $operacion) {
            switch ($operacion) {
                case '+':
                    $resultados[] = "Resultado de la suma: $num1 + $num2 = " . ($num1 + $num2);
                    break;
                case '-':
                    $resultados[] = "Resultado de la resta: $num1 - $num2 = " . ($num1 - $num2);
                    break;
                case '*':
                    $resultados[] = "Resultado de la multiplicación: $num1 * $num2 = " . ($num1 * $num2);
                    break;
                case '/':
                    if ($num2 == 0) {
                        $resultados[] = "Error: No se puede dividir entre 0";
                    } else {
                        $resultados[] = "Resultado de la división: $num1 / $num2 = " . ($num1 / $num2);
                    }
                    break;
            }
        }

        $_SESSION['opeAnteriorEJ3'] = $_SESSION['opeActualEJ3'];
        $_SESSION['numsAnteriorEJ3'] = $_SESSION['numsActualEJ3'] ?? [];

        $_SESSION['opeActualEJ3'] = $resultados;
        $_SESSION['numsActualEJ3'] = $arrayNums;
    } else {
        echo "<p style='color: red;'>Por favor, introduzca números válidos.</p>";
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
        <label>Número 1:</label>
        <input type="text" name="num1">
        <br><br>
        <label>Número 2:</label>
        <input type="text" name="num2">
        <br><br>
        <label>Operaciones:</label>
        <select multiple size="4" name="operaciones[]">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <br><br>
        <input type="submit" value="Enviar" name="enviar">
    </form>

    <!-- Mostrar resultados actuales -->
    <?php 
        if (!empty($_SESSION['opeActualEJ3'])) {
            echo "<h2>Datos Actuales:</h2>";
            foreach ($_SESSION['opeActualEJ3'] as $operacion) {
                echo "<p>$operacion</p>";
            }
        }

        if (!empty($_SESSION['opeAnteriorEJ3'])) {
            echo "<h2>Datos Anteriores:</h2>";
            foreach ($_SESSION['opeAnteriorEJ3'] as $operacion) {
                echo "<p>$operacion</p>";
            }
        }
    ?>

</body>
</html>
