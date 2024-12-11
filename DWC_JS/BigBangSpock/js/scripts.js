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

window.onload = function(){
    cargarTablero();
    asignarElementosHTML();
    cargarEventos();
}

function asignarElementosHTML() {
    //Función que utilizaremos para asignar los elementos HTML que vayamos a utilizar, a las varibales que hemos creado.

    
}

function cargarEventos() {
    //Función donde cargaremos los eventos que necesite cada elemento de la partida
    let seleccionado = document.getElementById("seleccionado");
    let drag1=document.getElementById("piedra");
    let drag2=document.getElementById("papel");
    let drag3=document.getElementById("tijera");
    let drag4=document.getElementById("lagarto");
    let drag5=document.getElementById("spock");

    // Se lanzará la función "drop", con el evento "drop"
    seleccionado.addEventListener("drop", drop);
    seleccionado.addEventListener("drop", deliverar);

    // Se lanzará la función "allowDrop", con el evento "dragover"
    seleccionado.addEventListener("dragover", allowDrop);
    
    // Le indicamos que la imagen es arrastrable
    drag1.draggable = true;
    // Llamada a la función a la que se llama cuando empieza el arrastre
    drag1.addEventListener("dragstart", drag);

    drag2.draggable = true;
    drag2.addEventListener("dragstart", drag);

    drag3.draggable = true;
    drag3.addEventListener("dragstart", drag);

    drag4.draggable = true;
    drag4.addEventListener("dragstart", drag);

    drag5.draggable = true;
    drag5.addEventListener("dragstart", drag);
}

function continuar() {
    //Función que lanzamos cuando pulsamos al botón continuar
    //Volvemos a ocultar el mensaje;
    document.getElementById("mensaje").className = "invisible";
    document.getElementById("proteccion").className = "invisible";
    document.getElementById("deliveracion").className = "invisible";

    //Si es una jugada reiniciamos todo menos los contadores de puntos.
    //Si es el final de la partida, también incluimos los contadores de puntos.
    cargarTablero();
}

function deliverar() {
    document.getElementById("proteccion").className="visible";
    document.getElementById("deliveracion").className="visible";
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


    switch (jugador) {
        // PIEDRA JUGADOR
        case 1:
            switch (maquina) {
                case 1:
                    caso = mensajes.empa;
                    break;
                case 2:
                    caso = mensajes.papi;
                    puntosMaq = 2;
                    break;
                case 3:
                    caso = mensajes.piti;
                    puntosJug = 3;
                    break;
                case 4:
                    caso = mensajes.pila;
                    puntosJug = 4;
                    break;
                case 5:
                    caso = mensajes.sppi;
                    puntosMaq = 5;
                    break;
            }
            break;

        // PAPEL JUGADOR
        case 2:
            switch (maquina) {
                case 1:
                    caso = mensajes.papi;
                    puntosJug = 1;
                    break;
                case 2:
                    caso = mensajes.empa;
                    break;
                case 3:
                    caso = mensajes.tipa;
                    puntosMaq = 3;
                    break;
                case 4:
                    caso = mensajes.lapa;
                    puntosMaq = 4;
                    break;
                case 5:
                    caso = mensajes.pasp;
                    puntosJug = 5;
                    break;
            }
            break;
        // TIJERA JUGADOR
        case 3:
            switch (maquina) {
                case 1:
                    caso = mensajes.piti;
                    puntosMaq = 1;
                    break;
                case 2:
                    caso = mensajes.tipa;
                    puntosJug = 2;
                    break;
                case 3:
                    caso = mensajes.empa;
                    break;
                case 4:
                    caso = mensajes.tila;
                    puntosJug = 4;
                    break;
                case 5:
                    caso = mensajes.spti;
                    puntosMaq = 5;
                    break;
            }
            break;
        // LAGARTO JUGADOR
        case 4:
            switch (maquina) {
                case 1:
                    caso = mensajes.pila;
                    puntosMaq = 1;
                    break;
                case 2:
                    caso = mensajes.lapa;
                    puntosJug = 2;
                    break;
                case 3:
                    caso = mensajes.tila;
                    puntosMaq = 3;
                    break;
                case 4:
                    caso = mensajes.empa;
                    break;
                case 5:
                    caso = mensajes.lasp;
                    puntosJug = 5;
                    break;
            }
            break;
        // SPOCK JUGADOR
        case 5:
            switch (maquina) {
                case 1:
                    caso = mensajes.sppi;
                    puntosJug = 1;
                    break;
                case 2:
                    caso = mensajes.spti;
                    puntosJug = 2;
                    break;
                case 3:
                    caso = mensajes.pasp;
                    puntosMaq = 3;
                    break;
                case 4:
                    caso = mensajes.lasp;
                    puntosMaq = 4;
                    break;
                case 5:
                    caso = mensajes.empa;
                    break;
            }
            break;
        default:
            caso = mensajes.empa;
            break;
    }
    
    setTimeout(mostrarMensaje(caso),2000);
}

function mostrarMensaje(caso) {
    
    //Mostramos el mensaje en función del resultado de la jugada o de la partida
    let restult = document.getElementById("resultado");
    
    restult.innerHTML = caso;
    
    document.getElementById("mensaje").className="visible";

}

function cargarTablero() {
    //Función donde crearemos los elementos que vayamos a necesitar, junto a sus atributos y eventos
    //La utilizaremos para reiniciar cada jugada
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

    // Cogemos el dato del id guardado en el campo arrastrado "id"
    var idElement = ev.dataTransfer.getData("id");

    // Añadimos el objeto arrastrado como hijo de nuestro div, accediendo con su id
    this.appendChild(document.getElementById(idElement));
}

 /***************************FIN DRAG AND DROP **************************/