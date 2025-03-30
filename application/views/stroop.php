<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stroop Effect Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
        }
        .word {
            font-size: 48px;
            font-weight: bold;
            margin: 20px;
        }
        .options button {
            font-size: 20px;
            margin: 10px;
            padding: 10px 20px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }
        #score {
            font-size: 24px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Stroop Effect Test</h1>
    <p>Select the actual color of the word, not the word itself.</p>
    <div class="word" id="word"></div>
    <div class="options" id="options"></div>
    <div id="score">Score: 0</div>
    <script>
        const colors = ["Red", "Blue", "Green", "Yellow", "Purple", "Orange"];
        const colorCodes = {"Red": "red", "Blue": "blue", "Green": "green", "Yellow": "yellow", "Purple": "purple", "Orange": "orange"};
        let score = 0;
        
        function generateWord() {
            const wordText = colors[Math.floor(Math.random() * colors.length)];
            let colorText;
            do {
                colorText = colors[Math.floor(Math.random() * colors.length)];
            } while (colorText === wordText);
            
            document.getElementById("word").textContent = wordText;
            document.getElementById("word").style.color = colorCodes[colorText];
            generateOptions(colorText);
        }
        
        function generateOptions(correctColor) {
            const optionsDiv = document.getElementById("options");
            optionsDiv.innerHTML = "";
            const shuffledColors = [...colors].sort(() => Math.random() - 0.5);
            shuffledColors.forEach(color => {
                const button = document.createElement("button");
                button.textContent = color;
                button.style.backgroundColor = colorCodes[color];
                button.style.color = "white";
                button.onclick = () => checkAnswer(color, correctColor);
                optionsDiv.appendChild(button);
            });
        }
        
        function checkAnswer(selectedColor, correctColor) {
            if (selectedColor === correctColor) {
                score++;
            } else {
                score = Math.max(0, score - 1);
            }
            document.getElementById("score").textContent = `Score: ${score}`;
            generateWord();
        }
        
        generateWord();
    </script>
</body>
</html>