<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudoku Game</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }
        .sudoku-container {
            display: grid;
            grid-template-columns: repeat(9, 1fr);
            gap: 2px;
            border: 3px solid black;
            padding: 10px;
            background-color: white;
        }
        .cell {
            width: 40px;
            height: 40px;
            text-align: center;
            font-size: 20px;
            border: 1px solid black;
            outline: none;
        }
        .cell:focus {
            background-color: #ff5733;
        }
        .fixed {
            background-color: #d3d3d3;
            font-weight: bold;
        }
        .bold-border {
            border-right: 3px solid black;
        }
        .bold-border-bottom {
            border-bottom: 3px solid black;
        }
        button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }
        button:hover {
            transform: scale(1.05);
        }
        .message {
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="sudoku-container" id="sudoku"></div>
    <button onclick="checkSudoku()">Check Solution</button>
    <div class="message" id="message"></div>
    
    <script>
        const sudokuBoard = [
            [5, 3, '', '', 7, '', '', '', ''],
            [6, '', '', 1, 9, 5, '', '', ''],
            ['', 9, 8, '', '', '', '', 6, ''],
            [8, '', '', '', 6, '', '', '', 3],
            [4, '', '', 8, '', 3, '', '', 1],
            [7, '', '', '', 2, '', '', '', 6],
            ['', 6, '', '', '', '', 2, 8, ''],
            ['', '', '', 4, 1, 9, '', '', 5],
            ['', '', '', '', 8, '', '', 7, 9]
        ];

        function createBoard() {
            const container = document.getElementById('sudoku');
            container.innerHTML = '';
            sudokuBoard.forEach((row, rowIndex) => {
                row.forEach((value, colIndex) => {
                    const cell = document.createElement('input');
                    cell.type = 'text';
                    cell.maxLength = 1;
                    cell.classList.add('cell');
                    if (value !== '') {
                        cell.value = value;
                        cell.readOnly = true;
                        cell.classList.add('fixed');
                    }
                    if ((colIndex + 1) % 3 === 0 && colIndex !== 8) {
                        cell.classList.add('bold-border');
                    }
                    if ((rowIndex + 1) % 3 === 0 && rowIndex !== 8) {
                        cell.classList.add('bold-border-bottom');
                    }
                    container.appendChild(cell);
                });
            });
        }

        function checkSudoku() {
            const inputs = document.querySelectorAll('.cell');
            let board = [];
            let valid = true;
            let index = 0;
            for (let i = 0; i < 9; i++) {
                board[i] = [];
                for (let j = 0; j < 9; j++) {
                    let val = inputs[index].value;
                    if (val === '' || isNaN(val) || val < 1 || val > 9) {
                        valid = false;
                    }
                    board[i][j] = Number(val);
                    index++;
                }
            }
            document.getElementById('message').innerHTML = valid ? '<span style="color:green;">✔ Correct</span>' : '<span style="color:red;">❌ Incorrect</span>';
        }

        createBoard();
    </script>
</body>
</html>
