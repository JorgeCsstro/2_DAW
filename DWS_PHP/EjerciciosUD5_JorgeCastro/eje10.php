<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    /*
        10. Ejercicio 23 Dado un vector asociativo de trabajadores con su salario, crea usando funciones
        y a criterio del usuario, el salario máximo, el salario mínimo y el salario medio. (puede elegir uno
        de ellos, varios o todos)

    */

    if (isset($_GET['enviar'])) {

        $empresa = ['Juan' => '3000' , 'Fran' => '2000' , 'Pedro' => '4000'];

        $info = $_GET['info'];

        // Coge todos los salarios y los guarda en un array
        $salarios = array_values($empresa);

        // Coge el salario máximo y mínimo del array
        $max = max($salarios);
        $min = min($salarios);

        // Hace la media sumando todos los salarios del array y dividiendo por cuantos salarios tiene
        $media = array_sum($salarios) / count($salarios);

        // Imprime los resultados
        if (in_array("max", $info)) {
            print("El salario máximo es: $max<br>");
        }
        if (in_array("media", $info)) {
            print("El salario medio es: $media<br>");
        }
        if (in_array("min", $info)) {
            print("El salario mínimo es: $min<br>");
        }
    }
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10 - Jorge Castro</title>
</head>

<body>
    <form action="eje10.php" method="get">
        <h1>Ejercicio 10 - Jorge Castro</h1>
        <label for="">Que información quieres sacar?</label>
        <br>
        <select name="info[]" multiple>
            <option value="max">MAX</option>
            <option value="media">Media</option>
            <option value="min">min</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>

</html>
