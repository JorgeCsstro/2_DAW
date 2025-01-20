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

$nombre;
$contrasena;
$nivel;
$nacionalidad;
$idiomas = isset($_POST['idiomas']) ? $_POST['idiomas'] : [];
$email;
$directorio = "fotos/";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];
    $nivel = $_POST['nivel'];
    $nacionalidad = $_POST['nacionalidad'];
    $idiomas = isset($_POST['idiomas']) ? $_POST['idiomas'] : [];
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

    }elseif (!preg_match('/^(?=\w*[a-zA-Z])\S{8,9999}$/', $contrasena)) {
        $errores++;
        $erroresArray['contrasena'] = "Contraseña: Min 8 caracter y una letra";
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

    }elseif (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
        $errores++;
        $erroresArray['email'] = "Pon un Email correcto";
    }

    if (isset($_POST['validar'])) {
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $foto = $_FILES['foto'];
            $fotoName = $foto['name'];
            $fotoTmp = $foto['tmp_name'];
            $fotoSize = $foto['size'];
    
            if ($fotoSize > 51200) {
                $errores++;
                $erroresArray['foto'] = "El archivo excede el tamaño máximo permitido de 50 KB.";
            }
    
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fotoExtension = strtolower(pathinfo($fotoName, PATHINFO_EXTENSION));
            if (!in_array($fotoExtension, $allowedExtensions)) {
                $errores++;
                $erroresArray['foto'] = "Tipo de archivo no permitido. Solo se aceptan archivos JPG, JPEG, PNG, y GIF.";
            }
    
            if ($errores === 0) {
                $uniqueName = uniqid('foto_') . '.' . $fotoExtension;
                $destination = $directorio . $uniqueName;
    
                if (move_uploaded_file($fotoTmp, $destination)) {
                    // Save the photo name to a hidden input
                    $fotoGuarda = $uniqueName;
                } else {
                    $errores++;
                    $erroresArray['foto'] = "No se pudo mover el archivo subido.";
                }
            }
        } else {
            $errores++;
            $erroresArray['foto'] = "Sube una Foto.";
        }
    }
}

if (isset($_POST['enviar'])) {
    if ($errores == 0) {
        $nombre = $_POST['nombre'];
        $fotoGuarda = $_POST['hidden_foto'] ?? '';
        if (strlen($fotoGuarda) > 0) {
            $destination = $directorio . $fotoGuarda;
            header("Location: foto.php?nombre=$nombre&destination=$destination");
        }else {
            $errores++;
            $erroresArray['foto'] = "Sube una Foto.";
        }
    }
}

if (isset($_POST['borrar'])) {
    $nombre = '';
    $contrasena = '';
    $nivel = '';
    $nacionalidad = '';
    $idiomas = isset($_POST['idiomas']) ? $_POST['idiomas'] : [];
    $email = '';
    $fotoGuarda = '';
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

    <?php
        if ($errores == 0 && !isset($_POST['borrar'])) {
            print("<p class='validado'>Todos los campos validados</p>");
            print("<img src='./$destination'>");
        }elseif(!isset($_POST['borrar'])){
            print("<ul>");
            foreach ($erroresArray as $key => $value) {
                if (strlen($erroresArray[$key] > 1)) {
                    print("<li class='error'>" . $erroresArray[$key] . "</li>");
                }
            }
            print("</ul>");
        }
    ?>

    <form action="eje25B.php" method="post" enctype="multipart/form-data">
        <label for="">Nombre:</label>
        <input type="text" name="nombre" value="<?= isset($_POST['borrar']) ? '' : htmlspecialchars($nombre) ?>">
        <br>
        <br>
        <label for="">Contraseña:</label>
        <input type="password" name="contrasena" value="<?= isset($_POST['borrar']) ? '' : htmlspecialchars($contrasena) ?>">
        <br>
        <br>
        <label for="">Nivel de estudios:</label>
        <select name="nivel" value="<?= isset($_POST['borrar']) ? '' : htmlspecialchars($nivel) ?>">
            <option value="Sin estudios" <?= $nivel === "Sin estudios" ? "selected" : "" ?>>Sin estudios</option>
            <option value="ESO" <?= $nivel === "ESO" ? "selected" : "" ?>>ESO</option>
            <option value="Bachillerato" <?= $nivel === "Bachillerato" ? "selected" : "" ?>>Bachillerato</option>
            <option value="FP" <?= $nivel === "FP" ? "selected" : "" ?>>FP</option>
            <option value="Estudios Universitarios" <?= $nivel === "Estudios Universitarios" ? "selected" : "" ?>>Estudios Universitarios</option>
        </select>
        <br>
        <br>
        <label for="">Nacionalidad:</label>
        <select name="nacionalidad" value="<?= isset($_POST['borrar']) ? '' : htmlspecialchars($nacionalidad) ?>">
            <option value="Espanola" <?= $nacionalidad === "Espanola" ? "selected" : "" ?>>Española</option>
            <option value="Otra" <?= $nacionalidad === "Otra" ? "selected" : "" ?>>Otra</option>
        </select>
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
        <br>
        <br>
        <label for="">Email:</label>
        <input type="text" name="email" value="<?= isset($_POST['borrar']) ? '' : htmlspecialchars($email) ?>">
        <br>
        <br>
        <label for="foto">Adjuntar Foto:</label>
        <input type="file" name="foto" id="foto">
        <small>(Solo extensiones jpg, gif y png, tamaño máximo 50 KB)</small>
        <input type="hidden" name="hidden_foto" value="<?= isset($_POST['borrar']) ? '' : htmlspecialchars($fotoGuarda ?? '') ?>">
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
        <input type="submit" value="Validar & Subir foto" name="validar">
        <input type="submit" value="Borrar" name="borrar">
    </form>


        

</body>

</html>