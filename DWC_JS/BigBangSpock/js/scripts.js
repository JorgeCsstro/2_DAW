//Mensajes de los resultados de las jugadas
var mensajes = {
    tipa: "Tijeras cortan papel",
    papi: "Papel tapa piedra",
    pila: "Piedra aplasta lagarto",
    lasp: "Lagarto envenena a Spock",
    spti: "Spock rompe tijeras",
    tila: "Tijeras decapitan lagarto",
    lapa: "Lagarto devora papel",
    pasp: "Papel desautoriza a Spock",
    sppi: "Spock vaporiza piedra",
    piti: "Piedra aplasta tijeras",
    empa: "Empate"
}

//Variables que contendrán los elementos HTML que vayamos a necesitar
let puntosMaq = 0;
let puntosJug = 0;
let totalJug = Math.min(puntosJug, 10);
let totalMaq = Math.min(puntosMaq, 10);
let gameWon = false;

window.onload = function () {
    cargarEventos();
}

function cargarEventos() {
    let seleccionado = document.getElementById("seleccionado");
    let elementos = ["piedra", "papel", "tijera", "lagarto", "spock"];

    document.getElementById("continuar").addEventListener("click", continuar);

    // Add drag and drop events to the 'seleccionado' div
    seleccionado.addEventListener("drop", (ev) => {
        drop(ev);
        deliverar();
    });
    seleccionado.addEventListener("dragover", allowDrop);

    // Add dragstart events to each draggable item
    elementos.forEach(id => {
        let dragElement = document.getElementById(id);
        dragElement.draggable = true;
        dragElement.addEventListener("dragstart", drag);
    });
}

function deliverar() {
    document.getElementById("proteccion").className = "visible";
    document.getElementById("deliveracion").className = "visible";
    let maqSeleccion = document.getElementById("enemigo");

    let maquina = Math.floor(Math.random() * 5) + 1;
    let seleccionado = document.getElementById("seleccionado").children[0];
    let jugador = parseInt(seleccionado.getAttribute("data-puntos"));
    let caso = mensajes.empa;

    switch (maquina) {
        case 1:
            maqSeleccion.innerHTML = '<img src="img/piedra.png" id="piedra" data-puntos="1"></img>';
            break;
        case 2:
            maqSeleccion.innerHTML = '<img src="img/papel.png" id="papel" data-puntos="2"></img>';
            break;
        case 3:
            maqSeleccion.innerHTML = '<img src="img/tijera.png" id="tijera" data-puntos="3"></img>';
            break;
        case 4:
            maqSeleccion.innerHTML = '<img src="img/lagarto.png" id="lagarto" data-puntos="4"></img>';
            break;
        case 5:
            maqSeleccion.innerHTML = '<img src="img/spock.png" id="spock" data-puntos="5"></img>';
            break;
    }

    // Determine outcome and points
    switch (jugador) {
        case 1: // PIEDRA
            if (maquina === 2) { caso = mensajes.papi; puntosMaq += 2; }
            else if (maquina === 3) { caso = mensajes.piti; puntosJug += 3; }
            else if (maquina === 4) { caso = mensajes.pila; puntosJug += 4; }
            else if (maquina === 5) { caso = mensajes.sppi; puntosMaq += 5; }
            break;
        case 2: // PAPEL
            if (maquina === 1) { caso = mensajes.papi; puntosJug += 1; }
            else if (maquina === 3) { caso = mensajes.tipa; puntosMaq += 3; }
            else if (maquina === 4) { caso = mensajes.lapa; puntosMaq += 4; }
            else if (maquina === 5) { caso = mensajes.pasp; puntosJug += 5; }
            break;
        case 3: // TIJERA
            if (maquina === 1) { caso = mensajes.piti; puntosMaq += 1; }
            else if (maquina === 2) { caso = mensajes.tipa; puntosJug += 2; }
            else if (maquina === 4) { caso = mensajes.tila; puntosJug += 4; }
            else if (maquina === 5) { caso = mensajes.spti; puntosMaq += 5; }
            break;
        case 4: // LAGARTO
            if (maquina === 1) { caso = mensajes.pila; puntosMaq += 1; }
            else if (maquina === 2) { caso = mensajes.lapa; puntosJug += 2; }
            else if (maquina === 3) { caso = mensajes.tila; puntosMaq += 3; }
            else if (maquina === 5) { caso = mensajes.lasp; puntosJug += 5; }
            break;
        case 5: // SPOCK
            if (maquina === 1) { caso = mensajes.sppi; puntosJug += 1; }
            else if (maquina === 2) { caso = mensajes.pasp; puntosMaq += 2; }
            else if (maquina === 3) { caso = mensajes.spti; puntosJug += 3; }
            else if (maquina === 4) { caso = mensajes.lasp; puntosMaq += 4; }
            break;
    }

    // After a 3-second delay, display results and update points
    setTimeout(() => {
        mostrarMensaje(caso);
        actualizarPuntos();
    }, 3000);
}

