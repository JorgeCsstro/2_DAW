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

$directorio = "fotos/";

if (isset($_POST['enviar'])) {

    // Validación de subida de foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['foto'];
        $fileName = $file['name'];
        $fileTmp = $file['tmp_name'];
        $fileSize = $file['size'];

        // < de 50KB de imagen
        if ($fileSize > 51200) {
            die(print "Error: El archivo excede el tamaño máximo permitido de 50 KB.");
        }

        // Validación de extensiones de imagen
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = strtolower(explode('.', $fileName)[1]);
        if (!in_array($fileExtension, $allowedExtensions)) {
            die(print "Error: Tipo de archivo no permitido. Solo se aceptan archivos JPG, JPEG, PNG, y GIF.");
        }
        
        // Crea un id para la imágen
        $uniqueName = uniqid('foto_') . '.' . $fileExtension;

        // Guarda la imagen en el directorio "fotos"
        $destination = $directorio . $uniqueName;

        // Muestra mi nombre y el grupo de clase
        if (move_uploaded_file($fileTmp, $destination)) {
            print "<h1>Archivo subido con éxito</h1>";
            print "<p>Nombre del archivo: $uniqueName</p>";
            $grupo = rand(1,5);
            print "<p>Jorge Castro. Grupo de clase: $grupo</p>";
        } else {
            die(print "Error: No se pudo mover el archivo subido.");
        }
    }
}

?>