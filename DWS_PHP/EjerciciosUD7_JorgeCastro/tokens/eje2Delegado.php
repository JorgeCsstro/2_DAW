<?php
session_start();

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

if (isset($_SESSION['nombre'])) {
    $perfil = $_SESSION['perfil'];
    $nombre = $_SESSION['nombre'];
    $apellidos = $_SESSION['apellidos'];
    $asignatura = $_SESSION['asignatura'];
    $grupo = $_SESSION['grupo'];

} else {
    header('Location: eje2.php');
    exit();
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
        print "<h1>Perfil: $perfil</h1>";
        print "<p>Bienvenido $nombre $apellidos!</p>";
        print "<p>Estás en la asignatura $asignatura del grupo $grupo</p>";
    ?>
    
    <form method="post">
        <input type="submit" name="cerrar_sesion" value="Cerrar sesión">
    </form>

    <?php
    // Cerrar sesión
    if (isset($_POST['cerrar_sesion'])) {
        session_unset();
        session_destroy();
        header('Location: eje2.php');
        exit();
    }
    ?>
</body>
</html>
