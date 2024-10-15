
var adivinar = [];
var lineaActual = 0;
var palabraActual = '';
var intentos = 5;

document.addEventListener('keydown', function (event) {
    var key = event.key;
    var letterRegex = /^[a-zA-ZñÑ]$/;

    if (letterRegex.test(key)) {
        ponLetra(key);

    } else if (key === 'Enter') {
        comprobar();

    } else if (key === 'Backspace') {
        borrarUno();

    }
});

function nuevaPartida() {
    // Reinicia todo
    lineaActual = 0;
    adivinar = [];

    // Palabras posibles
    let posibilidades = ["GATO", "PERRO", "MANOS", "CASA", "LUNA", "PLAYA", "LIBRO",
        "SILLA", "TIGRE", "MONTAÑA", "HOLA", "FRIO", "AVEJA", "AVISPA",
        "MARIPOSA", "ELEFANTE", "CANGREJO", "AVENTURA", "SONRISA", "CIELO",
        "ESTRELLA", "GALICIA", "ESPERANZA"];

    // Random desde el minimo hasta el maximo del array
    let rando = Math.floor(Math.random() * posibilidades.length);
    palabraActual = posibilidades[rando];
    console.log(palabraActual);

    crearTiles(palabraActual.length);
    return palabraActual;
}

function crearTiles(longitud) {

    // Limpia todo los bloques y crea nuevos
    var grid = document.getElementById('wordleGrid');
    grid.innerHTML = '';

    // Creo tantas columnas como tenga la palabra
    grid.style.gridTemplateColumns = `repeat(${longitud}, 50px)`;

    // Creo todas las lineas y columnas
    for (let row = 0; row < intentos; row++) {

        for (let col = 0; col < longitud; col++) {

            var tile = document.createElement('div');
            tile.classList.add('tile');
            tile.setAttribute('data-row', row);
            tile.setAttribute('data-col', col);
            grid.appendChild(tile);
        }
    }
}

// Pone la letra indicada por teclado
function ponLetra(letra) {
    if (adivinar.length < palabraActual.length) {
        adivinar.push(letra);
        actualizarGrid();

    }
}

// Borra la última letra
function borrarUno() {
    if (adivinar.length > 0) {
        adivinar.pop();
        actualizarGrid();

    }
}
// Actualiza el grid con lo que tiene el array actualemente
function actualizarGrid() {
    for (let i = 0; i < palabraActual.length; i++) {
        var tile = document.querySelector(`[data-row="${lineaActual}"][data-col="${i}"]`);

        if (adivinar[i]) {

            tile.textContent = adivinar[i].toUpperCase();
        } else {
            tile.textContent = '';
        }
    }
}

// Comprobacion de la palabra
function comprobar() {
    if (adivinar.length === palabraActual.length) {
        var adivinarString = adivinar.join('').toUpperCase();
        console.log("Checking word: " + adivinarString);

        // Pon colores dependiendo si: la letra esta en el sitio correcto (verde), la letra existe (amarillo), la letra no existe (rojo)
        for (let i = 0; i < palabraActual.length; i++) {
            var tile = document.querySelector(`[data-row="${lineaActual}"][data-col="${i}"]`);

            if (adivinarString[i] === palabraActual[i]) {
                tile.style.backgroundColor = 'green';

            } else if (adivinarString[i] !== palabraActual[i]) {
                let letterFound = false;
                for (let j = 0; j < palabraActual.length; j++) {
                    if (adivinarString[i] === palabraActual[j]) {
                        letterFound = true;
                        break;
                    }
                }

                if (letterFound) {
                    tile.style.backgroundColor = 'yellow';
                } else {
                    tile.style.backgroundColor = 'red';
                }
            }
        }

        // Si ha
        if (adivinarString === palabraActual) {
            console.log("Correcto");
            console.log("Felicidades");

        } else {
            console.log("Incorrecto");
            if (lineaActual < intentos - 1) {
                lineaActual++;
                adivinar = [];
            } else {
                console.log("Game Over! The word was: " + palabraActual);

            }
        }
    }
}