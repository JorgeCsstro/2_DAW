<?php
session_start();

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

$empleados = [
    'Juan' => 3000,
    'Fran' => 2000,
    'Pedro' => 4000
];

function obtenerSalarios($empleados) {
    $salarios = array_values($empleados);
    $max = max($salarios);
    $min = min($salarios);
    $media = array_sum($salarios) / count($salarios);
    return [$max, $min, $media];
}

if (isset($_SESSION['nombre'])) {
    list($max, $min, $media) = obtenerSalarios($empleados);
    $perfil = $_SESSION['perfil'];
} else {
    header('Location: eje1.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Responsable de Nóminas</title>
</head>
<body>
    <h1>Perfil: Responsable de Nóminas</h1>

    <?php
        print "<p>El salario máximo es: $max</p>";
        print "<p>El salario mínimo es: $min</p>";
    ?>
    
    <form method="post">
        <input type="submit" name="cerrar_sesion" value="Cerrar sesión">
    </form>

    <?php
    // Cerrar sesión
    if (isset($_POST['cerrar_sesion'])) {
        session_unset();
        session_destroy();
        header('Location: eje1.php');
        exit();
    }
    ?>
</body>
</html>
