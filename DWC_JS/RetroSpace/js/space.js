
const gameArea = document.getElementById("gameArea");
const rows = 17;
const cols = 14;

let score = 0;

let level = 1;
let playerPosition = { x: Math.floor(cols / 2), y: rows - 1 };
let bullets = [];
let canShoot = true;

const invaderRows = 5;
const invaderCols = 8;
let invaderDirection = "right";
let invaderPositions = [];
let baseSpeed = 3000;

let volumeLevel = 1.0;
const shootPlayer = new Audio("./sounds/shoot.wav");
const invaderDies = new Audio("./sounds/invaderDeath.wav");
const playerDies = new Audio("./sounds/playerDeath.wav");
const levelUP = new Audio("./sounds/lvlup.mp3");

// VOLUME CONTROLS //
function setVolume(level) {
    volumeLevel = parseFloat(level);
    shootPlayer.volume = volumeLevel;
    invaderDies.volume = volumeLevel;
    playerDies.volume = volumeLevel;
    levelUP.volume = volumeLevel;
    updateMuteButton();
    document.getElementById("volumeSlider").value = volumeLevel;
}

function Mute() {
    if (volumeLevel > 0) {
        setVolume(0);
    } else {
        setVolume(1.0);
    }
}

function updateMuteButton() {
    const muteButton = document.getElementById("muteButton");
    if (volumeLevel > 0) {
        muteButton.src = "./img/volume-on.png";
    } else {
        muteButton.src = "./img/volume-off.png";
    }
}

// START //

document.addEventListener("DOMContentLoaded", () => {
    // Mute
    const muteButton = document.createElement("img");
    muteButton.id = "muteButton";
    muteButton.src = "./img/volume-on.png";
    muteButton.classList.add("mute-button");
    muteButton.onclick = Mute;
    document.body.appendChild(muteButton);

    // Volume Slider
    const volumeSlider = document.createElement("input");
    volumeSlider.id = "volumeSlider";
    volumeSlider.type = "range";
    volumeSlider.min = "0";
    volumeSlider.max = "1";
    volumeSlider.step = "0.1";
    volumeSlider.value = volumeLevel;
    volumeSlider.classList.add("volume-slider");
    volumeSlider.oninput = () => setVolume(volumeSlider.value);
    document.body.appendChild(volumeSlider);

    showStartModal();
});

function showStartModal() {
    const modal = document.createElement("div");
    modal.classList.add("start-modal");
    modal.innerHTML = `
        <div class="modal-content">
            <h2>Space Invaders</h2>
            <video width="800" autoplay loop muted>
                <source src="./img/Space_Invaders.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <button onclick="startGame()">PLAY</button>
        </div>
    `;
    document.body.appendChild(modal);
}


// INIT //
function nuevaPartida() {
    level = 1;
    baseSpeed = 3000;
    score = 0;
    createGrid();
    initializeInvaders();
    renderInvaders();
    placePlayer();
    clearBullets();
    moverInvaders();
    updateLevel();
    updateScore();
}

// Empezar el juego (empezar y hacerlo visible)
function startGame() {
    document.querySelector(".start-modal").remove();
    const container = document.querySelector(".container");
    container.style.display = "flex";
    nuevaPartida();
}

// Crear escenario
function createGrid() {
    gameArea.innerHTML = "";
    gameArea.style.display = "grid";
    gameArea.style.gridTemplateColumns = `repeat(${cols}, 40px)`;
    gameArea.style.gridTemplateRows = `repeat(${rows}, 40px)`;
    gameArea.style.gap = "2px";
    
    for (let y = 0; y < rows; y++) {
        for (let x = 0; x < cols; x++) {
            const cell = document.createElement("div");
            cell.classList.add("cell");
            cell.dataset.x = x;
            cell.dataset.y = y;
            gameArea.appendChild(cell);
        }
    }
}

// UPDATES //

function updateScore() {
    const scoreElement = document.querySelector('.score');
    scoreElement.textContent = `SCORE: ${score}`;
}

function updateLevel() {
    const levelElement = document.querySelector('.level');
    levelElement.textContent = `LEVEL: ${level}`;
}

function restartGame() {
    document.querySelector(".game-over-modal").remove();
    nuevaPartida();
}

// INVADERS //

// Crear Invaders
function initializeInvaders() {
    invaderPositions = [];
    for (let y = 0; y < invaderRows; y++) {
        for (let x = 0; x < invaderCols; x++) {
            invaderPositions.push({
                x: x + Math.floor((cols - invaderCols) / 2),
                y: y
            });
        }
    }
}

