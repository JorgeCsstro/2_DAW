<?php
session_start();

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

if (isset($_GET['tokenEJ2'])) {
    if (hash_equals($_GET['tokenEJ2'], $_SESSION['tokenEJ2']) === true) {
        $perfil = $_SESSION['perfil'];
        $nombre = $_SESSION['nombre'];
        $apellidos = $_SESSION['apellidos'];
        $asignatura = $_SESSION['asignatura'];
        $grupo = $_SESSION['grupo'];

        print "<h1>Perfil: $perfil</h1>";
        print "<p>Bienvenido $nombre $apellidos!</p>";
        print "<p>Estás en la asignatura $asignatura del grupo $grupo</p>";
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
    <title>Página de <?php echo $perfil?></title>
</head>
<body>
    
    <?php
    // Cerrar sesión
    if (isset($_POST['cerrar_sesion'])) {
        session_unset();
        session_destroy();
        header('Location: eje2.php');
        exit();
    }
    if (isset($_POST['new_token'])) {
        $_SESSION["tokenEJ2"] = bin2hex(openssl_random_pseudo_bytes(24));
        header('Refresh: 0');
    }
    ?>
</body>
</html>
