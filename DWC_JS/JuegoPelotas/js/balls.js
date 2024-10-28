let colores = ["red", "blue", "green", "yellow", "purple", "orange"];

let timerId;
let m = 0;
let s = 0;

window.onload = init;
function init() {
    document.querySelector(".jugar").addEventListener("click", startGame);
    m = 0;
    s = 0;
    document.getElementById("ms").innerHTML = "00:00";
    document.getElementById("wins").innerHTML = "0";
    document.getElementById("losses").innerHTML = "0";
    document.getElementById("esferaWin").style.display = "none";
}    

function startGame() {
    resetTimer();
    timerId = setInterval(updateTimer, 1000);
    document.querySelector(".jugar").removeEventListener("click", startGame);

    // Show Reset button and hide other buttons
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
            pelota.remove(); // Remove the ball on click
            checkWin(); // Check if there are any balls left
        });

        tablero.appendChild(pelota);
    }
}

function checkWin() {
    let ballsLeft = document.querySelectorAll("#tablero .pelota").length;
    if (ballsLeft === 0) {
        stopTimer();
        document.getElementById("esferaWin").style.display = "block"; // Show win message
        document.getElementById("timeWin").innerText = document.getElementById("ms").innerText; // Display time
    }
}

function resetGame() {
    resetTimer();
    toggleButtons(false); // Show original buttons
}

function toggleButtons(showReset) {
    // Toggle visibility of buttons based on showReset flag
    document.querySelector(".jugar").style.display = showReset ? "none" : "block";
    document.querySelector(".todasPelotas").style.display = showReset ? "none" : "block";
    document.querySelector(".unaPelota").style.display = showReset ? "none" : "block";
    document.getElementById("resetButton").style.display = showReset ? "block" : "none";
}