// Render Invaders
function renderInvaders() {
    document.querySelectorAll(".invader").forEach(img => img.remove());
    invaderPositions.forEach(pos => {
        const cell = document.querySelector(`.cell[data-x='${pos.x}'][data-y='${pos.y}']`);
        if (cell) {
            const invaderImg = document.createElement("img");
            invaderImg.src = "./img/invaderCenter.png";
            invaderImg.classList.add("invader");
            cell.appendChild(invaderImg);
        }
    });
}

function moverInvaders() {
    let moveDown = false;
    
    if (invaderDirection === "right") {
        let rightmost = Math.max(...invaderPositions.map(e => e.x));
        if (rightmost < cols - 1) {
            invaderPositions.forEach(e => e.x++);
        } else {
            moveDown = true;
            invaderDirection = "left";
        }
    } else if (invaderDirection === "left") {
        let leftmost = Math.min(...invaderPositions.map(e => e.x));
        if (leftmost > 0) {
            invaderPositions.forEach(e => e.x--);
        } else {
            moveDown = true;
            invaderDirection = "right";
        }
    }

    if (moveDown) {
        invaderPositions.forEach(e => e.y++);
    }

    if (invaderPositions.some(e => e.y >= rows - 1)) {
        PlayerDied();
        return;
    }

    renderInvaders();
    setTimeout(moverInvaders, baseSpeed - (500 * level));
}

// PLAYER //

function placePlayer() {
    document.querySelectorAll(".player").forEach(img => img.remove());
    const playerCell = document.querySelector(`.cell[data-x='${playerPosition.x}'][data-y='${playerPosition.y}']`);
    if (playerCell) {
        const playerImg = document.createElement("img");
        playerImg.src = "./img/ship.png";
        playerImg.classList.add("player");
        playerCell.appendChild(playerImg);
    }
}

function movePlayer(direction) {
    if (direction === "left" && playerPosition.x > 0) {
        playerPosition.x--;
    } else if (direction === "right" && playerPosition.x < cols - 1) {
        playerPosition.x++;
    }
    placePlayer();
}

function PlayerDied() {

    playerDies.play();

    const modal = document.createElement("div");
    modal.classList.add("game-over-modal");
    modal.innerHTML = `
        <div class="modal-content">
            <h2>GAME OVER</h2>
            <button onclick="restartGame()">Nueva Partida</button>
        </div>
    `;
    document.body.appendChild(modal);
}

document.addEventListener("keydown", (event) => {
    if (event.key === "ArrowLeft" || event.key.toLowerCase() === "a") {
        movePlayer("left");
    } else if (event.key === "ArrowRight" || event.key.toLowerCase() === "d") {
        movePlayer("right");
    }
});

// BULLET & SCORE //

function shoot() {
    if (shootingCooldown) return;
    shootingCooldown = true;

    // Crear bullet
    const bullet = {
        x: playerPosition.x,
        y: playerPosition.y - 1
    };
    bullets.push(bullet);
    renderBullets();
    bulletMove();

    shootPlayer.play();

    // Cooldown shoot
    setTimeout(() => {
        shootingCooldown = false;
    }, 500);
}

// Render bullets
function renderBullets() {
    document.querySelectorAll(".bullet").forEach(img => img.remove());
    bullets.forEach(bullet => {
        const cell = document.querySelector(`.cell[data-x='${bullet.x}'][data-y='${bullet.y}']`);
        if (cell) {
            const bulletImg = document.createElement("img");
            bulletImg.src = "./img/shoot.png";
            bulletImg.classList.add("bullet");
            cell.appendChild(bulletImg);
        }
    });
}

function moveBullets() {
    bullets = bullets.map(bullet => ({ x: bullet.x, y: bullet.y - 1 })).filter(bullet => bullet.y >= 0);

    bullets.forEach((bullet, bulletIndex) => {
        invaderPositions.forEach((invader, invaderIndex) => {
            if (bullet.x === invader.x && bullet.y === invader.y) {

                invaderPositions.splice(invaderIndex, 1);
                bullets.splice(bulletIndex, 1);
                score += 100;
                updateScore();

                invaderDies.play();

                // Check invaders muertos
                if (invaderPositions.length === 0) {
                    levelUP.play();
                    level++;
                    clearBullets();
                    updateLevel();
                    initializeInvaders();
                    renderInvaders();
                }
            }
        });
    });

    renderBullets();
    renderInvaders();
}


let moveInterval;

// Velocidad de balas
function bulletMove() {
    if (!moveInterval) {
        moveInterval = setInterval(moveBullets, 100);
    }
}

function stopBulletMovement() {
    clearInterval(moveInterval);
    moveInterval = null;
}

let shootingCooldown = false;

document.addEventListener("keydown", (event) => {
    if (event.key === " " && !shootingCooldown) {
        shoot();
    }
});

function clearBullets() {
    bullets = [];
    document.querySelectorAll(".bullet").forEach(img => img.remove());
}