<?php
session_start(); // Iniciar la sesión

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

/*
    13. Aplica la sesión en el ejercicio 25 de la UD5 para poder pasar los datos en lugar de construir la
        url para enviarlos (de la foto sólo enviaremos nombre, extensión, ruta y tamaño).
*/

$errores = 0;
$erroresArray = [
    'nombre' => '',
    'contrasena' => '',
    'nivel' => '',
    'nacionalidad' => '',
    'idiomas' => '',
    'email' => '',
    'foto' => ''
];

if (isset($_POST['enviar'])) {

    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];
    $nivel = $_POST['nivel'];
    $nacionalidad = $_POST['nacionalidad'];
    $idiomas = $_POST['idiomas'];
    $email = $_POST['email'];

    if (empty($nombre)) {
        $errores++;
        $erroresArray['nombre'] = "Rellena el campo de Nombre";
    } elseif (!preg_match('/^[A-Za-z]*$/', $nombre)) {
        $errores++;
        $erroresArray['nombre'] = "Pon letras";
    }

    if (empty($contrasena)) {
        $errores++;
        $erroresArray['contrasena'] = "Rellena el campo de contrasena";
    }

    if (empty($nivel)) {
        $errores++;
        $erroresArray['nivel'] = "Rellena el campo de Nivel de estudios";
    }

    if (empty($nacionalidad)) {
        $errores++;
        $erroresArray['nacionalidad'] = "Rellena el campo de Nacionalidad";
    }

    if (empty($idiomas)) {
        $errores++;
        $erroresArray['idiomas'] = "Rellena el campo de Idiomas";
    }

    if (empty($email)) {
        $errores++;
        $erroresArray['email'] = "Rellena el campo de Email";
    } elseif (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
        $errores++;
        $erroresArray['email'] = "Pon un Email correcto";
    }

    $directorio = "fotos/";

    // Validación de subida de foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['foto'];
        $fotoName = $foto['name'];
        $fotoTmp = $foto['tmp_name'];
        $fotoSize = $foto['size'];

        // < de 50KB de imagen
        if ($fotoSize > 51200) {
            $errores++;
            $erroresArray['foto'] = "El archivo excede el tamaño máximo permitido de 50 KB.";
        }

        // Validación de extensiones de imagen
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fotoExtension = strtolower(explode('.', $fotoName)[1]);
        if (!in_array($fotoExtension, $allowedExtensions)) {
            $errores++;
            $erroresArray['foto'] = "Tipo de archivo no permitido. Solo se aceptan archivos JPG, JPEG, PNG, y GIF.";
        }
        
        // Crea un id para la imágen
        $uniqueName = uniqid('foto_') . '.' . $fotoExtension;

        // Guarda la imagen en el directorio "fotos"
        $destination = $directorio . $uniqueName;

        // Muestra mi nombre y el grupo de clase
        if (!move_uploaded_file($fotoTmp, $destination)) {
            mkdir("./fotos");
            $errores++;
            $erroresArray['foto'] = "No se pudo mover el archivo subido.";
        }
    } else {
        $errores++;
        $erroresArray['foto'] = "Sube una Foto";
    }

    if ($errores < 1) {
        // Guardar datos en la sesión
        $_SESSION['nombre'] = $nombre;
        $_SESSION['contrasena'] = $contrasena;
        $_SESSION['nivel'] = $nivel;
        $_SESSION['nacionalidad'] = $nacionalidad;
        $_SESSION['idiomas'] = $idiomas;
        $_SESSION['email'] = $email;
        $_SESSION['foto'] = [
            'nombre' => $fotoName,
            'extension' => $fotoExtension,
            'ruta' => $destination,
            'tamano' => $fotoSize
        ];

        // Redirigir a la página de éxito
        header("Location: foto.php");
        exit();
    }
}
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13 - Jorge Castro</title>
    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }
        div {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Ejercicio 13 - Jorge Castro</h1>
    <form action="eje13.php" method="post" enctype="multipart/form-data">
        <label for="">Nombre:</label>
        <input type="text" name="nombre">
        <span class="error"><?= $erroresArray['nombre'] ?></span>
        <br><br>
        <label for="">Contraseña:</label>
        <input type="password" name="contrasena">
        <span class="error"><?= $erroresArray['contrasena'] ?></span>
        <br><br>
        <label for="">Nivel de estudios:</label>
        <select name="nivel">
            <option value="Sin estudios">Sin estudios</option>
            <option value="ESO">ESO</option>
            <option value="Bachillerato">Bachillerato</option>
            <option value="FP">FP</option>
            <option value="Estudios Universitarios">Estudios Universitarios</option>
        </select>
        <span class="error"><?= $erroresArray['nivel'] ?></span>
        <br><br>
        <label for="">Nacionalidad:</label>
        <select name="nacionalidad">
            <option value="Espanola">Española</option>
            <option value="Otra">Otra</option>
        </select>
        <span class="error"><?= $erroresArray['nacionalidad'] ?></span>
        <br><br>
        <label for="">Idiomas:</label>
        <select name="idiomas[]" multiple>
            <option value="Espanol">Español</option>
            <option value="Ingles">Inglés</option>
            <option value="Frances">Francés</option>
            <option value="Aleman">Alemán</option>
            <option value="Italiano">Italiano</option>
        </select>
        <span class="error"><?= $erroresArray['idiomas'] ?></span>
        <br><br>
        <label for="">Email:</label>
        <input type="text" name="email">
        <span class="error"><?= $erroresArray['email'] ?></span>
        <br><br>
        <label for="foto">Adjuntar Foto:</label>
        <input type="file" name="foto" id="foto" required accept=".jpg, .jpeg, .gif, .png">
        <small>(Solo extensiones jpg, gif y png, tamaño máximo 50 KB)</small>
        <span class="error"><?= $erroresArray['foto'] ?></span>
        <br><br>
        <input type="submit" value="Enviar" name="enviar">
        <input type="reset" value="Borrar" name="borrar">
    </form>
</body>
</html>