let colores = ["red", "blue", "green", "yellow", "purple", "orange"];

let targetColor = null;

let timerId;
let m = 0;
let s = 0;

let targetBallDisplay;

window.onload = init;
function init() {
    document.querySelector(".jugar").addEventListener("click", startGame);
    document.querySelector(".todasPelotas").addEventListener("click", selectTodasPelotas);
    document.querySelector(".todasPelotas").classList.add("selected");
    document.querySelector(".unaPelota").addEventListener("click", selectUnaPelota);

    targetBallDisplay = document.createElement("div");
    targetBallDisplay.id = "targetBallDisplay";
    targetBallDisplay.style.display = "none";
    document.getElementById("botones").appendChild(targetBallDisplay);

    m = 0;
    s = 0;
    document.getElementById("ms").innerHTML = "00:00";
    document.getElementById("pelotasBuenas").innerHTML = "0";
    document.getElementById("pelotasMalas").innerHTML = "0";
    document.getElementById("esferaWin").style.display = "none";

    let easyButton = document.createElement("div");
    easyButton.classList.add("boton", "easy");
    easyButton.style.marginLeft = "20px";
    easyButton.textContent = "Easy";
    easyButton.addEventListener("click", () => setDifficulty("easy"));
    document.getElementById("botones").appendChild(easyButton);
    document.querySelector(".easy").style.display = "none";

    let hardButton = document.createElement("div");
    hardButton.classList.add("boton", "hard");
    hardButton.style.marginLeft = "20px";
    hardButton.textContent = "Hard";
    hardButton.addEventListener("click", () => setDifficulty("hard"));
    document.getElementById("botones").appendChild(hardButton);
    document.querySelector(".hard").style.display = "none";
}

function selectTodasPelotas() {
    document.querySelector(".todasPelotas").classList.add("selected");
    document.querySelector(".unaPelota").classList.remove("selected");
    targetBallDisplay.style.display = "none";
    document.querySelector(".easy").style.display = "none";
    document.querySelector(".hard").style.display = "none";
}

function selectUnaPelota() {
    document.querySelector(".unaPelota").classList.add("selected");
    document.querySelector(".todasPelotas").classList.remove("selected");
    document.querySelector(".easy").style.display = "block";
    document.querySelector(".hard").style.display = "block";
    document.querySelector(".easy").classList.add("selected");
    document.querySelector(".hard").classList.remove("selected");
}

function setDifficulty(level) {
    document.querySelectorAll(".easy, .hard").forEach(button => {
        button.classList.remove("selected");
    });

    const button = document.querySelector(`.${level}`);
    if (button) button.classList.add("selected");
}

function startGame() {
    resetTimer();
    timerId = setInterval(updateTimer, 1000);
    document.querySelector(".jugar").removeEventListener("click", startGame);

    // Oculta los botones para comenzar el juego y muestra el boton "Reset"
    toggleButtons(true);
    newGame();
}

function updateTimer() {
    s++;
    if (s > 59) { m++; s = 0; }

    let mAux = m < 10 ? "0" + m : m;
    let sAux = s < 10 ? "0" + s : s;
    document.getElementById("ms").innerHTML = mAux + ":" + sAux; 
}

function stopTimer() {
    clearInterval(timerId);
}

function resetTimer() {
    clearInterval(timerId);
    m = 0;
    s = 0;
    document.getElementById("ms").innerHTML = "00:00";
    document.getElementById("esferaWin").style.display = "none";
}

