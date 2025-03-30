<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Puzzles</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            text-align: center;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            margin: 0;
            padding: 0;
            font-size: 18px;
        }
        .container {
            width: 40%;
            margin: 60px auto;
            background: white;
            padding: 30px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            color: black;
            font-size: 20px;
        }
        .input-box {
            margin-top: 20px;
        }
        input {
            width: 80%;
            padding: 12px;
            font-size: 18px;
            border: 2px solid #764ba2;
            border-radius: 8px;
            outline: none;
            text-align: center;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 14px 20px;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            font-size: 18px;
            margin-top: 15px;
            transition: background 0.3s ease;
        }
        button:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 15px;
            font-size: 22px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Math Puzzle: Find the Missing Number</h2>
        <p id="puzzle"></p>
        <input type="number" id="answer" placeholder="Enter your answer">
        <button onclick="checkAnswer()">Submit</button>
        <p class="result" id="result"></p>
        <button onclick="generatePuzzle()">Next Puzzle</button>
    </div>
    
    <script>
        const puzzles = [
            { sequence: "2, 6, 12, ?, 30", answer: 20 },
            { sequence: "1, 4, 9, ?, 25", answer: 16 },
            { sequence: "5, 10, 20, ?, 80", answer: 40 },
            { sequence: "3, 6, 11, ?, 27", answer: 18 }
        ];
        let currentPuzzle;

        function generatePuzzle() {
            currentPuzzle = puzzles[Math.floor(Math.random() * puzzles.length)];
            document.getElementById("puzzle").innerText = "Find the missing number: " + currentPuzzle.sequence;
            document.getElementById("result").innerText = "";
            document.getElementById("answer").value = "";
        }

        function checkAnswer() {
            let userAnswer = parseInt(document.getElementById("answer").value);
            if (userAnswer === currentPuzzle.answer) {
                document.getElementById("result").innerText = "Correct! 🎉";
                document.getElementById("result").style.color = "green";
            } else {
                document.getElementById("result").innerText = "Wrong! Try Again.";
                document.getElementById("result").style.color = "red";
            }
        }

        window.onload = generatePuzzle;
    </script>
</body>
</html>