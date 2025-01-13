<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

$fichaNoElegida = true;
$jugadores = [];
$matriz = [];

function inicializarTablero() {
    global $matriz;
    for ($n = 0; $n < 3; $n++) {
        for ($m = 0; $m < 3; $m++) {
            $matriz[$n][$m] = " ";
        }
    }
}

function iniciarPartida() {
    global $jugadores;
    global $matriz;
    $seguir = true;

    $turno = 0;
    inicializarTablero();
    imprimirTablero();

    do {
        $jugadorActual = $jugadores[$turno];
        $fila = readline($jugadorActual["nombre"] . " (" . $jugadorActual["caracter"] . "), indica la fila (0-2) o escribe 's' para abandonar la partida: ");
        if ($fila === 's') {
            $seguir = false;

            $oponente = 1 - $turno;
            $jugadores[$oponente]["wins"] += 1;

            $jugadores[$turno]["losses"] += 1;
            
            print("\n¡" . $jugadores[$oponente]["nombre"] . " ha ganado esta partida!\n");
            //print_r($jugadores);
            break;
        }

        $columna = readline($jugadorActual["nombre"] . " (" . $jugadorActual["caracter"] . "), indica la columna (0-2) o escribe 's' para abandonar la partida: ");
        if ($columna === 's') {
            $seguir = false;

            $oponente = 1 - $turno;
            $jugadores[$oponente]["wins"] += 1;

            $jugadores[$turno]["losses"] += 1;

            print("\n¡" . $jugadores[$oponente]["nombre"] . " ha ganado esta partida!\n");
            //print_r($jugadores);
            break;
        }

        //if (isset($matriz[$fila][$columna]) && $matriz[$fila][$columna] === " ") {
        $matriz[$fila][$columna] = $jugadorActual["caracter"];
        imprimirTablero();
        $seguir = verificarGanador();
        $turno = 1 - $turno;
        //} else {
        //    print("\nPosición inválida, intenta de nuevo.\n");
        //}
    } while ($seguir);
}

function imprimirTablero() {
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

function verificarGanador() {
    global $matriz;

    for ($i = 0; $i < 3; $i++) {
        if ($matriz[$i][0] !== " " && $matriz[$i][0] === $matriz[$i][1] && $matriz[$i][1] === $matriz[$i][2]) {
            mostrarGanador($matriz[$i][0]);
            return false;
        }
        if ($matriz[0][$i] !== " " && $matriz[0][$i] === $matriz[1][$i] && $matriz[1][$i] === $matriz[2][$i]) {
            mostrarGanador($matriz[0][$i]);
            return false;
        }
    }

    if ($matriz[0][0] !== " " && $matriz[0][0] === $matriz[1][1] && $matriz[1][1] === $matriz[2][2]) {
        mostrarGanador($matriz[0][0]);
        return false;
    }
    if ($matriz[0][2] !== " " && $matriz[0][2] === $matriz[1][1] && $matriz[1][1] === $matriz[2][0]) {
        mostrarGanador($matriz[0][2]);
        return false;
    }

    return tableroLleno();
}

function mostrarGanador($caracter) {
    global $jugadores;

    foreach ($jugadores as &$jugador) {
        if ($jugador["caracter"] === $caracter) {
            $jugador["wins"] += 1;
            print("\n¡" . $jugador["nombre"] . " ha ganado esta partida!\n");
        }else {
            $jugador["losses"] += 1;
        }
    }
}

function tableroLleno() {
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

function jugarTorneo(){
    global $jugadores;

    for ($i=1; $i <= 3; $i++) { 
        print("\nPartida ($i de 3)\n");
        iniciarPartida();
    }
    
    if ($jugadores[0]["wins"] > $jugadores[1]["wins"]) {
        $jugadores[0]["copas"] += 1;
    }else {
        $jugadores[1]["copas"] += 1;
    }

    print_r($jugadores);

    $jugarOtra = readline("Quieres jugar otro torneo? (s / n):");

    if ($jugarOtra == "s") {
        for ($i=0; $i <= 1; $i++) { 
            $jugadores[$i]["wins"] = 0;
            $jugadores[$i]["losses"] = 0;
        }
        jugarTorneo();
    }else {
        print("\nGracias por jugar " . $jugadores[0]["nombre"] . " y " . $jugadores[1]["nombre"] . " :D\n");
    }

}

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

?>