function newGame() {
    let tablero = document.getElementById("tablero");
    tablero.innerHTML = '';
    document.getElementById("esferaWin").style.display = "none";
    let numPelotas = document.getElementById("numPelotas").value;

    // Para saber que modos elegir si unaPelota o todasPelotas / Easy o Hard
    const isUnaPelotaMode = document.querySelector(".unaPelota").classList.contains("selected");
    const isEasyMode = document.querySelector(".easy").classList.contains("selected");

    if (isUnaPelotaMode) {
        targetColor = colores[Math.floor(Math.random() * colores.length)];
        targetBallDisplay.style.display = "block";
    } else {
        targetColor = null;
        targetBallDisplay.style.display = "none";
    }

    let balls = [];

    if (isUnaPelotaMode) {
        let targetColorCount = Math.floor(numPelotas / 2); // Pone la mitad de pelotas del color random
        let otherColorsCount = numPelotas - targetColorCount;

        for (let i = 0; i < targetColorCount; i++) {
            balls.push(targetColor);
        }

        for (let i = 0; i < otherColorsCount; i++) {
            let randomColor = colores[Math.floor(Math.random() * colores.length)];
            while (randomColor === targetColor) {
                randomColor = colores[Math.floor(Math.random() * colores.length)];
            }
            balls.push(randomColor);
        }

    } else {
        // Si no es el modo de unaPelota, pondrá pelotas sin pensar
        for (let i = 0; i < numPelotas; i++) {
            let randomColor = colores[Math.floor(Math.random() * colores.length)];
            balls.push(randomColor);
        }
    }

    balls = balls.sort(() => Math.random() - 0.5);

    balls.forEach(color => {
        let pelota = document.createElement("div");
        pelota.classList.add("pelota");
        pelota.style.backgroundColor = color;

        // Random de tamaños
        let size = Math.floor(Math.random() * 40) + 20;
        pelota.style.width = `${size}px`;
        pelota.style.height = `${size}px`;

        // Random de posición
        let x = Math.random() * (tablero.clientWidth - size);
        let y = Math.random() * (tablero.clientHeight - size);
        pelota.style.left = `${x}px`;
        pelota.style.top = `${y}px`;

        // Si es Easy pondra el Z-index
        if (isUnaPelotaMode) {
            pelota.style.zIndex = color === targetColor && isEasyMode ? 10 : 1;
        }

        pelota.addEventListener("click", () => {
            if (isUnaPelotaMode) {
                if (pelota.style.backgroundColor === targetColor) {
                    // Pelota correcta
                    let pelotasBuenas = parseInt(document.getElementById("pelotasBuenas").innerHTML, 10);
                    document.getElementById("pelotasBuenas").innerHTML = pelotasBuenas + 1;
                } else {
                    // Pelota incorrecta
                    let pelotasMalas = parseInt(document.getElementById("pelotasMalas").innerHTML, 10);
                    document.getElementById("pelotasMalas").innerHTML = pelotasMalas + 1;
                }
            }
            pelota.remove();
            bolasRestantes();
            checkWin();
        });

        tablero.appendChild(pelota);
    });

    bolasRestantes(numPelotas);
}

// Funcion para mostrar las pelotas restantes en el modo unaPelota
function bolasRestantes(numPelotas) {
    if (targetColor) {
        const ballsLeft = document.querySelectorAll(`#tablero .pelota[style*="${targetColor}"]`).length;
        targetBallDisplay.innerHTML = `
            <div style="background-color: ${targetColor}; width: 40px; height: 40px; border-radius: 50%; display: inline-block;"></div>
            ${ballsLeft} balls left of color <strong>${targetColor}</strong>
        `;
        targetBallDisplay.style.display = "block";
    }
}

function checkWin() {
    let ballsLeft = document.querySelectorAll("#tablero .pelota");
    if (targetColor) {
        ballsLeft = Array.from(ballsLeft).filter(ball => ball.style.backgroundColor === targetColor);
    }
    
    if (ballsLeft.length === 0) {
        stopTimer();
        document.getElementById("timeWin").innerText = document.getElementById("ms").innerText;
        document.getElementById("esferaWin").style.display = "block"; // Mostrar mensaje de victoria
        
    }
}

function resetGame() {
    resetTimer();
    toggleButtons(false);
    targetBallDisplay.style.display = "none";
    document.querySelector(".easy").style.display = "none";
    document.querySelector(".hard").style.display = "none";
    document.getElementById("pelotasBuenas").innerHTML = "0";
    document.getElementById("pelotasMalas").innerHTML = "0";
}

// Cambiar visibilidad de los botones
function toggleButtons(showReset) {
    document.querySelector(".jugar").style.display = showReset ? "none" : "block";
    document.querySelector(".todasPelotas").style.display = showReset ? "none" : "block";
    document.querySelector(".unaPelota").style.display = showReset ? "none" : "block";
    document.getElementById("resetButton").style.display = showReset ? "block" : "none";
    document.querySelector(".easy").style.display = showReset ? "none" : "block";
    document.querySelector(".hard").style.display = showReset ? "none" : "block";
}
