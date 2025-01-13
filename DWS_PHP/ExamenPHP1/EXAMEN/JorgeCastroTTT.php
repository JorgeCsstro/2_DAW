<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

$fichaNoElegida = true;
$jugadores = [];
$matriz = [];

function inicializarTablero()
{
    global $matriz;
    for ($n = 0; $n < 3; $n++) {
        for ($m = 0; $m < 3; $m++) {
            $matriz[$n][$m] = " ";
        }
    }
}

function imprimirTablero()
{
    global $matriz;
    for ($n = 0; $n < 3; $n++) {
        for ($m = 0; $m < 3; $m++) {
            if ($m != 2) {
                print(" " . $matriz[$n][$m] . " |");
            } else {
                print(" " . $matriz[$n][$m]);
            }
        }
        if ($n != 2) {
            print("\n---|---|---\n");
        } else {
            print("\n");
        }
    }
}



function verificarGanador()
{
    global $matriz;
    global $jugadores;

    // Guardar carácter del jugador 1
    $jugador1Car = $jugadores[0]["caracter"];

    for ($i = 0; $i < 3; $i++) {
        if ($matriz[$i][0] !== " " && $matriz[$i][0] === $matriz[$i][1] && $matriz[$i][1] === $matriz[$i][2]) {
            if ($jugador1Car === $matriz[$i][0]) {
                $jugadores[0]["wins"] += 1;
                $jugadores[1]["losses"] += 1;
                print("\n¡" . $jugadores[0]["nombre"] . " ha ganado esta partida!\n");
            } else {
                $jugadores[1]["wins"] += 1;
                $jugadores[0]["losses"] += 1;
                print("\n¡" . $jugadores[1]["nombre"] . " ha ganado esta partida!\n");
            }
            return false;
        }
        if ($matriz[0][$i] !== " " && $matriz[0][$i] === $matriz[1][$i] && $matriz[1][$i] === $matriz[2][$i]) {
            if ($jugador1Car === $matriz[0][$i]) {
                $jugadores[0]["wins"] += 1;
                $jugadores[1]["losses"] += 1;
                print("\n¡" . $jugadores[0]["nombre"] . " ha ganado esta partida!\n");
            } else {
                $jugadores[1]["wins"] += 1;
                $jugadores[0]["losses"] += 1;
                print("\n¡" . $jugadores[1]["nombre"] . " ha ganado esta partida!\n");
            }
            return false;
        }
    }

    if ($matriz[0][0] !== " " && $matriz[0][0] === $matriz[1][1] && $matriz[1][1] === $matriz[2][2]) {
        if ($jugador1Car === $matriz[0][0]) {
            $jugadores[0]["wins"] += 1;
            $jugadores[1]["losses"] += 1;
            print("\n¡" . $jugadores[0]["nombre"] . " ha ganado esta partida!\n");
        } else {
            $jugadores[1]["wins"] += 1;
            $jugadores[0]["losses"] += 1;
            print("\n¡" . $jugadores[1]["nombre"] . " ha ganado esta partida!\n");
        }
        return false;
    }
    if ($matriz[0][2] !== " " && $matriz[0][2] === $matriz[1][1] && $matriz[1][1] === $matriz[2][0]) {
        if ($jugador1Car === $matriz[0][2]) {
            $jugadores[0]["wins"] += 1;
            $jugadores[1]["losses"] += 1;
            print("\n¡" . $jugadores[0]["nombre"] . " ha ganado esta partida!\n");
        } else {
            $jugadores[1]["wins"] += 1;
            $jugadores[0]["losses"] += 1;
            print("\n¡" . $jugadores[1]["nombre"] . " ha ganado esta partida!\n");
        }
        return false;
    }

    return tableroLleno();
}

function tableroLleno()
{
    global $matriz;
    foreach ($matriz as $fila) {
        foreach ($fila as $celda) {
            if ($celda === " ") {
                return true;
            }
        }
    }
    print("\nEmpate\n");
    return false;
}

