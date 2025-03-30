<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pattern Recognition Game</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <canvas id="backgroundCanvas"></canvas>
    <div class="game-container">
        <h1>Pattern Recognition Game</h1>
        <div id="game">
            <h1>Identify the missing pattern:</h1>
            <div id="pattern-display"></div>
            <div id="choices"></div>
            <br><br>
            <button id="next-btn" onclick="nextPattern()">Next</button>
        </div>
        <p id="score">Score: 0</p>
    </div>
    
    <script src="script.js"></script>
</body>
</html>

<style>
body {
    margin: 0;
    overflow: hidden;
    font-family: Arial, sans-serif;
    text-align: center;
    color: white;
    background: black;
}

canvas {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
}

.game-container {
    position: relative;
    z-index: 1;
    margin-top: 50px;
}

#game {
    background: rgba(0, 0, 0, 0.7);
    padding: 20px;
    border-radius: 10px;
    display: inline-block;
}

#next-btn{
    background-color: green;
    height: 50px;
    width: 100px;
    color: white;
    border-radius: 10px;
}

#choices button {
    margin: 5px;
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
}</style>


<script>const canvas = document.getElementById("backgroundCanvas");
    const ctx = canvas.getContext("2d");
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    
    let particles = [];
    class Particle {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 3 + 1;
            this.speedX = Math.random() * 3 - 1.5;
            this.speedY = Math.random() * 3 - 1.5;
        }
        update() {
            this.x += this.speedX;
            this.y += this.speedY;
            if (this.size > 0.2) this.size -= 0.02;
        }
        draw() {
            ctx.fillStyle = "white";
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
        }
    }
    
    function init() {
        particles = [];
        for (let i = 0; i < 100; i++) {
            particles.push(new Particle());
        }
    }
    
    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach((particle, index) => {
            particle.update();
            particle.draw();
            if (particle.size <= 0.2) {
                particles.splice(index, 1);
                particles.push(new Particle());
            }
        });
        requestAnimationFrame(animate);
    }
    
    init();
    animate();
    
    function generatePattern() {
        const patterns = [
            { pattern: "▲ ◼ ◻ ?", choices: ["◆", "▲", "◼"], answer: "▲" },
            { pattern: "1, 3, 5, ?", choices: ["7", "6", "9"], answer: "7" },
            { pattern: "A B C ?", choices: ["D", "E", "F"], answer: "D" },
            { pattern: "2, 4, 8, ?", choices: ["10", "12", "16"], answer: "16" },
            { pattern: "Red, Green, Blue, ?", choices: ["Yellow", "Orange", "Purple"], answer: "Yellow" }
        ];
        return patterns[Math.floor(Math.random() * patterns.length)];
    }
    
    let currentPattern;
    let score = 0;
    
    function loadPattern() {
        currentPattern = generatePattern();
        document.getElementById("pattern-display").textContent = currentPattern.pattern;
        const choicesDiv = document.getElementById("choices");
        choicesDiv.innerHTML = "";
        currentPattern.choices.forEach(choice => {
            const button = document.createElement("button");
            button.textContent = choice;
            button.onclick = () => checkAnswer(choice);
            choicesDiv.appendChild(button);
        });
    }
    
    function checkAnswer(choice) {
        if (choice === currentPattern.answer) {
            score++;
            document.getElementById("score").textContent = "Score: " + score;
        }
        loadPattern();
    }
    
    function nextPattern() {
        loadPattern();
    }
    
    loadPattern();</script>