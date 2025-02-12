const gameArea = document.getElementById("gameArea");
const rows = 17;
const cols = 16;

let score = 0;

let level = 1;
let playerPosition = { x: Math.floor(cols / 2), y: rows - 1 };
let bullets = [];
let canShoot = true;

const enemyRows = 5;
const enemyCols = 8;
let enemyDirection = "right";
let enemyPositions = [];
let baseSpeed = 3000;


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

// INVADERS //

function initializeEnemies() {
    enemyPositions = [];
    for (let y = 0; y < enemyRows; y++) {
        for (let x = 0; x < enemyCols; x++) {
            enemyPositions.push({
                x: x + Math.floor((cols - enemyCols) / 2),
                y: y
            });
        }
    }
}

function renderEnemies() {
    document.querySelectorAll(".enemy").forEach(img => img.remove());
    enemyPositions.forEach(pos => {
        const cell = document.querySelector(`.cell[data-x='${pos.x}'][data-y='${pos.y}']`);
        if (cell) {
            const enemyImg = document.createElement("img");
            enemyImg.src = "./img/enemyCenter.png";
            enemyImg.classList.add("enemy");
            cell.appendChild(enemyImg);
        }
    });
}

function showGameOverModal() {
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

function restartGame() {
    document.querySelector(".game-over-modal").remove();
    nuevaPartida();
}

function moverInvaders() {
    let moveDown = false;
    
    if (enemyDirection === "right") {
        let rightmost = Math.max(...enemyPositions.map(e => e.x));
        if (rightmost < cols - 1) {
            enemyPositions.forEach(e => e.x++);
        } else {
            moveDown = true;
            enemyDirection = "left";
        }
    } else if (enemyDirection === "left") {
        let leftmost = Math.min(...enemyPositions.map(e => e.x));
        if (leftmost > 0) {
            enemyPositions.forEach(e => e.x--);
        } else {
            moveDown = true;
            enemyDirection = "right";
        }
    }

    if (moveDown) {
        enemyPositions.forEach(e => e.y++);
    }

    if (enemyPositions.some(e => e.y >= rows - 1)) {
        showGameOverModal();
        return;
    }

    renderEnemies();
    setTimeout(moverInvaders, baseSpeed - (250 * level)); // Adjust speed based on level
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

document.addEventListener("keydown", (event) => {
    if (event.key === "ArrowLeft" || event.key.toLowerCase() === "a") {
        movePlayer("left");
    } else if (event.key === "ArrowRight" || event.key.toLowerCase() === "d") {
        movePlayer("right");
    }
});

// BULLET & SCORE //

const shootSound = new Audio("./sounds/shoot.wav"); // Path to your sound file

function shoot() {
    if (shootingCooldown) return;
    shootingCooldown = true;

    // Create bullet
    const bullet = {
        x: playerPosition.x,
        y: playerPosition.y - 1
    };
    bullets.push(bullet);
    renderBullets();

    // Start bullet movement if it's the first bullet
    startBulletMovement();

    shootSound.play();

    // Reset shooting ability after 1 second
    setTimeout(() => {
        shootingCooldown = false;
    }, 250); // Reset after 1 second
}

// Render bullets function
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

// Bullet movement function
function moveBullets() {
    // Update bullet positions and check for collisions with enemies
    bullets = bullets.map(bullet => ({ x: bullet.x, y: bullet.y - 1 })).filter(bullet => bullet.y >= 0);

    // Check for collisions with enemies
    bullets.forEach((bullet, bulletIndex) => {
        enemyPositions.forEach((enemy, enemyIndex) => {
            if (bullet.x === enemy.x && bullet.y === enemy.y) {
                // Remove the enemy
                enemyPositions.splice(enemyIndex, 1);
                // Remove the bullet
                bullets.splice(bulletIndex, 1);
                // Increment the score
                score += 100;
                updateScore();

                // Check if all enemies are defeated
                if (enemyPositions.length === 0) {
                    level++;
                    updateLevel();
                    initializeEnemies();
                    renderEnemies();
                }
            }
        });
    });

    renderBullets();
    renderEnemies();  // Re-render enemies after removing the hit ones
}


let moveInterval;

function startBulletMovement() {
    if (!moveInterval) {
        moveInterval = setInterval(moveBullets, 100); // Move bullets every 500ms
    }
}

function stopBulletMovement() {
    clearInterval(moveInterval);
    moveInterval = null;
}

// Spacebar event listener (updated)
let shootingCooldown = false;

document.addEventListener("keydown", (event) => {
    if (event.key === " " && !shootingCooldown) {
        shoot(); // Trigger shoot if cooldown is not active
    }
});

function updateScore() {
    const scoreElement = document.querySelector('.score');
    scoreElement.textContent = `SCORE: ${score}`;
}

function updateLevel() {
    const levelElement = document.querySelector('.level');
    levelElement.textContent = `NIVEL: ${level}`;
}


// INIT //
function nuevaPartida() {
    level = 1;
    baseSpeed = 3000;
    score = 0;
    createGrid();
    initializeEnemies();
    renderEnemies();
    placePlayer();
    moverInvaders();
    updateLevel();
    updateScore();
}