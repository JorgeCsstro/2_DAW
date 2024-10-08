// eval :D

function ponOperandos(operando) {
    var pantalla = document.querySelector('.pantalla input');
    
    if (pantalla.value === '0') {
        pantalla.value = operando;
    } else {
        pantalla.value += operando;
    }
}

function ponParentesis(){

    var pantalla = document.querySelector('.pantalla input');

    pantalla.value = "(" + pantalla.value + ")";

}

function borrarTodo(){

    var pantalla = document.querySelector('.pantalla input');

    pantalla.value = "0";

}

function borrarUno() {
    var pantalla = document.querySelector('.pantalla input');
    
    let arr = pantalla.value.split("");
    
    arr.pop();

    pantalla.value = arr.join('');
}

function operar(){

    var pantalla = document.querySelector('.pantalla input');

    let operacion = eval(pantalla.value);

    pantalla.value = operacion;

}

function sombra(elemento) {
    
    elemento.classList.toggle("sombraInt");

}