function actualizarPuntos() {
    let jugadorDiv = document.getElementById("jugador");
    let maquinaDiv = document.getElementById("maquina");

    // Clear previous squares
    jugadorDiv.innerHTML = '';
    maquinaDiv.innerHTML = '';

    // Calculate squares for player and machine
    totalJug = Math.min(puntosJug, 10); // Cap at 10 squares
    totalMaq = Math.min(puntosMaq, 10);

    for (let i = 0; i < totalJug; i++) {
        let square = document.createElement("div");
        square.className = "punto mio";
        jugadorDiv.appendChild(square);
    }

    for (let i = 0; i < totalMaq; i++) {
        let square = document.createElement("div");
        square.className = "punto suyo";
        maquinaDiv.appendChild(square);
    }

    if (totalJug === 10 || totalMaq === 10) {
        let resultadoDiv = document.getElementById("resultado");
    
        let ganadorMensaje = document.createElement("p");
        ganadorMensaje.id = "ganador";
    
        if (totalJug === 10) {
            ganadorMensaje.innerHTML = "¡Felicidades! El jugador ha ganado la partida.";
        } else if (totalMaq === 10) {
            ganadorMensaje.innerHTML = "La máquina ha ganado la partida. ¡Suerte la próxima vez!";
        }
    
        let mensajeDiv = document.getElementById("mensaje");
        let continuarBtn = document.getElementById("continuar");
        mensajeDiv.insertBefore(ganadorMensaje, continuarBtn);
        document.getElementById("mensaje").className = "visible";
    
        gameWon = true;
    }
}



function mostrarMensaje(caso) {

    //Mostramos el mensaje en función del resultado de la jugada o de la partida
    let restult = document.getElementById("resultado");

    restult.innerHTML = caso;

    document.getElementById("mensaje").className = "visible";

}

function continuar() {
    if (gameWon) {
        // Full reset if the game has been won
        puntosJug = 0;
        puntosMaq = 0;
        totalJug = 0;
        totalMaq = 0;
        gameWon = false; // Reset the win flag

        // Clear points from the screen
        document.getElementById("jugador").innerHTML = '';
        document.getElementById("maquina").innerHTML = '';

        // Reset the enemy image to the question mark
        document.getElementById("enemigo").innerHTML = '<img src="img/interrogante.png">';

        // Move any remaining dragged elements back to their original container
        let seleccionado = document.getElementById("seleccionado");
        let draggedElement = seleccionado.children[0];

        if (draggedElement) {
            let availableContainers = Array.from(document.querySelectorAll(".item"))
                .filter(container => container.children.length === 0 && container.id !== "seleccionado");

            if (availableContainers.length > 0) {
                availableContainers[0].appendChild(draggedElement);
            }
        }

        seleccionado.innerHTML = '';

        // Remove winner message
        let paragraphs = document.querySelectorAll("p#ganador");
        paragraphs.forEach((p) => p.remove());

        // Hide overlays
        document.getElementById("mensaje").className = "invisible";
        document.getElementById("proteccion").className = "invisible";
        document.getElementById("deliveracion").className = "invisible";

    } else {
        // Regular continue behavior if the game hasn't been won
        document.getElementById("mensaje").className = "invisible";
        document.getElementById("proteccion").className = "invisible";
        document.getElementById("deliveracion").className = "invisible";

        document.getElementById("enemigo").innerHTML = '<img src="img/interrogante.png">';

        let seleccionado = document.getElementById("seleccionado");
        let draggedElement = seleccionado.children[0];

        if (draggedElement) {
            let availableContainers = Array.from(document.querySelectorAll(".item"))
                .filter(container => container.children.length === 0 && container.id !== "seleccionado");

            if (availableContainers.length > 0) {
                availableContainers[0].appendChild(draggedElement);
            }
        }

        seleccionado.innerHTML = '';
    }
}



/***************************DRAG AND DROP ****************************/

//Funciones para el drag&drop

function allowDrop(ev) {
    /*
        Por defecto no se pueden arrastrar elementos dentro de otros.
        Cambiamos este comportamiento en los divs
    */
    ev.preventDefault();
}

// Funcion que coge el ID del elemento arratrado
function drag(ev) {
    // Nos guardamos la información del "id" en un campo llamada "id"
    ev.dataTransfer.setData("id", this.id);
}

function drop(ev) {
    ev.preventDefault();

    // Get the ID of the dragged element
    let idElement = ev.dataTransfer.getData("id");
    let draggedElement = document.getElementById(idElement);

    if (draggedElement) {
        // Append the dragged element to the target container
        ev.target.appendChild(draggedElement);
    }
}

/***************************FIN DRAG AND DROP **************************/