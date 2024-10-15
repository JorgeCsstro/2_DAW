
var palabra = [];
var currentRow = 0; // Track the current row
var currentWord = ''; // Store the current word
var maxRows = 5; // Number of allowed attempts

document.addEventListener('keydown', function (event) {
    var key = event.key;
    var letterRegex = /^[a-zA-Z]$/;

    if (letterRegex.test(key)) {
        ponLetra(key);
    } else if (key === 'Enter') {
        comprobar();
    } else if (key === 'Backspace') {
        borrarUno();
    }
});

function nuevaPartida() {
    let posibilidades = ["GATO", "PERRO", "MANOS", "CASA", "LUNA", "PLAYA", "LIBRO",
        "SILLA", "TIGRE", "MONTAÑA", "HOLA", "FRIO", "AVEJA", "AVISPA",
        "MARIPOSA", "ELEFANTE", "CANGREJO", "AVENTURA", "SONRISA", "CIELO",
        "ESTRELLA", "GALICIA", "ESPERANZA"];

    let rando = Math.floor(Math.random() * posibilidades.length);

    currentWord = posibilidades[rando];
    currentRow = 0;
    palabra = [];
    console.log(currentWord);

    crearTiles(currentWord.length);
    return currentWord;
}

function crearTiles(wordLength) {
    // Clear previous grid
    var grid = document.getElementById('wordleGrid');
    grid.innerHTML = '';

    // Adjust grid-template-columns dynamically to match word length
    grid.style.gridTemplateColumns = `repeat(${wordLength}, 50px)`;

    // Create rows and tiles dynamically
    for (let row = 0; row < maxRows; row++) {
        for (let col = 0; col < wordLength; col++) {
            const tile = document.createElement('div');
            tile.classList.add('tile');
            tile.setAttribute('data-row', row); // Track the row for each tile
            tile.setAttribute('data-col', col); // Track the column for each tile
            grid.appendChild(tile);
        }
    }
}


function ponLetra(letra) {
    if (palabra.length < currentWord.length) {
        palabra.push(letra);
        actualizarGrid();
    }
}

function borrarUno() {
    if (palabra.length > 0) {
        palabra.pop();
        actualizarGrid();
    }
}

function actualizarGrid() {
    // Update the current row in the grid with the letters in "palabra"
    for (let i = 0; i < currentWord.length; i++) {
        const tile = document.querySelector(`[data-row="${currentRow}"][data-col="${i}"]`);
        if (palabra[i]) {

            tile.textContent = palabra[i].toUpperCase();
        } else {

            tile.textContent = ''; // Clear empty tiles
        }
    }
}

function comprobar() {
    if (palabra.length === currentWord.length) {
        var userWord = palabra.join('').toUpperCase();
        console.log("Checking word: " + userWord);

        // Array to keep track of which letters have been checked
        let letterChecked = Array(currentWord.length);

        // First pass: check for correct letters in correct positions (green)
        for (let i = 0; i < currentWord.length; i++) {
            const tile = document.querySelector(`[data-row="${currentRow}"][data-col="${i}"]`);
            if (userWord[i] === currentWord[i]) {
                tile.style.backgroundColor = 'green';
                letterChecked[i] = true; // Mark this letter as checked
            }
        }

        // Second pass: check for correct letters in wrong positions (yellow)
        for (let i = 0; i < currentWord.length; i++) {
            const tile = document.querySelector(`[data-row="${currentRow}"][data-col="${i}"]`);
            if (userWord[i] !== currentWord[i]) {
                // Check if the letter exists elsewhere in the word
                let letterFound = false;
                for (let j = 0; j < currentWord.length; j++) {
                    if (userWord[i] === currentWord[j] && !letterChecked[j]) {
                        letterFound = true;
                        letterChecked[j] = true; // Mark the matching letter as checked
                        break;
                    }
                }

                // If the letter was found but not in the correct place, make it yellow
                if (letterFound) {
                    tile.style.backgroundColor = 'yellow';
                } else {
                    // Otherwise, make it red (letter doesn't exist in the word)
                    tile.style.backgroundColor = 'red';
                }
            }
        }

        // Check if the user has guessed the correct word
        if (userWord === currentWord) {
            console.log("Correcto"); // Correct word guessed
        } else {
            console.log("Incorrecto"); // Incorrect guess
            // Move to the next row if not the last row
            if (currentRow < maxRows - 1) {
                currentRow++;
                palabra = []; // Reset palabra for the new row
            }
        }
    }
}


