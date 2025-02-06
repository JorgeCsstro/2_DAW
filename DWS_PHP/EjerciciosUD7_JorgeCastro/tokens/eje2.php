<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['enviar'])) {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $asignatura = $_POST['asignatura'];
        $grupo = $_POST['grupo'];
        $edad = $_POST['edad'];
        $cargo = $_POST['cargo'];
    
        if (isset($nombre)) {
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellidos'] = $apellidos;
            $_SESSION['asignatura'] = $asignatura;
            $_SESSION['grupo'] = $grupo;
            $_SESSION['edad'] = $edad;
            $_SESSION['cargo'] = $cargo;
            
        
            if ($_SESSION['edad'] === 'mayor') {
                if ($_SESSION['cargo'] === 'con') {
                    $_SESSION['perfil'] = 'Director';
                    $location = 'Location: eje2Director.php';
                }else {
                    $_SESSION['perfil'] = 'Profesor';
                    $location = 'Location: eje2Profesor.php';
                }
            }else {
                if ($_SESSION['cargo'] === 'con') {
                    $_SESSION['perfil'] = 'Delegado';
                    $location = 'Location: eje2Delegado.php';
                }else {
                    $_SESSION['perfil'] = 'Estudiante';
                    $location = 'Location: eje2Estudiante.php';
                }
            }
            header($location);
            exit();
        } else {
            echo "<p>Perfil no válido.</p>";
        }
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
        <label for="">Nombre:</label>
        <input type="text" name="nombre" required><br><br>
        <label for="">Apellidos:</label>
        <input type="text" name="apellidos" required><br><br>
        <label for="">Asignatura:</label>
        <input type="text" name="asignatura" required><br><br>
        <label for="">Grupo:</label>
        <input type="text" name="grupo" required><br><br>

        <label for="">Eres mayor o menor de edad?:</label>
        <select name="edad" required>
            <option value="mayor">Mayor</option>
            <option value="menor">Menor</option>
        </select><br><br>

        <label for="">Tienes cargo?:</label>
        <select name="cargo" required>
            <option value="con">Con cargo</option>
            <option value="sin">Sin cargo</option>
        </select><br><br>

        <input type="submit" name="enviar" value="Entrar">
    </form>
</body>
</html>
