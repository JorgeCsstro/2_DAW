
var errorOperador = false;

// operadores de la calculadora para después hacer comprobaciones
var operadores = ['+', '-', '*', '/', '%', '.'];

// Listeners para las teclas de la calculadora
document.addEventListener('keydown', function(event) {
    var key = event.key;

    if (!isNaN(key) || operadores.includes(key)) {
        ponOperandos(key);

    } else if (key === 'Enter') {
        operar();
        
    } else if (key === 'Backspace') {
        borrarUno();

    } else if (key === 'Escape') {
        borrarTodo();

    } else if (key === '(' || key === ')') {
        ponParentesis();

    } else if (key === '.') {
        ponOperandos('.');

    }
});

function ponOperandos(operando) {

    var pantalla = document.querySelector('.pantalla input');
    
    let ultChar = pantalla.value.slice(-1);

    // Si pones 2 operandos seguidos se pondrá en rojo  no te dejará hacer operaciones
    if (operadores.includes(ultChar) && operadores.includes(operando)) {

        pantalla.style.color = 'red';
        errorOperador = true;
        pantalla.value += operando;

    } else {

        // si esta bien, pondrá los numeros/operadores como siempre
        pantalla.style.color = 'black'; 
        errorOperador = false;
        
        if (pantalla.value === '0' || pantalla.value == "Error" && !operadores.includes(operando)) {
            pantalla.value = operando;

        } else {
            pantalla.value += operando;

        }
    }
}

// Poner parentesis
function ponParentesis(){
    var pantalla = document.querySelector('.pantalla input');

    pantalla.value = "(" + pantalla.value + ")";
}

// Borrar toda la pantalla
function borrarTodo() {
    var pantalla = document.querySelector('.pantalla input');
    pantalla.value = "0";
    pantalla.style.color = 'black';
    errorOperador = false;
}

// Borrar ultimo carácter
function borrarUno() {
    var pantalla = document.querySelector('.pantalla input');
    
    let arr = pantalla.value.split("");
    arr.pop();
    
    pantalla.value = arr.join('');
    
    let ultChar = pantalla.value.slice(-1);

    if (operadores.includes(ultChar)) {
        pantalla.style.color = 'black';
        errorOperador = false;

    }
}

// Operar si no hay dobles operadores en la pantalla o el último es un operador
function operar() {
    var pantalla = document.querySelector('.pantalla input');

    let ultChar = pantalla.value.slice(-1);

    if (errorOperador || operadores.includes(ultChar)) {
        pantalla.value = "Error";
        pantalla.style.color = 'red';
        errorOperador = true;

    }else{
        let operacion = eval(pantalla.value);
        pantalla.value = operacion;

    }    
}

// Poner sombra para el mousedown
function sombra(elemento) {
    elemento.classList.toggle("sombraInt");

}