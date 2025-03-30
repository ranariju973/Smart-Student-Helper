<?php $this->load->view('layout/header');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calorie Burn Scale</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-900 text-white">
    <br><br><br><br><br><br>
    <!-- Hero Section -->
    <div class="text-center mt-10">
        <h1 class="text-4xl font-bold animate-bounce">Track Your Calories Burned</h1>
        <p class="text-gray-300 mt-2">Enter your details below to calculate your calorie burn.</p>
    </div>

    <!-- Calculator Section -->
    <div class="container mx-auto mt-6 p-6 bg-white text-black shadow-md rounded w-96">
        <h2 class="text-lg font-semibold mb-4">Calorie Burn Calculator</h2>
        <input type="number" id="weight" placeholder="Your Weight (kg)" class="border p-2 rounded w-full mb-2">
        <select id="activity" class="border p-2 rounded w-full mb-2">
            <option value="running">Running</option>
            <option value="cycling">Cycling</option>
            <option value="swimming">Swimming</option>
            <option value="jumping rope">Jumping Rope</option>
        </select>
        <input type="number" id="duration" placeholder="Duration (minutes)" class="border p-2 rounded w-full mb-2">
        <button onclick="calculateAdvancedCalories()" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 w-full">Calculate</button>
        <p id="result" class="mt-4 text-lg font-semibold text-center"></p>
    </div>

    <script>
        
    window.onload = function() {
        document.querySelector("button").addEventListener("click", calculateAdvancedCalories);
    };

    function calculateAdvancedCalories() {
        let weight = parseFloat(document.getElementById("weight").value);
        let activity = document.getElementById("activity").value;
        let duration = parseFloat(document.getElementById("duration").value);

        if (isNaN(weight) || isNaN(duration) || !activity) {
            alert("Please enter valid weight, duration, and select an activity.");
            return;
        }

        let metValues = {
            "running": 9.8,
            "cycling": 7.5,
            "swimming": 8.0,
            "jumping rope": 12.3,
            "walking": 3.8,
            "hiking": 6.5
        };

        let met = metValues[activity];
        if (!met) {
            alert("Invalid activity selected.");
            return;
        }

        let caloriesBurned = (met * weight * duration) / 60;
        document.getElementById("result").textContent = 
            `You burned approximately ${caloriesBurned.toFixed(2)} calories.`;

        // Animate progress bar safely
        let progressBar = document.getElementById("progress-bar");
        if (progressBar) {
            let percentage = Math.min((caloriesBurned / 500) * 100, 100);
            progressBar.style.width = percentage + "%";
        }
    }



    </script>
</body>
</html>