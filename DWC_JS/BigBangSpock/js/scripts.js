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
    setTimeout(mostrarMensaje,2000);
}

function mostrarMensaje() {
    
    //Mostramos el mensaje en función del resultado de la jugada o de la partida
    let restult = document.getElementById("resultado");
    /*if (condition) {
        restult.innerHTML = mensajes.tipa;
    }*/
    
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