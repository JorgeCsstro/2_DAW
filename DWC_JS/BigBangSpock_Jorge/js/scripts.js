
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

    // Añade funcion continuar al boton continuar
    document.getElementById("continuar").addEventListener("click", continuar);

    // Añade a "seleccionado" el drag and drop
    seleccionado.addEventListener("drop", (ev) => {
        drop(ev);
        deliverar();
    });
    seleccionado.addEventListener("dragover", allowDrop);

    // Añade draggable a todas las fotos del juego
    elementos.forEach(id => {
        let dragElement = document.getElementById(id);
        dragElement.draggable = true;
        dragElement.addEventListener("dragstart", drag);
    });
}

// Funcion para saber los resultados del jugo y mostrar mensajes
function deliverar() {
    document.getElementById("proteccion").className = "visible";
    document.getElementById("deliveracion").className = "visible";
    let maqSeleccion = document.getElementById("enemigo");

    let maquina = Math.floor(Math.random() * 5) + 1;
    let seleccionado = document.getElementById("seleccionado").children[0];
    let jugador = parseInt(seleccionado.getAttribute("data-puntos"));

    // El caso default es empate
    let caso = mensajes.empa;

    switch (maquina) {
        case 1:
            maqSeleccion.ignnerHTML = '<img src="img/piedra.png" id="piedra" data-puntos="1"></img>';
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

    // Muestro el mensaje en un poco de delay
    setTimeout(() => {
        mostrarMensaje(caso);
        actualizarPuntos();
    }, 3000);
}

// Función para colocar puntos en pantalla
function actualizarPuntos() {
    let jugadorDiv = document.getElementById("jugador");
    let maquinaDiv = document.getElementById("maquina");

    // Quita lo que tenian los contenedores de puntos
    jugadorDiv.innerHTML = '';
    maquinaDiv.innerHTML = '';

    // Calcula los puntos de cada uno y lo capa para que no exceda de 10
    totalJug = Math.min(puntosJug, 10);
    totalMaq = Math.min(puntosMaq, 10);

    // Creación de divs de puntos
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

    // Victoria / Derrota
    if (totalJug === 10 || totalMaq === 10) {
    
        let ganadorMensaje = document.createElement("p");
        ganadorMensaje.id = "ganador";
    
        if (totalJug === 10) {
            ganadorMensaje.innerHTML = "Has GANADO, la humanidad persiste, 'Paco' nunca ganará >:D";
        } else if (totalMaq === 10) {
            ganadorMensaje.innerHTML = "Has PERDIDO, la humanidad perece y solo queda 'Paco' :C";
        }
    
        let mensajeDiv = document.getElementById("mensaje");
        let continuar = document.getElementById("continuar");

        // Me coloca el mensaje antes de el botón
        mensajeDiv.insertBefore(ganadorMensaje, continuar);
        document.getElementById("mensaje").className = "visible";
    
        gameWon = true;
    }
}

// Muestra el mensaje con el resultado de la jugada
function mostrarMensaje(caso) {
    let restult = document.getElementById("resultado");
    restult.innerHTML = caso;
    document.getElementById("mensaje").className = "visible";

}

function continuar() {
    if (gameWon) {
        // Si ya se ha gandado/perdido la partida, hará reset del juego
        puntosJug = 0;
        puntosMaq = 0;
        totalJug = 0;
        totalMaq = 0;
        gameWon = false;

        document.getElementById("jugador").innerHTML = '';
        document.getElementById("maquina").innerHTML = '';
        document.getElementById("enemigo").innerHTML = '<img src="img/interrogante.png">';
        let seleccionado = document.getElementById("seleccionado");
        let draggedElement = seleccionado.children[0];

        // Sirve para devolver el elemento arrastrado a su posición original
        if (draggedElement) {
            let availableContainers = Array.from(document.querySelectorAll(".item")).filter(
                container => container.children.length === 0 && container.id !== "seleccionado"
            );

            if (availableContainers.length > 0) {
                availableContainers[0].appendChild(draggedElement);
            }
        }

        seleccionado.innerHTML = '';
        let paragraphs = document.querySelectorAll("p#ganador");
        paragraphs.forEach((p) => p.remove());
        document.getElementById("mensaje").className = "invisible";
        document.getElementById("proteccion").className = "invisible";
        document.getElementById("deliveracion").className = "invisible";

    } else {
        document.getElementById("mensaje").className = "invisible";
        document.getElementById("proteccion").className = "invisible";
        document.getElementById("deliveracion").className = "invisible";

        document.getElementById("enemigo").innerHTML = '<img src="img/interrogante.png">';

        let seleccionado = document.getElementById("seleccionado");
        let draggedElement = seleccionado.children[0];

        // Sirve para devolver el elemento arrastrado a su posición original
        if (draggedElement) {
            let availableContainers = Array.from(document.querySelectorAll(".item")).filter(
                container => container.children.length === 0 && container.id !== "seleccionado"
            );

            if (availableContainers.length > 0) {
                availableContainers[0].appendChild(draggedElement);
            }
        }
        seleccionado.innerHTML = '';

    }
}



/***************************DRAG AND DROP ****************************/

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
    let idElement = ev.dataTransfer.getData("id");
    let draggedElement = document.getElementById(idElement);

    if (draggedElement) {
        ev.target.appendChild(draggedElement);
    }
}

/***************************FIN DRAG AND DROP **************************/