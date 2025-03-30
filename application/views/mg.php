<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Hub</title>
    <style>
        @keyframes backgroundAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(-45deg, #ff758c, #ff7eb3, #6a11cb, #2575fc);
            background-size: 400% 400%;
            animation: backgroundAnimation 10s ease infinite;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
        }
        h1 {
            color: white;
            text-shadow: 3px 3px 6px rgba(0,0,0,0.5);
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .game-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
            justify-content: center;
            max-width: 1200px;
            margin: auto;
        }
        .game-card {
            background: white;
            padding: 15px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }
        .game-card:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(0,0,0,0.4);
        }
        .game-card img {
            width: 100%;
            height: 180px;
            border-radius: 10px;
            object-fit: cover;
        }
        .game-card h3 {
            margin-top: 10px;
            font-size: 1.2em;
            color: #444;
            font-weight: bold;
        }
        .game-card button {
            margin-top: 10px;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(to right, #ff758c, #ff7eb3);
            color: white;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .game-card button img {
            width: 20px;
            height: 20px;
        }
        .game-card button:hover {
            background: linear-gradient(to right, #ff5a6c, #ff85a2);
        }
        @media (max-width: 768px) {
            .game-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 480px) {
            .game-grid {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Game Hub</h1>
        <div class="game-grid">
            <div class="game-card"  onclick="window.location.href='<?= base_url('task-details') ?>'">
                <img src="https://cdn6.f-cdn.com/contestentries/1495191/29595932/5ccbbc32d8b58_thumb900.jpg" alt="Game 1">
                <h3>Soduku Game </h3>
                <button><img src="play-icon.png" alt="Play"> Play</button>
            </div>
            <div class="game-card" onclick="window.location.href='<?= base_url('task-details2') ?>'"  >
                <img src="https://m.media-amazon.com/images/I/51bV5Q7gkyL._AC_UF1000,1000_QL80_.jpg" alt="Game 2">
                <h3>Stroop Effect Test</h3>
                <button><img src="play-icon.png" alt="Play"> Play</button>
            </div>
            <div class="game-card" onclick="window.location.href='<?= base_url('task-details3') ?>'">
                <img src="https://img.freepik.com/premium-vector/mathematics-puzzle-logo-template-design_316488-5174.jpg" alt="Game 3">
                <h3>Math Puzzles</h3>
                <button><img src="play-icon.png" alt="Play"> Play</button>
            </div>
            <div class="game-card" onclick="window.location.href='<?= base_url('task-details1') ?>'">
                <img src="https://marketplace.canva.com/EAGSOIPstVM/1/0/1600w/canva-green-cartoon-animated-memory-game-presentation-w3kexXzA48U.jpg" alt="Game 4">
                <h3>Memory Game</h3>
                <button><img src="play-icon.png" alt="Play"> Play</button>
            </div>
            <div class="game-card" onclick="window.location.href='<?= base_url('task-details5') ?>'">
                <img src="https://www.shutterstock.com/image-vector/retro-technology-icons-simon-says-600nw-670971922.jpg" alt="Game 5">
                <h3>Simon Games</h3>
                <button><img src="play-icon.png" alt="Play"> Play</button>
            </div>
            <div class="game-card" onclick="window.location.href='<?= base_url('task-details6') ?>'">
                <img src="https://cdn-icons-png.freepik.com/512/9004/9004797.png" alt="Game 6">
                <h3>Pattern Recognition</h3>
                <button><img src="play-icon.png" alt="Play"> Play</button>
            </div>
        </div>
    </div>
</body>
</html>