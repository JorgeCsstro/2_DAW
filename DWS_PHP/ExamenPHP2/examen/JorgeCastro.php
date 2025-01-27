<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
*/

$errores = 1;
$erroresArray = [
    'nombre' => '',
    'email' => '',
    'usuario' => '',
    'contrasena' => '',
    'afectado' => '',
    'poblacion' => '',
    'elementos' => '',
    'necesidades' => '',
    'lopdgdd' => '',
    'foto' => ''
];

$nombre;
$email;
$usuario;
$contrasena;
$afectado;
$poblacion;
$elementos = isset($_POST['elementos']) ? $_POST['elementos'] : [];
$necesidades = isset($_POST['necesidades']) ? $_POST['necesidades'] : [];
$lopdgdd;

$directorio = "img/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errores = 0;

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $afectado = $_POST['afectado'];
    $poblacion = $_POST['poblacion'];
    $elementos = isset($_POST['elementos']) ? $_POST['elementos'] : [];
    $necesidades = isset($_POST['necesidades']) ? $_POST['necesidades'] : [];
    $lopdgdd = $_POST['lopdgdd'];

    if (empty($nombre)) {
        $errores++;
        $erroresArray['nombre'] = "Nombre: Rellena el campo";
    } elseif (!preg_match('/^[A-Z][a-z]+(\s[A-Z][a-z]?){0,}/', $nombre)) {
        $errores++;
        $erroresArray['nombre'] = "Nombre: Solo letras y espacios";
    }

    if (empty($email)) {
        $errores++;
        $erroresArray['email'] = "Email: Rellena el campo";
    } elseif (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
        $errores++;
        $erroresArray['email'] = "Email: Pon un Email correcto";
    }

    if (empty($usuario)) {
        $errores++;
        $erroresArray['usuario'] = "Usuario : Rellena el campo";
    }

    if (empty($contrasena)) {
        $errores++;
        $erroresArray['contrasena'] = "Contraseña: Rellena el campo";
    } elseif (!preg_match('/^\S{6,9999}$/', $contrasena)) {
        $errores++;
        $erroresArray['contrasena'] = "Contraseña: Min 6 carácteres";
    }

    if (empty($afectado)) {
        $errores++;
        $erroresArray['afectado'] = "Afectado : Rellena el campo";
    }

    if (empty($poblacion)) {
        $errores++;
        $erroresArray['poblacion'] = "Poblacion: Rellena el campo";
    }

    if (empty($elementos)) {
        $errores++;
        $erroresArray['elementos'] = "Elementos: Rellena el campo";
    }

    if (empty($necesidades)) {
        $errores++;
        $erroresArray['necesidades'] = "Necesidades: Rellena el campo";
    }

    if (empty($lopdgdd)) {
        $errores++;
        $erroresArray['lopdgdd'] = "LOPDGDD: Debe aceptar para continuar";
    }

    if (isset($_POST['validar'])) {
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $foto = $_FILES['foto'];
            $fotoName = $foto['name'];
            $fotoTmp = $foto['tmp_name'];
            $fotoSize = $foto['size'];

            if ($fotoSize > 102400) {
                $errores++;
                $erroresArray['foto'] = "Foto: El archivo excede el tamaño máximo permitido de 100 KB.";
            }

            $allowedExtension = 'png';
            $fotoExtension = strtolower(pathinfo($fotoName, PATHINFO_EXTENSION));
            if ($fotoExtension != $allowedExtension) {
                $errores++;
                $erroresArray['foto'] = "Foto: Tipo de archivo no permitido (PNG)";
            }

            $nombreFoto = 'foto_' . $usuario . '.' . $fotoExtension;
            $destination = $directorio . $nombreFoto;

            if (move_uploaded_file($fotoTmp, $destination)) {
                $fotoGuarda = $nombreFoto;
            } else {
                mkdir("./img");
                $errores++;
                $erroresArray['foto'] = "Foto: No tenía creada la carpeta 'img', vuelve a intentarlo";
            }
            
        } else {
            $errores++;
            $erroresArray['foto'] = "Foto: Sube una Foto.";
        }
    }
}

