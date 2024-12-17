<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */
    
    // Para indentificar tipos de carácteres
    $char = readline('Dame un carácter: ');

    if (ctype_lower($char)) {
        print("Soy un carácter de letra Minúscula\n");

    }elseif (ctype_upper($char)) {
        print ("Soy un carácter de letra Mayúcula\n");

    }elseif (ctype_digit($char)) {
        print ("Soy un carácter numérico\n");

    }elseif (ctype_space($char)) {
        print ("Soy un carácter blanco\n");

    }elseif (preg_match('/[^a-zA-Z0-9.:,;]/', $char) > 0) {
        print ("Soy un carácter especial\n");

    }elseif (ctype_punct($char)) {
        print ("Soy un carácter de puntuación\n");

    }

    //Pone la timezone en España
    date_default_timezone_set("Europe/Madrid");

    // Dia y hora actual
    $hoy = date("l, H:i:s");
    
    // printf
    $a = 12.3456;
    $b = 78.91011;
    printf("Números: %.2f y %.2f", $a, $b);

    printf("%02d:%02d:%02d\n", $horas, $minutos, $segundos);

    // Ejemplo de tabla
    $producto = "Laptop";
    $cantidad = 2;
    $precio = 1299.99;
    printf("Producto: %s | Cantidad: %d | Precio: $%.2f\n", $producto, $cantidad, $precio);

    // Función
    function name($smth){}

    // Redondear a bajo
    $base = floor($numArr[0]);

    // Arraypush
    $todasPotencias = [];
    array_push($todasPotencias, $elevado);

    // Reverse array
    $rever = array_reverse($V);

    // Sacar Array
    $a = array ('a' => 'apple', 'b' => 'banana', 'c' => array ('x', 'y', 'z'));
    print_r ($a);

    // Divide el string y lo pone en un array
    $numArr = str_split($num);

    // Voltea el string de los números
    $rever = strrev($num);

    // Combierte array a string
    $numArr =   [rand(0,9), rand(0,9), rand(0,9), rand(0,9)];
    $combinacion = implode("", $numArr);

    // TABLAS
    // MIRA EL EJERCICIO7.PHP DE EJERCICIOSUD3 REFUERZO

    // MATRIZES
    // EJERCICIO 9 Y 10 DE REFUERZO

    // CALCULADORA
    // EJERCICIO 13 REFUERZO

    // Array dentro de array
    $colores = [
        "Rojo" => [
            "price" => 9,
            "year" => 2018,
            "color" => "red"
        ],
        "Verde" => [
            "price" => 5,
            "year" => 2020,
            "color" => "green"
        ],
        "Azul" => [
            "price" => 10,
            "year" => 2019,
            "color" => "blue"
        ]
    ];

    $colores2 = [

        [
            "tipo" => "Azul",
            "price" => "10",
            "year" => 2019,
            "color" => "blue"
        ],
        [
            "tipo" => "Rojo",
            "price" => "9",
            "year" => 2018,
            "color" => "red"
        ]

    ];

    echo $colores["Rojo"]["price"] . "\n"; // Salida: 9
    echo $colores["Verde"]["color"] . "\n"; // Salida: green

    foreach ($colores as $tipo => $info) {
        echo "Tipo: $tipo\n";
        echo "Precio: " . $info["price"] . "\n";
        echo "Año: " . $info["year"] . "\n";
        echo "Color: " . $info["color"] . "\n\n";
    }

    // Añado nuevo array dentro del array
    $colores["Amarillo"] = [
        "price" => 12,
        "year" => 2021,
        "color" => "yellow"
    ];

    $newColor = [
        "model" => "Amarillo",
        "price" => 12,
        "year" => 2021,
        "color" => "yellow"
    ];
    array_push($colores2, $newCar);

    $colores2[] = [
        "model" => "Amarillo",
        "price" => 12,
        "year" => 2021,
        "color" => "yellow"
    ];

    //ELIMINAR UN TIPO

    unset($coloes["Rojo"]);
    unset($coloes2[0]);

    // Cambiar valor
    $cars["Rojo"]["year"] = 1900;

?>