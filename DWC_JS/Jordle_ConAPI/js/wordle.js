
var adivinar = [];
var lineaActual = 0;
var palabraActual = '';
var intentos = 6;
var racha = 0;
var puedeComprobar = true;
var palabra = document.getElementById('palabra');

// En toda la pagina detectara las teclas indentificadas
document.addEventListener('keydown', function (event) {
    var key = event.key;
    var letterRegex = /^[a-zA-ZñÑ]$/;

    // Si es una letra
    if (letterRegex.test(key)) {
        ponLetra(key);

        // Si es un Enter
    } else if (key === 'Enter' && puedeComprobar) {
        comprobar();

        // Si ya no te quedan intentos el proximo enter será una nueva partida
    } else if (key === 'Enter' && !puedeComprobar) {
        nuevaPartida();

        // Si es un Del
    } else if (key === 'Backspace') {
        borrarUno();
    }
});

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

async function compruebaRAEadivinar(adivinar) {

    let str = adivinar.join("");
    let palabraExiste = await fetch("https://rae-api.com/api/words/" + str)
        .then(response => {
            if (response.ok) {
                return true;
            } else {
                return false;
            }
        });
    return palabraExiste;
}

async function compruebaRAErandom(random) {

    let palabraExiste = await fetch("https://rae-api.com/api/words/" + random)
        .then(response => {
            if (response.ok) {
                console.log("holalalala")
                return true;
            } else {
                return false;
            }
        });
    return palabraExiste;
}

// Comprobacion de la palabra
async function comprobar() {
    if (adivinar.length === palabraActual.length) {
        let existe = await compruebaRAEadivinar(adivinar);
        if (existe) {
            var adivinarString = adivinar.join('').toUpperCase();

            // Pon colores dependiendo si: la letra está en el sitio correcto (verde), la letra existe (amarillo), la letra no existe (rojo)
            for (let i = 0; i < palabraActual.length; i++) {
                var tile = document.querySelector(`[data-row="${lineaActual}"][data-col="${i}"]`);
                var keyButton = document.querySelector(`.key[onclick="ponLetra('${adivinarString[i]}')"]`);

                // PARA LOS COLORES EL JS TE LOS PONE EN RGB aunque los tengas en HEX
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

                racha++;
                // Cambia la opacidad según la racha
                let intensidad = Math.min(1, racha * 0.1);

                // Aplica el nuevo fondo rojo con opacidad variable
                document.querySelector('.racha').style.backgroundColor = `rgba(133, 54, 54, ${intensidad})`;

                document.querySelector('.racha').textContent = "RACHA: " + racha;
                puedeComprobar = false;

            } else {
                if (lineaActual < intentos - 1) {
                    lineaActual++;
                    adivinar = [];

                } else {
                    document.querySelector('.racha').style.backgroundColor = `rgba(133, 54, 54, 0)`;
                    palabra = document.getElementById('palabra').innerHTML = "Game Over! La palabra era: " + palabraActual;
                    racha = 0; // Reinicia la racha al perder
                    document.querySelector('.racha').textContent = "RACHA: " + racha;
                    puedeComprobar = false;
                }
            }
        } else {

            alert("La palabra no existe >:C");

        }
    }
}

function removeAccents(str) {
    return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
}

async function apiPalabra() {
    let encontrarValidacion = true;
    let palabraRand = "a";
    document.getElementById('loadingOverlay').style.display = 'flex';

    while (encontrarValidacion) {
        palabraRand = await fetch("https://random-word-api.herokuapp.com/word?lang=es")
            .then(response => response.json())
            .then(data => data[0]);

        palabraRand = removeAccents(palabraRand);

        if (palabraRand.length < 9 && palabraRand.length > 3) {
            if (await compruebaRAErandom(palabraRand) == true) {
                encontrarValidacion = false;
            }
        }
    }
    document.getElementById('loadingOverlay').style.display = 'none';

    return palabraRand;
}

// Al iniciar una nueva partida...
async function nuevaPartida() {
    
    palabraActual = await apiPalabra();
    palabraActual = palabraActual.toUpperCase();
    
    // Reinicia todo
    lineaActual = 0;
    adivinar = [];
    puedeComprobar = true;
    intentos = 6;

    // Quito el game over del anterior juego
    palabra = document.getElementById('palabra').innerHTML = "";
    
    // Cheat por si acaso :P
    console.log(palabraActual);

    // Poner más líneas de intentos si sobrepasa 5 letras
    if (palabraActual.length > 5) {
        intentos = palabraActual.length + 1;
    }

    // Quita colores de las teclas
    resetColorTeclado();

    // Crea el grid del juego
    crearTiles(palabraActual.length);
}



// Pone todos los botones en gris
function resetColorTeclado() {
    var keys = document.querySelectorAll('.key');
    keys.forEach(function (key) {
        key.style.backgroundColor = '#818384';
    });
}

// Creacion del tablero
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