if (isset($_POST['enviar'])) {
    if ($errores == 0) {

        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $afectado = $_POST['afectado'];
        $poblacion = $_POST['poblacion'];
        $elementos = isset($_POST['elementos']) ? $_POST['elementos'] : [];
        $necesidades = isset($_POST['necesidades']) ? $_POST['necesidades'] : [];
        $lopdgdd = $_POST['lopdgdd'];

        $fotoGuarda = $_POST['hidden_foto'] ?? '';

        if (strlen($fotoGuarda) > 0) {
            $destination = $directorio . $fotoGuarda;
            $nombreFoto = $fotoGuarda;
            header("Location: JorgeCastro_ok.php?nombre=$nombre&email=$email&usuario=$usuario&contrasena=$contrasena&afectado=$afectado&poblacion=$poblacion&elementos[]=" . implode('&elementos[]=', array_map('urlencode', $elementos)) . "&necesidades[]=" . implode('&necesidades[]=', array_map('urlencode', $necesidades)) . "&lopdgdd=$lopdgdd&destination=$destination&nombreFoto=$nombreFoto");
        } else {
            $errores++;
            $erroresArray['foto'] = "No has validado y guardado la foto";
        }
    }
}

if (isset($_POST['borrar'])) {
    $nombre = '';
    $email = '';
    $usuario = '';
    $contrasena = '';
    $afectado = '';
    $poblacion = '';
    $elementos = [];
    $necesidades = [];
    $lopdgdd = '';
}

?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Examen - Jorge Castro</title>
    <style>
        .error { color: red; }
        img { margin-bottom: 10px;}
        .validado { color: green; }
    </style>
