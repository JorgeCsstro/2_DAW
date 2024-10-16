
var adivinar = [];
var lineaActual = 0;
var palabraActual = '';
var intentos = 6;
var racha = 0;
var puedeComprobar = true;

document.addEventListener('keydown', function (event) {
    var key = event.key;
    var letterRegex = /^[a-zA-ZñÑ]$/;

    if (letterRegex.test(key)) {
        ponLetra(key);

    } else if (key === 'Enter' && puedeComprobar) {
        comprobar();

    // Si ya no te quedan intentos el proximo enter será una nueva partida
    } else if (key === 'Enter' && !puedeComprobar) {
        nuevaPartida();

    } else if (key === 'Backspace') {
        borrarUno();
    }
});

// Pone todos los botones en gris
function resetKeyboardColors() {
    var keys = document.querySelectorAll('.key');
    keys.forEach(function (key) {
        key.style.backgroundColor = '#818384';
    });
}


function nuevaPartida() {
    // Reinicia todo
    lineaActual = 0;
    adivinar = [];
    puedeComprobar = true;

    // Palabras posibles
    let posibilidades = ["GATO", "PERRO", "MANOS", "CASA", "LUNA", "PLAYA", "LIBRO",
        "SILLA", "TIGRE", "MONTAÑA", "HOLA", "FRIO", "AVEJA", "AVISPA",
        "MARIPOSA", "ELEFANTE", "CANGREJO", "AVENTURA", "SONRISA", "CIELO",
        "ESTRELLA", "GALICIA", "ESPERANZA"];

    // Random desde el minimo hasta el maximo del array
    let rando = Math.floor(Math.random() * posibilidades.length);
    palabraActual = posibilidades[rando];
    console.log(palabraActual);

    if (palabraActual.length > 5) {
        intentos = palabraActual.length +1;
    }

    crearTiles(palabraActual.length);
    
    // Reset keyboard button colors
    resetKeyboardColors();

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

        // Pon colores dependiendo si: la letra está en el sitio correcto (verde), la letra existe (amarillo), la letra no existe (rojo)
        for (let i = 0; i < palabraActual.length; i++) {
            var tile = document.querySelector(`[data-row="${lineaActual}"][data-col="${i}"]`);
            var keyButton = document.querySelector(`.key[onclick="ponLetra('${adivinarString[i]}')"]`);


            // PARA LOS COLORES EL JS TE LOS PONE EN RGB aunque los tengas en
            if (adivinarString[i] === palabraActual[i]) {
                tile.style.backgroundColor = '#019101'; // green
                keyButton.style.backgroundColor = '#019101'; // green

            } else {
                let letterFound = false;
                for (let j = 0; j < palabraActual.length; j++) {
                    if (adivinarString[i] === palabraActual[j]) {
                        letterFound = true;
                        break;
                    }
                }

                if (letterFound) {
                    tile.style.backgroundColor = '#c5b700'; // yellow
                    if (keyButton.style.backgroundColor != 'rgb(1, 145, 1)') { // green

                        keyButton.style.backgroundColor = '#c5b700';// yellow
                    }
                } else {
                    tile.style.backgroundColor = '#853636';// red
                    if (keyButton && keyButton.style.backgroundColor != 'rgb(1, 145, 1)' && keyButton.style.backgroundColor != 'rgb(197, 183, 0)') {
                        keyButton.style.backgroundColor = '#853636';// red
                    }
                }
            }
        }

        // Si ha acertado la palabra
        if (adivinarString === palabraActual) {
            racha++; // Incrementa la racha al ganar
            document.querySelector('.racha').textContent = "RACHA: " + racha;
            puedeComprobar = false;

        } else {
            if (lineaActual < intentos - 1) {
                lineaActual++;
                adivinar = [];

            } else {
                console.log("Game Over! The word was: " + palabraActual);
                racha = 0; // Reinicia la racha al perder
                document.querySelector('.racha').textContent = "RACHA: " + racha;
                puedeComprobar = false;
            }
        }
    }
}

