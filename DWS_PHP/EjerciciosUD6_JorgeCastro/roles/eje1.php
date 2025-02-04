<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

session_start();

if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $perfil = $_POST['perfil'];

    if (isset($perfil)) {
        $_SESSION['nombre'] = $nombre;
        $_SESSION['perfil'] = $perfil;
        switch ($_SESSION['perfil']) {
            case 'Gerente':
                $location = 'Location: eje1Gerente.php';
                break;
            case 'Sindicalista':
                $location = 'Location: eje1Sindicalista.php';
                break;
            case 'Responsable':
                $location = 'Location: eje1Responsable.php';
                break;
        }
        header($location);
        exit();
    } else {
        echo "<p>Perfil no válido.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Jorge Castro</title>
</head>
<body>
    <h1>Ejercicio 1 - Jorge Castro</h1>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br><br>

        <label for="perfil">Selecciona tu perfil:</label>
        <select name="perfil" required>
            <option value="Gerente">Gerente</option>
            <option value="Sindicalista">Sindicalista</option>
            <option value="Responsable">Responsable de Nóminas</option>
        </select><br><br>

        <input type="submit" name="enviar" value="Entrar">
    </form>
</body>
</html>
