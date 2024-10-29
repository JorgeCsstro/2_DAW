let colores = ["red", "blue", "green", "yellow", "purple", "orange"];

let targetColor = null;

let timerId;
let m = 0;
let s = 0;


// At the top of your JavaScript file, add a new variable
let targetBallDisplay;

// In the init function, initialize the target ball display element
window.onload = init;
function init() {
    document.querySelector(".jugar").addEventListener("click", startGame);
    document.querySelector(".todasPelotas").addEventListener("click", selectTodasPelotas);
    document.querySelector(".todasPelotas").classList.add("selected");
    document.querySelector(".unaPelota").addEventListener("click", selectUnaPelota);

    // Initialize the target ball display
    targetBallDisplay = document.createElement("div");
    targetBallDisplay.id = "targetBallDisplay";
    targetBallDisplay.style.display = "none"; // Initially hidden
    document.getElementById("botones").appendChild(targetBallDisplay);

    m = 0;
    s = 0;
    document.getElementById("ms").innerHTML = "00:00";
    document.getElementById("wins").innerHTML = "0";
    document.getElementById("losses").innerHTML = "0";
    document.getElementById("esferaWin").style.display = "none";
}

function selectTodasPelotas() {
    // Select "todasPelotas" and deselect "unaPelota"
    document.querySelector(".todasPelotas").classList.add("selected");
    document.querySelector(".unaPelota").classList.remove("selected");
    targetBallDisplay.style.display = "none"; // Hide target ball display
}

function selectUnaPelota() {
    // Select "unaPelota" and deselect "todasPelotas"
    document.querySelector(".unaPelota").classList.add("selected");
    document.querySelector(".todasPelotas").classList.remove("selected");
    targetBallDisplay.style.display = "block"; // Show target ball display
}

function startGame() {
    resetTimer();
    timerId = setInterval(updateTimer, 1000);
    document.querySelector(".jugar").removeEventListener("click", startGame);

    // Show Reset button and hide other buttons
    toggleButtons(true);
    console.log("hola");
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
    clearInterval(timerId); // Stop the timer
}

function resetTimer() {
    clearInterval(timerId); // Ensure no previous timer is running
    m = 0;
    s = 0;
    document.getElementById("ms").innerHTML = "00:00";
    document.getElementById("esferaWin").style.display = "none";
}

function newGame() {
    let tablero = document.getElementById("tablero");
    tablero.innerHTML = '';
    document.getElementById("esferaWin").style.display = "none"; // Hide the win message
    let numPelotas = document.getElementById("numPelotas").value;

    // Check which mode is selected
    const isUnaPelotaMode = document.querySelector(".unaPelota").classList.contains("selected");

    if (isUnaPelotaMode) {
        // Select a random color as the target color
        targetColor = colores[Math.floor(Math.random() * colores.length)];
        // Show the alert with the target color
        console.log("Holaaaa")
        alert(`Find and click all ${targetColor} balls!`);
        console.log("Holaaaaaaaa")
        updateTargetBallDisplay(numPelotas); // Update display with initial count
        console.log("Holaaaaaaaaaaaa")
    } else {
        targetColor = null; // Reset target color in todasPelotas mode
        targetBallDisplay.style.display = "none"; // Hide target ball display
    }

    for (let i = 0; i < numPelotas; i++) {
        let pelota = document.createElement("div");
        pelota.classList.add("pelota");

        let randomColor = colores[Math.floor(Math.random() * colores.length)];
        pelota.style.backgroundColor = randomColor;

        let size = Math.floor(Math.random() * 40) + 20;
        pelota.style.width = `${size}px`;
        pelota.style.height = `${size}px`;

        let x = Math.random() * (tablero.clientWidth - size);
        let y = Math.random() * (tablero.clientHeight - size);
        pelota.style.left = `${x}px`;
        pelota.style.top = `${y}px`;

        pelota.addEventListener("click", () => {
            // Handle click based on mode
            if (!isUnaPelotaMode || pelota.style.backgroundColor === targetColor) {
                pelota.remove();
                updateTargetBallDisplay(); // Update display after clicking a ball
                checkWin(); // Check if the player has won
            }
        });

        tablero.appendChild(pelota);
    }
}

function updateTargetBallDisplay(numPelotas) {
    if (targetColor) {
        const ballsLeft = document.querySelectorAll(`#tablero .pelota[style*="${targetColor}"]`).length;
        targetBallDisplay.innerHTML = `
            <div style="background-color: ${targetColor}; width: 40px; height: 40px; border-radius: 50%; display: inline-block;"></div>
            ${ballsLeft} balls left of color <strong>${targetColor}</strong>
        `;
        targetBallDisplay.style.display = "block"; // Show the target ball display
    }
}

function checkWin() {
    let ballsLeft = document.querySelectorAll("#tablero .pelota");
    if (targetColor) {
        // unaPelota mode: Check if there are any balls of the target color left
        ballsLeft = Array.from(ballsLeft).filter(ball => ball.style.backgroundColor === targetColor);
    }
    
    if (ballsLeft.length === 0) {
        stopTimer();
        document.getElementById("esferaWin").style.display = "block"; // Show win message
        document.getElementById("timeWin").innerText = document.getElementById("ms").innerText; // Display time
    }
}

function resetGame() {
    resetTimer();
    toggleButtons(false); // Show original buttons
    targetBallDisplay.style.display = "none"; 
}

function toggleButtons(showReset) {
    // Toggle visibility of buttons based on showReset flag
    document.querySelector(".jugar").style.display = showReset ? "none" : "block";
    document.querySelector(".todasPelotas").style.display = showReset ? "none" : "block";
    document.querySelector(".unaPelota").style.display = showReset ? "none" : "block";
    document.getElementById("resetButton").style.display = showReset ? "block" : "none";
}
