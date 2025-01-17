<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

/*
    25. Crea una Web para obtener los siguientes datos: Nombre completo, Contraseña (mínimo 6
        caracteres), Nivel de Estudios(Sin estudios, Educación Secundaria Obligatoria, Bachillerato,
        Formación Profesional, Estudios Universitarios), Nacionalidad (Española, Otra), Idiomas
        (Español, Inglés, Francés, Alemán Italiano), Email, Adjuntar Foto (sólo extensiones jpg, gif y
        png, tamaño máximo 50 KB). Además de las comprobaciones de validación, se debe comprobar
        que sube fichero, que el fichero tiene extensión (puedes usar explode()) y ésta es válida, que hay
        directorio donde guardarlo y que se genera con nombre único. Si todo ha ido bien, redirige al
        usuario a una página donde se le indique que se ha procesado con éxito e incluye tu nombre y
        grupo de clase.
*/

$errores = 1;
$erroresArray = [
    'nombre' => '',
    'contrasena' => '',
    'nivel' => '',
    'nacionalidad' => '',
    'idiomas' => '',
    'email' => '',
    'foto' => ''
];

$nombre;
$contrasena;
$nivel;
$nacionalidad;
$idiomas;
$email;


if (isset($_POST['validar'])) {

    $errores = 0;

    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];
    $nivel = $_POST['nivel'];
    $nacionalidad = $_POST['nacionalidad'];
    $idiomas = $_POST['idiomas'];
    $email = $_POST['email'];

    if (empty($nombre)) {
        $errores++;
        $erroresArray['nombre'] = "Rellena el campo de Nombre";
        print("12");

    } elseif (!preg_match('/^[A-Za-z]*$/', $nombre)) {
        $errores++;
        $erroresArray['nombre'] = "Pon letras";
        print("11");
    }

    if (empty($contrasena)) {
        $errores++;
        $erroresArray['contrasena'] = "Rellena el campo de contrasena";
        print("10");
    }

    if (empty($nivel)) {
        $errores++;
        $erroresArray['nivel'] = "Rellena el campo de Nivel de estudios";
        print("9");
    }

    if (empty($nacionalidad)) {
        $errores++;
        $erroresArray['nacionalidad'] = "Rellena el campo de Nacionalidad";
        print("8");
    }

    if (empty($idiomas)) {
        $errores++;
        $erroresArray['idiomas'] = "Rellena el campo de Idiomas";
        print("7");
    }

    if (empty($email)) {
        $errores++;
        $erroresArray['email'] = "Rellena el campo de Email";
        print("6");

    }elseif (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
        $errores++;
        $erroresArray['email'] = "Pon un Email correcto";
        print("5");
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
            print("4");
        }

        // Validación de extensiones de imagen
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fotoExtension = strtolower(explode('.', $fotoName)[1]);
        if (!in_array($fotoExtension, $allowedExtensions)) {
            $errores++;
            $erroresArray['foto'] = "Tipo de archivo no permitido. Solo se aceptan archivos JPG, JPEG, PNG, y GIF.";
            print("3");
        }
        
        // Crea un id para la imágen
        $uniqueName = uniqid('foto_') . '.' . $fotoExtension;

        // Guarda la imagen en el directorio "fotos"
        $destination = $directorio . $uniqueName;

        // Muestra mi nombre y el grupo de clase
        if (!move_uploaded_file($fotoTmp, $destination)) {
            $errores++;
            $erroresArray['foto'] = "No se pudo mover el archivo subido.";
            print("2");
            
        }
    }else {
        $errores++;
        $erroresArray['foto'] = "Sube una Foto";
        print("1");
    }

}

if (isset($_POST['enviar'])) {
    if ($errores == 0) {
        header("Location: foto.php?nombre=$nombre");
    }
}

?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 25 - Jorge Castro</title>
    <style>
        .error {
            color: red;
        }
        div{
            margin-bottom: 10px;
        }
        .validado{
            color: green;
        }
    </style>
</head>

<body>

    <h1>Ejercicio 25 - Jorge Castro</h1>

    <form action="eje25B.php" method="post" enctype="multipart/form-data">
        <label for="">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo(htmlspecialchars($nombre))?>">
        <span class="error"><?= $erroresArray['nombre'] ?></span>
        <br>
        <br>
        <label for="">Contraseña:</label>
        <input type="password" name="contrasena" value="<?php echo(htmlspecialchars($contrasena))?>">
        <span class="error"><?= $erroresArray['contrasena'] ?></span>
        <br>
        <br>
        <label for="">Nivel de estudios:</label>
        <select name="nivel" value="<?php echo(htmlspecialchars($nivel))?>">
            <option value="Sin estudios" <?= $nivel === "Sin estudios" ? "selected" : "" ?>>Sin estudios</option>
            <option value="ESO" <?= $nivel === "ESO" ? "selected" : "" ?>>ESO</option>
            <option value="Bachillerato" <?= $nivel === "Bachillerato" ? "selected" : "" ?>>Bachillerato</option>
            <option value="FP" <?= $nivel === "FP" ? "selected" : "" ?>>FP</option>
            <option value="Estudios Universitarios" <?= $nivel === "Estudios Universitarios" ? "selected" : "" ?>>Estudios Universitarios</option>
        </select>
        <span class="error"><?= $erroresArray['nivel'] ?></span>
        <br>
        <br>
        <label for="">Nacionalidad:</label>
        <select name="nacionalidad" value="<?php echo(htmlspecialchars($nacionalidad))?>">
            <option value="Espanola" <?= $nacionalidad === "Espanola" ? "selected" : "" ?>>Española</option>
            <option value="Otra" <?= $nacionalidad === "Otra" ? "selected" : "" ?>>Otra</option>
        </select>
        <span class="error"><?= $erroresArray['nacionalidad'] ?></span>
        <br>
        <br>
        <label for="">Idiomas:</label>
        <select name="idiomas[]" multiple>
            <option value="Espanol" <?= in_array("Espanol", $idiomas) ? "selected" : "" ?>>Español</option>
            <option value="Ingles" <?= in_array("Ingles", $idiomas) ? "selected" : "" ?>>Inglés</option>
            <option value="Frances" <?= in_array("Frances", $idiomas) ? "selected" : "" ?>>Francés</option>
            <option value="Aleman" <?= in_array("Aleman", $idiomas) ? "selected" : "" ?>>Alemán</option>
            <option value="Italiano" <?= in_array("Italiano", $idiomas) ? "selected" : "" ?>>Italiano</option>
        </select>
        <span class="error"><?= $erroresArray['idiomas'] ?></span>
        <br>
        <br>
        <label for="">Email:</label>
        <input type="text" name="email" value="<?php echo(htmlspecialchars($email))?>">
        <span class="error"><?= $erroresArray['email'] ?></span>
        <br>
        <br>
        <label for="foto">Adjuntar Foto:</label>
        <input type="file" name="foto" id="foto">
        <small>(Solo extensiones jpg, gif y png, tamaño máximo 50 KB)</small>
        <span class="error"><?= $erroresArray['foto'] ?></span>
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
        <input type="submit" value="Validar" name="validar">
        <input type="reset" value="Borrar" name="borrar">
    </form>


        <?php
            if ($errores == 0) {
                print("<p class='validado'>Todos los campos validados</p>");
                print("<img src='./$destination'>");
            }else{
                print("<ul>");
                foreach ($erroresArray as $key => $value) {
                    if (strlen($erroresArray[$key] > 1)) {
                        print("<li class='error'>" . $erroresArray[$key] . "</li>");
                    }
                }
                print("</ul>");
            }
        ?>

</body>

</html>