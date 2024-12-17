<?php

/**
 * @author Jorge Castro
 */

/*
    19. Crea un programa donde se le seleccione el curso (radiobutton), los módulos (a seleccionar de
    un desplegable) y las horas (marcar o desmarcar) y genere un horario usando una tabla.
*/

if (isset($_GET['enviar'])) {
    $curso = $_GET['curso'];
    $modulo = $_GET['modulo'];
    $horas = $_GET['horas'];
    
    if ($curso == "primero") {
        if ($modulo == "daw") {
            if ($horas == "si") {
                print("
    <table>
    <h1>Clases de 1º de DAW</h1>
        <tr>
            <th>Clase</th>
            <th>Día</th>
            <th>Hora</th>
            <th>Asignatura</th>
        </tr>
        <tr>
            <td>Clase 1</td>
            <td>Lunes</td>
            <td>8:00 - 9:30</td>
            <td>Desarrollo Frontend</td>
        </tr>
        <tr>
            <td>Clase 2</td>
            <td>Lunes</td>
            <td>10:00 - 11:30</td>
            <td>Desarrollo Backend</td>
        </tr>
        <tr>
            <td>Clase 3</td>
            <td>Miércoles</td>
            <td>8:00 - 9:30</td>
            <td>Gestión de Bases de Datos</td>
        </tr>
        <tr>
            <td>Clase 4</td>
            <td>Miércoles</td>
            <td>10:00 - 11:30</td>
            <td>Diseño de Experiencia de Usuario</td>
        </tr>
        <tr>
            <td>Clase 5</td>
            <td>Jueves</td>
            <td>8:00 - 9:30</td>
            <td>Desarrollo Móvil</td>
        </tr>
        <tr>
            <td>Clase 6</td>
            <td>Jueves</td>
            <td>10:00 - 11:30</td>
            <td>Gestión de Proyectos</td>
        </tr>
        <tr>
            <td>Clase 7</td>
            <td>Viernes</td>
            <td>8:00 - 9:30</td>
            <td>Pruebas de Software y Calidad</td>
        </tr>
    </table>");
            } elseif ($horas == "no") {
                print("
    <table>
    <h1>Clases de 1º de DAW (Sin Hora)</h1>
        <tr>
            <th>Clase</th>
            <th>Día</th>
            <th>Asignatura</th>
        </tr>
        <tr>
            <td>Clase 1</td>
            <td>Lunes</td>
            <td>Desarrollo Frontend</td>
        </tr>
        <tr>
            <td>Clase 2</td>
            <td>Lunes</td>
            <td>Desarrollo Backend</td>
        </tr>
        <tr>
            <td>Clase 3</td>
            <td>Miércoles</td>
            <td>Gestión de Bases de Datos</td>
        </tr>
        <tr>
            <td>Clase 4</td>
            <td>Miércoles</td>
            <td>Diseño de Experiencia de Usuario</td>
        </tr>
        <tr>
            <td>Clase 5</td>
            <td>Jueves</td>
            <td>Desarrollo Móvil</td>
        </tr>
        <tr>
            <td>Clase 6</td>
            <td>Jueves</td>
            <td>Gestión de Proyectos</td>
        </tr>
        <tr>
            <td>Clase 7</td>
            <td>Viernes</td>
            <td>Pruebas de Software y Calidad</td>
        </tr>
    </table>");
            }
        } elseif ($modulo == "dam") {
            if ($horas == "si") {
                print("
    <table>
    <h1>Clases de 1º de DAM</h1>
        <tr>
            <th>Clase</th>
            <th>Día</th>
            <th>Hora</th>
            <th>Asignatura</th>
        </tr>
        <tr>
            <td>Clase 1</td>
            <td>Lunes</td>
            <td>8:00 - 9:30</td>
            <td>Desarrollo Frontend</td>
        </tr>
        <tr>
            <td>Clase 2</td>
            <td>Lunes</td>
            <td>10:00 - 11:30</td>
            <td>Desarrollo Backend</td>
        </tr>
        <tr>
            <td>Clase 3</td>
            <td>Miércoles</td>
            <td>8:00 - 9:30</td>
            <td>Gestión de Bases de Datos</td>
        </tr>
        <tr>
            <td>Clase 4</td>
            <td>Miércoles</td>
            <td>10:00 - 11:30</td>
            <td>Diseño de Experiencia de Usuario</td>
        </tr>
        <tr>
            <td>Clase 5</td>
            <td>Jueves</td>
            <td>8:00 - 9:30</td>
            <td>Desarrollo Móvil</td>
        </tr>
        <tr>
            <td>Clase 6</td>
            <td>Jueves</td>
            <td>10:00 - 11:30</td>
            <td>Gestión de Proyectos</td>
        </tr>
        <tr>
            <td>Clase 7</td>
            <td>Viernes</td>
            <td>8:00 - 9:30</td>
            <td>Pruebas de Software y Calidad</td>
        </tr>
    </table>");
            } elseif ($horas == "no") {
                print("
    <table>
    <h1>Clases de 1º de DAM (Sin Hora)</h1>
        <tr>
            <th>Clase</th>
            <th>Día</th>
            <th>Asignatura</th>
        </tr>
        <tr>
            <td>Clase 1</td>
            <td>Lunes</td>
            <td>Desarrollo Frontend</td>
        </tr>
        <tr>
            <td>Clase 2</td>
            <td>Lunes</td>
            <td>Desarrollo Backend</td>
        </tr>
        <tr>
            <td>Clase 3</td>
            <td>Miércoles</td>
            <td>Gestión de Bases de Datos</td>
        </tr>
        <tr>
            <td>Clase 4</td>
            <td>Miércoles</td>
            <td>Diseño de Experiencia de Usuario</td>
        </tr>
        <tr>
            <td>Clase 5</td>
            <td>Jueves</td>
            <td>Desarrollo Móvil</td>
        </tr>
        <tr>
            <td>Clase 6</td>
            <td>Jueves</td>
            <td>Gestión de Proyectos</td>
        </tr>
        <tr>
            <td>Clase 7</td>
            <td>Viernes</td>
            <td>Pruebas de Software y Calidad</td>
        </tr>
    </table>");
            }
        }
    } elseif ($curso == "segundo") {
        if ($modulo == "daw") {
            if ($horas == "si") {
                print("
    <table>
    <h1>Clases de 2º de DAW</h1>
        <tr>
            <th>Clase</th>
            <th>Día</th>
            <th>Hora</th>
            <th>Asignatura</th>
        </tr>
        <tr>
            <td>Clase 1</td>
            <td>Lunes</td>
            <td>8:00 - 9:30</td>
            <td>Desarrollo Frontend</td>
        </tr>
        <tr>
            <td>Clase 2</td>
            <td>Lunes</td>
            <td>10:00 - 11:30</td>
            <td>Desarrollo Backend</td>
        </tr>
        <tr>
            <td>Clase 3</td>
            <td>Miércoles</td>
            <td>8:00 - 9:30</td>
            <td>Gestión de Bases de Datos</td>
        </tr>
        <tr>
            <td>Clase 4</td>
            <td>Miércoles</td>
            <td>10:00 - 11:30</td>
            <td>Diseño de Experiencia de Usuario</td>
        </tr>
        <tr>
            <td>Clase 5</td>
            <td>Jueves</td>
            <td>8:00 - 9:30</td>
            <td>Desarrollo Móvil</td>
        </tr>
        <tr>
            <td>Clase 6</td>
            <td>Jueves</td>
            <td>10:00 - 11:30</td>
            <td>Gestión de Proyectos</td>
        </tr>
        <tr>
            <td>Clase 7</td>
            <td>Viernes</td>
            <td>8:00 - 9:30</td>
            <td>Pruebas de Software y Calidad</td>
        </tr>
    </table>");
            } elseif ($horas == "no") {
                print("
    <table>
    <h1>Clases de 2º de DAW (Sin Hora)</h1>
        <tr>
            <th>Clase</th>
            <th>Día</th>
            <th>Asignatura</th>
        </tr>
        <tr>
            <td>Clase 1</td>
            <td>Lunes</td>
            <td>Desarrollo Frontend</td>
        </tr>
        <tr>
            <td>Clase 2</td>
            <td>Lunes</td>
            <td>Desarrollo Backend</td>
        </tr>
        <tr>
            <td>Clase 3</td>
            <td>Miércoles</td>
            <td>Gestión de Bases de Datos</td>
        </tr>
        <tr>
            <td>Clase 4</td>
            <td>Miércoles</td>
            <td>Diseño de Experiencia de Usuario</td>
        </tr>
        <tr>
            <td>Clase 5</td>
            <td>Jueves</td>
            <td>Desarrollo Móvil</td>
        </tr>
        <tr>
            <td>Clase 6</td>
            <td>Jueves</td>
            <td>Gestión de Proyectos</td>
        </tr>
        <tr>
            <td>Clase 7</td>
            <td>Viernes</td>
            <td>Pruebas de Software y Calidad</td>
        </tr>
    </table>");
            }
        } elseif ($modulo == "dam") {
            if ($horas == "si") {
                print("
    <table>
    <h1>Clases de 2º de DAM</h1>
        <tr>
            <th>Clase</th>
            <th>Día</th>
            <th>Hora</th>
            <th>Asignatura</th>
        </tr>
        <tr>
            <td>Clase 1</td>
            <td>Lunes</td>
            <td>8:00 - 9:30</td>
            <td>Desarrollo Frontend</td>
        </tr>
        <tr>
            <td>Clase 2</td>
            <td>Lunes</td>
            <td>10:00 - 11:30</td>
            <td>Desarrollo Backend</td>
        </tr>
        <tr>
            <td>Clase 3</td>
            <td>Miércoles</td>
            <td>8:00 - 9:30</td>
            <td>Gestión de Bases de Datos</td>
        </tr>
        <tr>
            <td>Clase 4</td>
            <td>Miércoles</td>
            <td>10:00 - 11:30</td>
            <td>Diseño de Experiencia de Usuario</td>
        </tr>
        <tr>
            <td>Clase 5</td>
            <td>Jueves</td>
            <td>8:00 - 9:30</td>
            <td>Desarrollo Móvil</td>
        </tr>
        <tr>
            <td>Clase 6</td>
            <td>Jueves</td>
            <td>10:00 - 11:30</td>
            <td>Gestión de Proyectos</td>
        </tr>
        <tr>
            <td>Clase 7</td>
            <td>Viernes</td>
            <td>8:00 - 9:30</td>
            <td>Pruebas de Software y Calidad</td>
        </tr>
    </table>");
            } elseif ($horas == "no") {
                print("
    <table>
    <h1>Clases de 2º de DAM (Sin Hora)</h1>
        <tr>
            <th>Clase</th>
            <th>Día</th>
            <th>Asignatura</th>
        </tr>
        <tr>
            <td>Clase 1</td>
            <td>Lunes</td>
            <td>Desarrollo Frontend</td>
        </tr>
        <tr>
            <td>Clase 2</td>
            <td>Lunes</td>
            <td>Desarrollo Backend</td>
        </tr>
        <tr>
            <td>Clase 3</td>
            <td>Miércoles</td>
            <td>Gestión de Bases de Datos</td>
        </tr>
        <tr>
            <td>Clase 4</td>
            <td>Miércoles</td>
            <td>Diseño de Experiencia de Usuario</td>
        </tr>
        <tr>
            <td>Clase 5</td>
            <td>Jueves</td>
            <td>Desarrollo Móvil</td>
        </tr>
        <tr>
            <td>Clase 6</td>
            <td>Jueves</td>
            <td>Gestión de Proyectos</td>
        </tr>
        <tr>
            <td>Clase 7</td>
            <td>Viernes</td>
            <td>Pruebas de Software y Calidad</td>
        </tr>
    </table>");
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 19 - Jorge Castro</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>

    <form action="eje19.php" method="get">
        <h1>Ejercicio 19 - Jorge Castro</h1>

        <!-- Selección del Curso -->
        <label>Dígame el curso:</label><br>
        <input type="radio" id="primero" name="curso" value="primero" selected>
        <label for="primero">1º</label><br>
        <input type="radio" id="segundo" name="curso" value="segundo">
        <label for="segundo">2º</label><br>

        <!-- Selección del Módulo -->
        <label for="modulo">Seleccione un módulo:</label>
        <select name="modulo" id="modulo" required>
            <option value="daw">DAW</option>
            <option value="dam">DAM</option>
        </select><br><br>

        <!-- Selección de Horas -->
        <label for="horas">¿Quieres mostrar las horas?</label>
        <br>
        <select name="horas" id="horas">
            <option value="si">Si</option>
            <option value="no">No</option>
        </select>
        <br><br>

        <input type="submit" value="enviar" name="enviar">
    </form>
</body>

</html>