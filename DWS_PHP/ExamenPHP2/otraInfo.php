////////////////////////////

Formulario HTML:
<form action="respuesta.php?valor=10" method="POST">
<input type="text" name="nombre">
</form>
● PHP (¿qué obtenemos en cada caso?)
<?
echo 'valor: '.$_GET['valor'].'<br>';
echo 'valor: '.$_POST['valor'].'<br>';
echo 'valor: '.$_REQUEST['valor'].'<br>';
echo 'nombre: '.$_GET['nombre'].'<br>';
echo 'nombre: '.$_POST['nombre'].'<br>';
echo 'nombre: '.$_REQUEST['nombre'].'<br>';
?>

///////////////////////////

$_FILES['imagen']['name']: Nombre original del fichero
en el cliente

● $_FILES['imagen']['type']: Tipo MIME del fichero. Por
ejemplo, "image/gif“

● $_FILES['imagen']['size']: Tamaño en bytes del fichero
subido

● $_FILES['imagen']['tmp_name']: Nombre temporal del
fichero que se genera para guardar el fichero subido

● $_FILES['imagen']['error']: Código de error asociado a
la subida del fichero

//////////////////////////////////