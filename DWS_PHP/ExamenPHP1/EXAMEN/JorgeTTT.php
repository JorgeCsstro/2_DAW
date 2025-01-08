<?php

    /**
     * @author Jorge Castro <jorgecastrot2005@gmail.com>
    */

    $fichaNoElegida = true;
    $jugadores = [];
    $matriz = [];
    

    for ($n = 0; $n < 3; $n++) {
        for ($m = 0; $m < 3; $m++) {
            $matriz[$n][$m] = "";
        }
    }

    function iniciarPartida($jugadores){
        $seguir = true;

        $turno = 0;
        // Creo el tablero
        for ($n = 0; $n < 3; $n++) {
            for ($m = 0; $m < 3; $m++) {
                $matriz[$n][$m] = " ";
            }
        }
        
        for ($i=1; $i <= 3; $i++) { 
            imprimirTablero($matriz);
            while ($seguir == true) {
                if ($turno == 0) {
                    $fila = readline($jugadores[0]["nombre"] . "(" . $jugadores[0]["caracter"] . "), indica la fila (0-2) o escribe 's' para abandonar la partida: ");
                    $columna = readline($jugadores[0]["nombre"] . "(" . $jugadores[0]["caracter"] . "), indica la columna (0-2) o escribe 's' para abandonar la partida: ");
                    //if ($fila || $fila == 's') {
                    //    $seguir = false;
                    //    $jugadores[1]["wins"] += 1;
                    //    print("\n!". $jugadores[1]["nombre"] ." ha ganado esta partida¡\n");
                    //}else{
                        $matriz[$fila][$columna] = $jugadores[0]["caracter"];
                        $turno = 1;
                        imprimirTablero($matriz);
                        $seguir = verificarGanador($matriz, $jugadores);
                    //}
                    
                }elseif($turno == 1){
                    $fila = readline($jugadores[1]["nombre"] . "(" . $jugadores[1]["caracter"] . "), indica la fila (0-2) o escribe 's' para abandonar la partida: ");
                    $columna = readline($jugadores[1]["nombre"] . "(" . $jugadores[1]["caracter"] . "), indica la columna (0-2) o escribe 's' para abandonar la partida: ");
                    //if ($fila || $fila = 's') {
                    //    $seguir = false;
                    //    $jugadores[0]["wins"] += 1;
                    //    print("\n!". $jugadores[0]["nombre"] ." ha ganado esta partida¡\n");
                    //}else{
                        $matriz[$fila][$columna] = $jugadores[1]["caracter"];
                        $turno = 0;
                        imprimirTablero($matriz);
                        $seguir = verificarGanador($matriz, $jugadores);
                    //}
                }
            }
            $seguir = true;
        }
        if ($jugadores[0]["wins"] == 3) {
            print("\n!". $jugadores[0]["nombre"] ." ha ganado el torneo\n");
            print("\n--- Estadísticas del Torneo ---\n");

        }elseif ($jugadores[1]["wins"] == 3) {
            print("\n!". $jugadores[1]["nombre"] ." ha ganado el torneo\n");
            print("\n--- Estadísticas del Torneo ---\n");
            print($jugadores[0]["nombre"] . "(" . $jugadores[0]["caracter"] . ") - Victorias: " . $jugadores[0]["wins"] . ", Copas: " . $jugadores[0]["copas"] . "\n");
            print($jugadores[1]["nombre"] . "(" . $jugadores[1]["caracter"] . ") - Victorias: " . $jugadores[1]["wins"] . ", Copas: " . $jugadores[1]["copas"] . "\n");
        }
    }
    
    function imprimirTablero($matriz){
        for ($n = 0; $n < 3; $n++) {
            for ($m = 0; $m < 3; $m++) {
                if ($m != 2) {
                    print(" " . $matriz[$n][$m] . " |");
                }else {
                    print(" " . $matriz[$n][$m]);
                }
            }
            if ($n != 2) {
                print("\n---|---|---\n");
            }else {
                print("\n");
            }
            
        }
    }

    function verificarGanador($matriz, &$jugadores) {
        // Check rows and columns
        for ($i = 0; $i < 3; $i++) {
            // Check row
            if ($matriz[$i][0] !== " " && $matriz[$i][0] === $matriz[$i][1] && $matriz[$i][1] === $matriz[$i][2]) {
                foreach ($jugadores as $jugador) {
                    if ($jugador["caracter"] === $matriz[$i][0]) {
                        $jugador["wins"] += 1;
                        print("\n!". $jugador["nombre"] ." ha ganado esta partida¡\n");
                        return false;
                    }
                }
                
            }
    
            // Check column
            if ($matriz[0][$i] !== " " && $matriz[0][$i] === $matriz[1][$i] && $matriz[1][$i] === $matriz[2][$i]) {
                foreach ($jugadores as $jugador) {
                    if ($jugador["caracter"] === $matriz[0][$i]) {
                        $jugador["wins"] += 1;
                        print("\n!". $jugador["nombre"] ." ha ganado esta partida¡\n");
                        return false;
                    }
                }
            }
        }
    
        // Check diagonals
        if ($matriz[0][0] !== " " && $matriz[0][0] === $matriz[1][1] && $matriz[1][1] === $matriz[2][2]) {
            foreach ($jugadores as $jugador) {
                if ($jugador["caracter"] === $matriz[0][0]) {
                    $jugador["wins"] += 1;
                    print("\n!". $jugador["nombre"] ." ha ganado esta partida¡\n");
                    return false;
                }
            }
        }
        if ($matriz[0][2] !== " " && $matriz[0][2] === $matriz[1][1] && $matriz[1][1] === $matriz[2][0]) {
            foreach ($jugadores as $jugador) {
                if ($jugador["caracter"] === $matriz[0][2]) {
                    $jugador["wins"] += 1;
                    print("\n!". $jugador["nombre"] ." ha ganado esta partida¡\n");
                    return false;
                }
            }
        }
    
        return tableroLleno($matriz);
    }


    function tableroLleno($matriz){
        $count = 0;
        for ($n = 0; $n < 3; $n++) {
            for ($m = 0; $m < 3; $m++) {
                if ($matriz[$n][$m] != " ") {
                    $count++;
                }
            }
        }
        if ($count == 9) {
            return false;
        }else{
            return true;
        }
    }

    // Elegir ficha
    $nombre1 = readline("Dime el nombre del Jugador1: ");
    $nombre2 = readline("Dime el nombre del Jugador2: ");
    while($fichaNoElegida){
        $tipoFicha = readline("Dime que carácter quieres de ficha ($nombre1): ");
        if (strlen($tipoFicha) == 1) {
            $fichaNoElegida = false;
        }
        $jugadores[] = [
            "nombre" => $nombre1,
            "caracter" => $tipoFicha,
            "wins" => 0,
            "losses" => 0,
            "copas" => 0
        ];
    }

    $fichaNoElegida = true;

    while($fichaNoElegida){
        $tipoFicha = readline("Dime que carácter quieres de ficha ($nombre2): ");
        if (strlen($tipoFicha) == 1) {
            $fichaNoElegida = false;
        }
        $jugadores[] = [
            "nombre" => $nombre2,
            "caracter" => $tipoFicha,
            "wins" => 0,
            "losses" => 0,
            "copas" => 0
        ];
    }

    iniciarPartida($jugadores);

?>