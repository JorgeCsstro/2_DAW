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
                    $columna = readline($jugadores[0]["nombre"] . "(" . $jugadores[0]["caracter"] . "), indica la columna (0-2) o escribe 's' para abandonar la partida: ");
                    $fila = readline($jugadores[0]["nombre"] . "(" . $jugadores[0]["caracter"] . "), indica la fila (0-2) o escribe 's' para abandonar la partida: ");
                    if ($columna || $fila = 's') {
                        $seguir = false;
                        $jugadores[1]["wins"] += 1;
                        print("\n!". $jugadores[1]["nombre"] ." ha ganado esta partida¡\n");
                    }else{
                        $matriz[$columna][$fila] = $jugadores[0]["caracter"];
                        $turno = 1;
                        imprimirTablero($matriz);
                        $seguir = verificarGanador($matriz, $jugadores);
                    }
                    
                }elseif($turno == 1){
                    $columna = readline($jugadores[1]["nombre"] . "(" . $jugadores[1]["caracter"] . "), indica la columna (0-2) o escribe 's' para abandonar la partida: ");
                    $fila = readline($jugadores[1]["nombre"] . "(" . $jugadores[1]["caracter"] . "), indica la fila (0-2) o escribe 's' para abandonar la partida: ");
                    if ($columna || $fila = 's') {
                        $seguir = false;
                        $jugadores[0]["wins"] += 1;
                        print("\n!". $jugadores[0]["nombre"] ." ha ganado esta partida¡\n");
                    }else{
                        $matriz[$columna][$fila] = $jugadores[1]["caracter"];
                        $turno = 0;
                        imprimirTablero($matriz);
                        $seguir = verificarGanador($matriz, $jugadores);
                    }
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

    function verificarGanador($matriz, $jugadores){

        if ($matriz[0][0] && $matriz[0][1] && $matriz[0][2] == $jugadores[0]["caracter"]) {
            $jugadores[0]["wins"] += 1;
            print("\n!". $jugadores[0]["nombre"] ." ha ganado esta partida¡\n");
            return false;

        }elseif ($matriz[0][0] && $matriz[0][1] && $matriz[0][2] == $jugadores[1]["caracter"]){
            $jugadores[1]["wins"] += 1;
            print("\n!". $jugadores[1]["nombre"] ." ha ganado esta partida¡\n");
            return false;

        }elseif ($matriz[0][0] && $matriz[1][0] && $matriz[2][0] == $jugadores[0]["caracter"]){
            $jugadores[0]["wins"] += 1;
            print("\n!". $jugadores[0]["nombre"] ." ha ganado esta partida¡\n");
            return false;

        }elseif ($matriz[0][0] && $matriz[1][0] && $matriz[2][0] == $jugadores[1]["caracter"]){
            $jugadores[1]["wins"] += 1;
            print("\n!". $jugadores[1]["nombre"] ." ha ganado esta partida¡\n");
            return false;

        }elseif ($matriz[1][0] && $matriz[1][1] && $matriz[1][2] == $jugadores[0]["caracter"]){
            $jugadores[0]["wins"] += 1;
            print("\n!". $jugadores[0]["nombre"] ." ha ganado esta partida¡\n");
            return false;

        }elseif ($matriz[1][0] && $matriz[1][1] && $matriz[1][2] == $jugadores[1]["caracter"]){
            $jugadores[1]["wins"] += 1;
            print("\n!". $jugadores[1]["nombre"] ." ha ganado esta partida¡\n");
            return false;

        }elseif ($matriz[0][1] && $matriz[1][1] && $matriz[2][1] == $jugadores[0]["caracter"]){
            $jugadores[0]["wins"] += 1;
            print("\n!". $jugadores[0]["nombre"] ." ha ganado esta partida¡\n");
            return false;

        }elseif ($matriz[0][1] && $matriz[1][1] && $matriz[2][1] == $jugadores[1]["caracter"]){
            $jugadores[1]["wins"] += 1;
            print("\n!". $jugadores[1]["nombre"] ." ha ganado esta partida¡\n");
            return false;

        }elseif ($matriz[2][0] && $matriz[2][1] && $matriz[2][2] == $jugadores[0]["caracter"]){
            $jugadores[0]["wins"] += 1;
            print("\n!". $jugadores[0]["nombre"] ." ha ganado esta partida¡\n");
            return false;

        }elseif ($matriz[2][0] && $matriz[2][1] && $matriz[2][2] == $jugadores[1]["caracter"]){
            $jugadores[1]["wins"] += 1;
            print("\n!". $jugadores[1]["nombre"] ." ha ganado esta partida¡\n");
            return false;

        }elseif ($matriz[0][2] && $matriz[1][2] && $matriz[2][2] == $jugadores[0]["caracter"]){
            $jugadores[0]["wins"] += 1;
            print("\n!". $jugadores[0]["nombre"] ." ha ganado esta partida¡\n");
            return false;

        }elseif ($matriz[0][2] && $matriz[1][2] && $matriz[2][2] == $jugadores[1]["caracter"]){
            $jugadores[1]["wins"] += 1;
            print("\n!". $jugadores[1]["nombre"] ." ha ganado esta partida¡\n");
            return false;

        }elseif ($matriz[0][0] && $matriz[1][1] && $matriz[2][2] == $jugadores[0]["caracter"]){
            $jugadores[0]["wins"] += 1;
            print("\n!". $jugadores[0]["nombre"] ." ha ganado esta partida¡\n");
            return false;

        }elseif ($matriz[0][0] && $matriz[1][1] && $matriz[2][2] == $jugadores[1]["caracter"]){
            $jugadores[1]["wins"] += 1;
            print("\n!". $jugadores[1]["nombre"] ." ha ganado esta partida¡\n");
            return false;

        }elseif ($matriz[2][0] && $matriz[1][1] && $matriz[0][2] == $jugadores[0]["caracter"]){
            $jugadores[0]["wins"] += 1;
            print("\n!". $jugadores[0]["nombre"] ." ha ganado esta partida¡\n");
            return false;

        }elseif ($matriz[2][0] && $matriz[1][1] && $matriz[0][2] == $jugadores[1]["caracter"]){
            $jugadores[1]["wins"] += 1;
            print("\n!". $jugadores[1]["nombre"] ." ha ganado esta partida¡\n");
            return false;

        }else{
            return tableroLleno($matriz);
        }

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