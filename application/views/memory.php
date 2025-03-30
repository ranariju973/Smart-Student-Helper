<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory Game</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .game-container {
            display: grid;
            grid-template-columns: repeat(4, 100px);
            grid-gap: 10px;
        }
        .card {
            width: 100px;
            height: 100px;
            background-color: #3498db;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            color: white;
            cursor: pointer;
            border-radius: 10px;
            user-select: none;
            transition: background-color 0.3s;
        }
        .flipped {
            color: transparent;
        }
        .matched {
            pointer-events: none;
            opacity: 0.6;
        }
    </style>
</head>
<body>
    <div class="game-container" id="game-board"></div>
    
    <script>
        const colorsArray = ["#e74c3c", "#2ecc71", "#f1c40f", "#8e44ad", "#1abc9c", "#e67e22", "#3498db", "#d35400", 
                             "#e74c3c", "#2ecc71", "#f1c40f", "#8e44ad", "#1abc9c", "#e67e22", "#3498db", "#d35400"];
        let shuffledColors = colorsArray.sort(() => 0.5 - Math.random());
        let firstCard = null, secondCard = null;
        let lockBoard = false;
        
        const gameBoard = document.getElementById("game-board");
        
        shuffledColors.forEach((color, index) => {
            const card = document.createElement("div");
            card.classList.add("card");
            card.dataset.color = color;
            card.addEventListener("click", flipCard);
            gameBoard.appendChild(card);
        });
        
        function flipCard() {
            if (lockBoard || this.classList.contains("flipped")) return;
            
            this.style.backgroundColor = this.dataset.color;
            this.classList.add("flipped");
            
            if (!firstCard) {
                firstCard = this;
                return;
            }
            
            secondCard = this;
            lockBoard = true;
            
            checkMatch();
        }
        
        function checkMatch() {
            if (firstCard.dataset.color === secondCard.dataset.color) {
                firstCard.classList.add("matched");
                secondCard.classList.add("matched");
                resetTurn();
            } else {
                setTimeout(() => {
                    firstCard.style.backgroundColor = "#3498db";
                    secondCard.style.backgroundColor = "#3498db";
                    firstCard.classList.remove("flipped");
                    secondCard.classList.remove("flipped");
                    resetTurn();
                }, 1000);
            }
        }
        
        function resetTurn() {
            firstCard = null;
            secondCard = null;
            lockBoard = false;
        }
    </script>
</body>
</html>