</head>
<body>
    <h1>Ejercicio Examen - Jorge Castro</h1>

    <?php
        if ($errores == 0 && !isset($_POST['borrar'])) {
            print("<p class='validado'>Todos los campos validados</p>");
            print("<img src='./$destination'>");

        }elseif (!isset($_POST['borrar']) && isset($_POST['validar']) && $erroresArray["foto"] == '') {
            print("<ul>");
            foreach ($erroresArray as $key => $value) {
                if (strlen($erroresArray[$key] > 1)) {
                    print("<li class='error'>" . $erroresArray[$key] . "</li>");
                }
            }
            print("</ul>");
            print("<img src='./$destination'>");

        }elseif (!isset($_POST['borrar']) && isset($_POST['validar'])) {
            print("<ul>");
            foreach ($erroresArray as $key => $value) {
                if (strlen($erroresArray[$key] > 1)) {
                    print("<li class='error'>" . $erroresArray[$key] . "</li>");
                }
            }
            print("</ul>");
        }
    ?>

    <form action="JorgeCastro.php" method="post" enctype="multipart/form-data">
        <label for="">Nombre:</label>
        <input type="text" name="nombre" value="<?= isset($_POST['borrar']) ? '' : htmlspecialchars($nombre) ?>">
        <br>
        <br>
        <label for="">Email:</label>
        <input type="text" name="email" value="<?= isset($_POST['borrar']) ? '' : htmlspecialchars($email) ?>">
        <br>
        <br>
        <label for="">Usuario:</label>
        <input type="text" name="usuario" value="<?= isset($_POST['borrar']) ? '' : htmlspecialchars($usuario) ?>">
        <br>
        <br>
        <label for="">Contraseña:</label>
        <input type="password" name="contrasena" value="<?= isset($_POST['borrar']) ? '' : htmlspecialchars($contrasena) ?>">
        <br>
        <br>
        <label>Afectado:</label>
            <label>
                <input type="radio" name="afectado" value="Particular" <?= isset($_POST['borrar']) ? '' : ($afectado === "Particular" ? "checked" : "") ?>> Particular
            </label>
            <label>
                <input type="radio" name="afectado" value="Empresa" <?= isset($_POST['borrar']) ? '' : ($afectado === "Empresa" ? "checked" : "") ?>> Empresa
            </label>
        <br>
        <br>
        <label for="">Población:</label>
        <select name="poblacion" value="<?= isset($_POST['borrar']) ? '' : htmlspecialchars($poblacion) ?>">
            <option value="Aldaia" <?= $poblacion === "Aldaia" ? "selected" : "" ?>>Aldaia</option>
            <option value="Catarroja" <?= $poblacion === "Catarroja" ? "selected" : "" ?>>Catarroja</option>
            <option value="Paiporta" <?= $poblacion === "Paiporta" ? "selected" : "" ?>>Paiporta</option>
            <option value="Picana" <?= $poblacion === "Picana" ? "selected" : "" ?>>Picana</option>
            <option value="Sedavi" <?= $poblacion === "Sedavi" ? "selected" : "" ?>>Sedavi</option>
        </select>
        <br>
        <br>
        <label for="">Elementos afectados:</label>
        <select name="elementos[]" multiple>
            <option value="Casa" <?= in_array("Casa", $elementos) ? "selected" : "" ?>>Casa</option>
            <option value="Bajo" <?= in_array("Bajo", $elementos) ? "selected" : "" ?>>Bajo</option>
            <option value="Comercial" <?= in_array("Comercial", $elementos) ? "selected" : "" ?>>Comercial</option>
            <option value="Sotanos" <?= in_array("Sotanos", $elementos) ? "selected" : "" ?>>Sotanos</option>
            <option value="Garaje" <?= in_array("Garaje", $elementos) ? "selected" : "" ?>>Garaje</option>
            <option value="Trastero" <?= in_array("Trastero", $elementos) ? "selected" : "" ?>>Trastero</option>
            <option value="Vehiculo" <?= in_array("Vehiculo", $elementos) ? "selected" : "" ?>>Vehiculo</option>
        </select>
        <br>
        <br>
        <label for="">Necesidades:</label>
            <input type="checkbox" value="Extracion_Lodo" name="necesidades[]" <?= in_array("Extracion_Lodo", $necesidades) ? "checked" : "" ?>>Extración de lodo
            <input type="checkbox" value="Limpieza" name="necesidades[]" <?= in_array("Limpieza", $necesidades) ? "checked" : "" ?>>Limpieza
            <input type="checkbox" value="Desinfeccion_Secado" name="necesidades[]" <?= in_array("Desinfeccion_Secado", $necesidades) ? "checked" : "" ?>>Desinfección y secado
            <input type="checkbox" value="Revision_Estructura" name="necesidades[]" <?= in_array("Revision_Estructura", $necesidades) ? "checked" : "" ?>>Revisión de Estructura
            <input type="checkbox" value="Tareas_Reconstruccion" name="necesidades[]" <?= in_array("Tareas_Reconstruccion", $necesidades) ? "checked" : "" ?>>Tareas reconstrucción
        <br>
        <br>
        <label for="">LOPDGDD:</label>
        <input type="checkbox" value="Acepto" name="lopdgdd" <?= $lopdgdd === "Acepto" ? "checked" : "" ?>>¿Acepta LOPDGDD?
        <br>
        <br>
        <label for="foto">Adjuntar Foto:</label>
        <input type="file" name="foto" id="foto">
        <small>(Solo extensiones png, tamaño máximo 100 KB)</small>
        <input type="hidden" name="hidden_foto" value="<?= isset($_POST['borrar']) ? '' : htmlspecialchars($fotoGuarda ?? '') ?>">
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
        <input type="submit" value="Validar" name="validar">
        <input type="submit" value="Borrar" name="borrar">
    </form>
</body>
</html>