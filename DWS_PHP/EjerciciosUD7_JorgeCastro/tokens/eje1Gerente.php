<?php
session_start();

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

function obtenerSalarios($empleados) {
    $salarios = array_values($empleados);
    $max = max($salarios);
    $min = min($salarios);
    $media = array_sum($salarios) / count($salarios);
    return [$max, $min, $media];
}

if (isset($_GET['token'])) {
    if (hash_equals($_GET['token'], $_SESSION['token']) === true) {
        $empleados = [
            'Juan' => 3000,
            'Fran' => 2000,
            'Pedro' => 4000
        ];
        list($max, $min, $media) = obtenerSalarios($empleados);
        $perfil = $_SESSION['perfil'];
        print "<h1>Perfil: $perfil</h1>";
        print "<p>El salario máximo es: $max</p>";
        print "<p>El salario mínimo es: $min</p>";
        print "<p>El salario medio es: $media</p>";
        print "<form method='post'>
        <input type='submit' name='new_token' value='Nuevo Token'>
        <input type='submit' name='cerrar_sesion' value='Cerrar sesión'>
        </form>";
    }else{
        print "El token NO COINCIDE";
        print "<form method='post'><input type='submit' name='cerrar_sesion' value='Cerrar sesión'></form>";
    }
} else {
    print "El token NO EXISTE";
    print "<form method='post'><input type='submit' name='cerrar_sesion' value='Cerrar sesión'></form>";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Gerente</title>
</head>
<body>

    <?php
    // Cerrar sesión
    if (isset($_POST['cerrar_sesion'])) {
        session_unset();
        session_destroy();
        header('Location: eje1.php');
        exit();
    }
    if (isset($_POST['new_token'])) {
        $_SESSION["token"] = bin2hex(openssl_random_pseudo_bytes(24));
        header('Refresh: 0');
    }
    ?>
</body>
</html>