function iniciarPartida()
{
    global $jugadores;
    global $matriz;
    $seguir = true;
    $noValido = true;
    $salida = true;

    $turno = 0;
    inicializarTablero();
    imprimirTablero();

    do {
        $jugadorActual = $jugadores[$turno];

        do {
            $fila = readline($jugadorActual["nombre"] . " (" . $jugadorActual["caracter"] . "), indica la fila (0-2) o escribe 's' para abandonar la partida: ");
            if (strlen($fila) === 1) {
                if ($fila === 's') {
                    $seguir = false;
    
                    $oponente = 1 - $turno;
                    $jugadores[$oponente]["wins"] += 1;
    
                    $jugadores[$turno]["losses"] += 1;
    
                    print("\n¡" . $jugadores[$oponente]["nombre"] . " ha ganado esta partida!\n");
                    //print_r($jugadores);
                    $noValido = false;
                    $salida = false;
                    break;
                }
                $noValido = false;
            }
        } while ($noValido);
        
        $noValido = true;

        if ($salida) {
            do {
                $columna = readline($jugadorActual["nombre"] . " (" . $jugadorActual["caracter"] . "), indica la columna (0-2) o escribe 's' para abandonar la partida: ");
                if (strlen($columna) === 1) {
                    if ($columna === 's') {
                        $seguir = false;
        
                        $oponente = 1 - $turno;
                        $jugadores[$oponente]["wins"] += 1;
        
                        $jugadores[$turno]["losses"] += 1;
        
                        print("\n¡" . $jugadores[$oponente]["nombre"] . " ha ganado esta partida!\n");
                        //print_r($jugadores);
                        $noValido = false;
                        $salida = false;
                        break;
                    }
                    $noValido = false;
                }
            } while ($noValido);
        }

        $salida = true;
        
        
        if ($matriz[$fila][$columna] == " ") {
            $matriz[$fila][$columna] = $jugadorActual["caracter"];
            imprimirTablero();
            $seguir = verificarGanador();
            $turno = 1 - $turno;
        } else {
            imprimirTablero();
            print("Porfavor pon el caracter en una posición en blanco\n");
        }
    } while ($seguir);
}

function jugarTorneo()
{
    global $jugadores;

    print("--- Iniciando un nuevo torneo de 3 partidas ---");

    for ($i = 1; $i <= 3; $i++) {
        print("\n--- Partida ($i de 3) ---\n");
        iniciarPartida();
    }

    if ($jugadores[0]["wins"] > $jugadores[1]["wins"]) {
        print("\n" . $jugadores[0]["nombre"] . " ha ganado el torneo\n");
        $jugadores[0]["copas"] += 1;
    } elseif ($jugadores[1]["wins"] > $jugadores[0]["wins"]) {
        print("\n" . $jugadores[1]["nombre"] . " ha ganado el torneo\n");
        $jugadores[1]["copas"] += 1;
    } else {
        print("\nNO HAY COPA");
    }

    print("\n--- Estadísticas del Torneo ---\n");
    print($jugadores[0]["nombre"] . " (" . $jugadores[0]["caracter"] . ") - Victorias: " . $jugadores[0]["wins"] . ", Derrotas: " . $jugadores[0]["losses"] . ", Copas: " . $jugadores[0]["copas"] . "\n");
    print($jugadores[1]["nombre"] . " (" . $jugadores[1]["caracter"] . ") - Victorias: " . $jugadores[1]["wins"] . ", Derrotas: " . $jugadores[1]["losses"] . ", Copas: " . $jugadores[1]["copas"] . "\n");

    $jugarOtra = readline("\n¿Quieres jugar otro torneo? (s para continuar / cualquier otra tecla, para parar):");

    if ($jugarOtra == "s") {
        for ($i = 0; $i <= 1; $i++) {
            $jugadores[$i]["wins"] = 0;
            $jugadores[$i]["losses"] = 0;
        }
        jugarTorneo();
    } else {
        print("\nGracias por jugar " . $jugadores[0]["nombre"] . " y " . $jugadores[1]["nombre"] . " :D\n");
    }
}

// INICIO DEL PROGRAMA

$nombre1 = readline("Dime el nombre del Jugador1: ");
$nombre2 = readline("Dime el nombre del Jugador2: ");

do {
    $tipoFicha = readline("Dime qué carácter quieres de ficha ($nombre1): ");
    if (strlen($tipoFicha) === 1) {
        $fichaNoElegida = false;
        $jugadores[] = [
            "nombre" => $nombre1,
            "caracter" => $tipoFicha,
            "wins" => 0,
            "losses" => 0,
            "copas" => 0
        ];
    }
} while ($fichaNoElegida);

$fichaNoElegida = true;

do {
    $tipoFicha = readline("Dime qué carácter quieres de ficha ($nombre2): ");
    if (strlen($tipoFicha) === 1) {
        $fichaNoElegida = false;
        $jugadores[] = [
            "nombre" => $nombre2,
            "caracter" => $tipoFicha,
            "wins" => 0,
            "losses" => 0,
            "copas" => 0
        ];
    }
} while ($fichaNoElegida);

jugarTorneo();
